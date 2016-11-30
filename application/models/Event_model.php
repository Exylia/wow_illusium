<?php

class Event_model extends CI_Model
{

    public function addEvent($name, $description, $date_start, $date_end)
    {
        $this->db->set(array(
            'name'     => $name,
            'description' => $description,
            'date_start'  => $date_start,
            'date_end'    => $date_end,
        ));

        return $this->db->insert('event');
    }

    public function editEvent($id, $name, $description, $date_start, $date_end)
    {
        $this->db->set(array(
            'name'     => $name,
            'description' => $description,
            'date_start'  => $date_start,
            'date_end'    => $date_end,
        ));

        $this->db->where('id', $id);

        return $this->db->update('event');
    }

    public function getEvent($id)
    {
        $this->db->select('id, name, description, date_start, date_end');
        $this->db->where('id', $id);

        return $this->db->get('event')->row();
    }

    public function getEvents()
    {
        $this->db->select('id, name, description, date_start, date_end');

        return $this->db->get('event')->result();
    }

    public function getFutureEvents()
    {
        $this->db->select('id, name, description, date_start, date_end');
        $this->db->where('date_start >=', date('Y-m-d'));

        return $this->db->get('event')->result();
    }

    public function delete($id)
    {
        return $this->db->delete('event', array('id' => $id));
    }
}