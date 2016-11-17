<?php

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->lang->load('global', 'french');
        $this->lang->load('user', 'french');
    }

    public function listUsers()
    {
        $breadcrumb = array(
            array(
                'url' => site_url('admin'),
                'label' => $this->lang->line('rubrique_admin'),
            ),
            array(
                'url' => site_url('admin/user'),
                'label' => $this->lang->line('rubrique_admin_user'),
            ),
        );

        $data['users'] = $this->User_model->listUsers();

        $this->load->view('header', array('breadcrumb', $breadcrumb));
        $this->load->view('admin/menu_left');
        $this->load->view('admin/user/list_users', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        $data = array();

        $values = $this->input->post();

        $data['values'] = $values;

        if ($values) {
            if (empty($values['username'])) {
                $data['error']['username'] = 'Nom d\'utilisateur : champ requis';
            }

            if ($this->User_model->getUserByUsername($values['username'])) {
                $data['error']['username'] = 'Nom d\'utilisateur : ce nom existe deja';
            }

            if (empty($values['email'])) {
                $data['error']['email'] = 'Adresse email : Champ requis';
            }

            if ($this->User_model->getUserByEmail($values['email'])) {
                $data['error']['email'] = 'Adresse email : cette adresse email existe deja';
            }

            if (empty($values['password'])) {
                $data['error']['password'] = 'Mot de passe : champ requis';
            }

            if (empty($values['password_confirm'])) {
                $data['error']['password_confirm'] = 'Confirmation mot de passe : champ requis';
            }

            if ($values['password_confirm'] !== $values['password']) {
                $data['error']['password_confirm'] = 'Confirmation mot de passe : le mot de passe ne correspond pas';
            }

            if (empty($data['error'])) {
                $this->User_model->addUser($values['username'], $values['email'], $values['password']);

                redirect('admin/user', 'refresh');
            }
        }

        $this->load->view('header');
        $this->load->view('admin/user/add_user', $data);
        $this->load->view('footer');
    }

    public function edit($id)
    {
        $data = array();

        $user = (array) $this->User_model->getUser($id);

        $user['password']         = '';
        $user['password_confirm'] = '';

        $values = $this->input->post();

        if ($values) {

            if (empty($values['username'])) {
                $data['error']['username'] = 'Nom d\'utilisateur : champ requis';
            }

            if ($values['username'] !== $user['username'] && $this->User_model->getUserByUsername($values['username'])) {
                $data['error']['username'] = 'Nom d\'utilisateur : ce nom existe deja';
            }

            if (empty($values['email'])) {
                $data['error']['email'] = 'Adresse email : Champ requis';
            }

            if ($values['email'] !== $user['email'] && $this->User_model->getUserByEmail($values['email'])) {
                $data['error']['email'] = 'Adresse email : cette adresse email existe deja';
            }

            if (!empty($values['password']) && empty($values['password_confirm'])) {
                $data['error']['password_confirm'] = 'Confirmation mot de passe : champ requis';
            }

            if (!empty($values['password']) && $values['password_confirm'] !== $values['password']) {
                $data['error']['password_confirm'] = 'Confirmation mot de passe : le mot de passe ne correspond pas';
            }

            if (empty($data['error'])) {
                $this->User_model->editUser($id, $values['username'], $values['email'], $values['password']);

                redirect('admin/user/edit/' . $id, 'refresh');
            }
        }

        $data['values'] = array_merge($user, $values);

        $this->load->view('header');
        $this->load->view('admin/user/edit_user', $data);
        $this->load->view('footer');
    }

    public function view($id)
    {
        $data = array();

        $user = (array) $this->User_model->getUser($id);

        if (!$user) {
            show_404();
            exit;
        }

        $data['values'] = $user;

        $this->load->view('header');
        $this->load->view('admin/user/view_user', $data);
        $this->load->view('footer');
    }
}