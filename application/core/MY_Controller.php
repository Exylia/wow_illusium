<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('language');
        $this->lang->load('global', 'french');
    }

}

require(APPPATH.'core/Admin_Controller.php');