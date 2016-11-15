<?php

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->lang->load('user', 'french');
    }

    public function listUsers()
    {
        $data['users'] = $this->User_model->listUsers();

        $this->load->view('header');
        $this->load->view('admin/user/list_users.php', $data);
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
}