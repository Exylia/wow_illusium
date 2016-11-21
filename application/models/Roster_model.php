<?php

class Roster_model extends CI_Model
{
    public function addRoster($name)
    {
        $this->db->set('name', $name);

        return $this->db->insert('roster');
    }

    public function editRoster($id, $name)
    {
        $this->db->set('name', $name);
        $this->db->where('id', $id);

        return $this->db->update('roster');
    }

    public function deleteRoster($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('roster');
    }

    public function getRoster($id)
    {
        $this->db->select('id, name');
        $this->db->from('roster');

        return $this->db->get()->row();
    }

    public function listRosters()
    {
        $this->db->select('*');
        $this->db->from('roster');

        return $this->db->get()->result();
    }

    public function getCharacters($id)
    {
        $this->db->select('*');
        $this->db->from('roster_character');
        $this->db->join('character', 'character.id = roster_character.character_id');
        $this->db->where('roster_id', $id);

        return $this->db->get()->result();
    }
}