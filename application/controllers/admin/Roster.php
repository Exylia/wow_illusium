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
                'url'    => site_url('admin/roster'),
                'label'  => lang('rubrique_admin_roster'),
                'active' => 1,
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_roster'));
        $this->load->view('admin/roster/list_rosters', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        $data = array();

        $values = $this->input->post();

        $data['values'] = $values;

        if ($values) {
            if (empty($values['name'])) {
                $data['error']['name'] = 'Nom du roster : champ requis';
            }

            if (empty($data['error'])) {
                $this->Roster_model->addRoster($values['name']);

                redirect('admin/roster', 'refresh');
            }
        }

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/roster'),
                'label'  => lang('rubrique_admin_roster'),
            ),
            array(
                'url'    => site_url('admin/roster/add'),
                'label'  => lang('rubrique_admin_roster_add'),
                'active' => 1,
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_roster'));
        $this->load->view('admin/roster/add_roster', $data);
        $this->load->view('footer');
    }

    public function edit($id)
    {
        $data = array();

        $roster = (array) $this->Roster_model->getRoster($id);

        $values = $this->input->post();

        if ($values) {

            if (empty($values['name'])) {
                $data['error']['name'] = 'Nom du roster : champ requis';
            }

            if (empty($data['error'])) {
                $this->Roster_model->editRoster($id, $values['name']);

                redirect('admin/roster/view/' . $id, 'refresh');
            }
        }

        $data['values'] = array_merge($roster, $values);

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/roster'),
                'label'  => lang('rubrique_admin_roster'),
            ),
            array(
                'url'    => site_url('admin/roster/edit'),
                'label'  => lang('rubrique_admin_roster_edit'),
                'active' => 1,
            ),
        );

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_roster'));
        $this->load->view('admin/roster/edit_roster', $data);
        $this->load->view('footer');
    }

    public function view($id)
    {
        $data = array();

        $roster = (array) $this->Roster_model->getRoster($id);

        $roster_characters = (array) $this->Roster_model->getCharacters($id);

        if (!$roster) {
            show_404();
            exit;
        }

        $breadcrumb = array(
            array(
                'url'    => site_url('admin'),
                'label'  => lang('rubrique_admin'),
            ),
            array(
                'url'    => site_url('admin/roster'),
                'label'  => lang('rubrique_admin_roster'),
            ),
            array(
                'url'    => site_url('admin/roster/view'),
                'label'  => lang('rubrique_admin_roster_view'),
                'active' => 1,
            ),
        );

        $data['values'] = $roster;

        $this->load->view('header', array('breadcrumb' => $breadcrumb));
        $this->load->view('admin/menu_left', array('rubrique' => 'admin_roster'));
        $this->load->view('admin/roster/view_roster', $data);
        $this->load->view('footer');
    }

    public function delete($id)
    {
        $this->Roster_model->deleteRoster($id);
        redirect('admin/roster', 'refresh');
    }
}
