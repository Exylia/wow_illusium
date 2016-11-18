<?php

class Roster_model extends CI_Model
{
    public function listRosters()
    {
        $this->db->select('*');
        $this->db->from('roster');

        return $this->db->get()->result();
    }
}