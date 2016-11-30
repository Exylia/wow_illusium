<?php

class Event extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->lang->load('event', 'french');
    }

    public function index()
    {
        $data = array();

        $events = $this->Event_model->getFutureEvents();

        foreach($events as $event) {
            $data['events'][$event->date_start][] = $event;
        }

        if (empty($data['events'])) {
            $data['events'] = array();
        }

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/event'),
                'label'  => lang('rubrique_admin_event'),
                'active' => 1
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_event'));
        $this->load->view('admin/event/index', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        $data = array();

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/event'),
                'label'  => lang('rubrique_admin_event'),
            ),
            array(
                'url'    => site_url('admin/event/add'),
                'label'  => lang('rubrique_admin_event_add'),
                'active' => 1
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_event'));
        $this->load->view('admin/event/add_event', $data);
        $this->load->view('footer');
    }

}