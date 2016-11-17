<?php

class User_model extends CI_Model
{

    public function addUser($username, $email, $password)
    {
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('password', md5($password));

        return $this->db->insert('user');
    }

    public function editUser($id, $username, $email, $password = null)
    {
        $this->db->set('username', $username);
        $this->db->set('email', $email);

        if ($password) {
            $this->db->set('password', md5($password));
        }

        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('user');
    }

    public function getUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function getUserByUsername($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);

        return $this->db->get()->row();
    }

    public function getUserByEmail($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);

        return $this->db->get()->row();
    }

    public function listUsers()
    {
        $this->db->select('*');
        $this->db->from('user');

        return $this->db->get()->result();
    }

}