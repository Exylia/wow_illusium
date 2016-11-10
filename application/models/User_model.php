<?php

class User_model extends CI_Model
{

    public function add_user($username, $email, $password) {
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('password', $password);

        return $this->db->insert('user');
    }

    public function delete_user($id) {
        $this->db->where('id', $id);

        return $this->db->delete('user');
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);

        return $this->db->get();
    }

    public function get_user_by_username($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);

        return $this->db->get();
    }

}