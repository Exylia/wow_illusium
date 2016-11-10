<?php

class User extends MY_Controller {

    public function signup() {
        $this->load->helper('form');
        if (!empty($this->input->post())) {

        }

        $this->load->view('header');
        $this->load->view('user/signup');
        $this->load->view('footer');
    }

    public function login() {

    }

    public function logout() {
        $this->session->sess_destroy();
    }

}