<?php

class Api_blizzard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('api_blizzard', 'french');
    }

    public function index()
    {
        $data = array();
        $data['page'] = 'general';

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/user'),
                'label'  => lang('rubrique_admin_api_blizzard'),
                'active' => 1
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_api_blizzard'));
        $this->load->view('admin/api_blizzard/index', $data);
        $this->load->view('footer');
    }

    public function raid()
    {
        $data = array();
        $data['page'] = 'raid';

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/user'),
                'label'  => lang('rubrique_admin_api_blizzard'),
                'active' => 1
            ),
        );

        $curl_params = array(
            'method' => 'GET',
            'url'    => 'https://eu.api.battle.net/wow/character/uldaman/ghiblik?fields=achievements&local=fr_FR&apikey=gf5ynqfqhzzrsmjr556c5t8nmf7fvrp5',
        );

        $this->load->library('curl', $curl_params);

        var_dump($this->curl->send());

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_api_blizzard'));
        $this->load->view('admin/api_blizzard/index', $data);
        $this->load->view('footer');
    }

    public function traduction()
    {
        $data = array();
        $data['page'] = 'traduction';

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/user'),
                'label'  => lang('rubrique_admin_api_blizzard'),
                'active' => 1
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_api_blizzard'));
        $this->load->view('admin/api_blizzard/index', $data);
        $this->load->view('footer');
    }

    public function ajax($action) {
        switch ($action) {
            case 'update_class':
                break;

            case 'update_race':
                break;

            case 'update_raid':
                break;
        }
    }
}