<?php

class WOW_zone_model extends CI_Model
{
    public function insertZone($id, $name, $type, $expansionId)
    {
        $this->db->set(array(
            'id'          => $id,
            'name'        => $name,
            'type'        => $type,
            'expansionId' => $expansionId,
        ));

        return $this->db->insert('wow_zone');
    }

    public function updateZone($id, $name, $type, $expansionId)
    {
        $this->db->set(array(
            'name'        => $name,
            'type'        => $type,
            'expansionId' => $expansionId,
        ))->where('id', $id);

        return $this->db->update('wow_zone');
    }

    public function getZone($id)
    {
        $this->db->select('id, name, type, expansionId');
        $this->db->where('id', $id);
        $this->db->from('wow_zone');

        return $this->db->get()->row();
    }

    public function getZones()
    {
        $this->db->select('id, name, type, expansionId');
        $this->db->from('wow_zone');

        return $this->db->get()->result();
    }
}