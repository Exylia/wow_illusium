<?php

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('User_model');
        $this->lang->load('user', 'french');
    }

    public function signup()
    {

        $data = array();

        $breadcrumb = array(
            array(
                'url'    => site_url('user/signup'),
                'label'  => $this->lang->line('rubrique_signup'),
                'active' => 1,
            ),
        );

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
                $this->User_model->addUser($this->input->post('username'), $this->input->post('email'), $this->input->post('password'));

                redirect('', 'refresh');
            }
        }

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('user/signup', $data);
        $this->load->view('footer');
    }

    public function login()
    {
        $data = array();

        $breadcrumb = array(
            array(
                'url'    => site_url('user/login'),
                'label'  => $this->lang->line('rubrique_login'),
                'active' => 1,
            ),
        );

        $values = $this->input->post();

        $data['values'] = $values;

        if ($values) {
            if (empty($values['username'])) {
                $data['error']['username'] = 'Nom d\'utilisateur : champ requis';
            }

            if (empty($values['password'])) {
                $data['error']['password'] = 'Mot de passe : champ requis';
            }

            if (empty($error)) {
                $user = $this->User_model->getUserByUsername($values['username']);

                if (!$user) {
                    $data['error']['username'] = 'Utilisateur incorrect';
                } else {
                    if ($user->password != md5($values['password'])) {
                        $data['error']['password'] = 'Mot de passe incorrect';
                    } else {
                        $this->session->set_userdata(array(
                            'id'        => $user->id,
                            'username'  => $user->username,
                            'email'     => $user->email,
                            'is_logged' => 1,
                            'acl'       => explode('|', $user->acl),
                        ));

                        redirect('', 'refresh');
                    }
                }
            }
        }

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('user/login', $data);
        $this->load->view('footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }

}