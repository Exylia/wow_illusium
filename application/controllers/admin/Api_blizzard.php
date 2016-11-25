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
        $this->load->view('admin/api_blizzard/generale', $data);
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

        $this->load->library('WOW_api');

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
        $this->load->library('WOW_api');

        switch ($action) {
            case 'update_class':
                $this->load->model('WOW_class_model');

                $cptOK = $cptKO = 0;
                $classes = $this->wow_api->getClasses()['classes'];

                foreach ($classes as $class) {
                    if ($this->WOW_class_model->getClass($class['id'])) {
                        $isOk = $this->WOW_class_model->updateClass($class['id'], $class['name'], $class['powerType']);
                    } else {
                        $isOk = $this->WOW_class_model->insertClass($class['id'], $class['name'], $class['powerType']);
                    }

                    if ($isOk) {
                        $cptOK++;
                    }
                    else {
                        $ctpKO++;
                    }
                }

                echo json_encode(array(
                    'status' => 200,
                    'update' => $cptOK,
                    'fail'   => $cptKO,
                ));

                break;

            case 'update_race':
                $this->load->model('WOW_race_model');

                $cptOK = $cptKO = 0;
                $races = $this->wow_api->getRaces()['races'];

                foreach ($races as $race) {
                    if ($this->WOW_race_model->getRace($race['id'])) {
                        $isOk = $this->WOW_race_model->updateRace($race['id'], $race['name'], $race['side']);
                    } else {
                        $isOk = $this->WOW_race_model->insertRace($race['id'], $race['name'], $race['side']);
                    }

                    if ($isOk) {
                        $cptOK++;
                    }
                    else {
                        $ctpKO++;
                    }
                }

                echo json_encode(array(
                    'status' => 200,
                    'update' => $cptOK,
                    'fail'   => $cptKO,
                ));

                break;

            case 'update_raid':
                $this->load->model('WOW_zone_model');

                $cptOK = $cptKO = 0;
                $zones = $this->wow_api->getZones()['zones'];

                foreach ($zones as $zone) {
                    if ($zone['isRaid'] === false) {
                        continue;
                    }

                    if ($this->WOW_zone_model->getZone($zone['id'])) {
                        $isOk = $this->WOW_zone_model->updateZone($zone['id'], $zone['name'], 'raid', $zone['expansionId']);
                    } else {
                        $isOk = $this->WOW_zone_model->insertZone($zone['id'], $zone['name'], 'raid', $zone['expansionId']);
                    }

                    if ($isOk) {
                        $cptOK++;
                    }
                    else {
                        $ctpKO++;
                    }
                }

                echo json_encode(array(
                    'status' => 200,
                    'update' => $cptOK,
                    'fail'   => $cptKO,
                ));
                break;
        }
    }
}