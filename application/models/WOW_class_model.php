<?php

class WOW_class_model extends CI_Model
{
    public function addClass($id, $name, $powerType)
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
}