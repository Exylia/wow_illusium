<?php

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->listUsers();
    }

    public function listUsers() {


        $data['users'] = $this->User_model->listUsers();

        $this->load->view('header');
        $this->load->view('admin/list_users.php', $data);
        $this->load->view('footer');
    }
}