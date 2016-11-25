<?php

class WOW_class_model extends CI_Model
{
    public function insertClass($id, $name, $powerType)
    {
        $this->db->set(array(
            'id'        => $id,
            'name'      => $name,
            'powerType' => $powerType,
        ));

        return $this->db->insert('wow_class');
    }

    public function updateClass($id, $name, $powerType)
    {
        $this->db->set(array(
            'name'      => $name,
            'powerType' => $powerType,
        ))->where('id', $id);

        return $this->db->update('wow_class');
    }

    public function getClass($id)
    {
        $this->db->where('id', $id);
        $this->db->from('wow_class');

        return $this->db->get()->row();
    }

    public function getClasses()
    {
        $this->db->select('id, name, powerType');
        $this->db->from('wow_class');

        return $this->db->get()->result();
    }
}