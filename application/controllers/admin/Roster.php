<?php

class Roster extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Roster_model');
        $this->lang->load('roster', 'french');
    }

    public function listCharacters()
    {
        $data['rosters'] = $this->Roster_model->listRosters();

        $breadcrumb = array(
            array(
                'url'   => site_url('admin'),
                'label' => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/user'),
                'label'  => lang('rubrique_admin_roster'),
                'active' => 1,
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left');
        $this->load->view('admin/roster/list_rosters', $data);
        $this->load->view('footer');
    }
}
