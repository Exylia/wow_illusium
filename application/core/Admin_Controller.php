<?php

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');


        if ($this->session->userdata('is_logged') == 0 || !in_array('admin', $this->session->userdata('acl'))) {
            show_404();
            exit;
        }
    }
}