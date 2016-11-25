<?php

class WOW_race_model extends CI_Model
{
    public function insertRace($id, $name, $side)
    {
        $this->db->set(array(
            'id'   => $id,
            'name' => $name,
            'side' => $side,
        ));

        return $this->db->insert('wow_race');
    }

    public function updateRace($id, $name, $side)
    {
        $this->db->set(array(
            'name' => $name,
            'side' => $side,
        ))->where('id', $id);

        return $this->db->update('wow_race');
    }

    public function getRace($id)
    {
        $this->db->where('id', $id);
        $this->db->from('wow_race');

        return $this->db->get()->row();
    }

    public function getRaces()
    {
        $this->db->select('id, name, side');
        $this->db->from('wow_race');

        return $this->db->get()->result();
    }
}