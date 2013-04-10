<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_authz extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function register_user($id) {
        print_r($id);
    }

    function select_all() {
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get();
    }

    function update_user($id, $username, $password, $email) {
        $this->db->where('id', $id);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('email', $email);
        $this->db->update('users');
    }

    function delete_user_db($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    function select_one($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function update_active($id, $status) {
        $this->db->where('id', $id);
        $this->db->set('active', $status);
        $this->db->update('users');
    }

}