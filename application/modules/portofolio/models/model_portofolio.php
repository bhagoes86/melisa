<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_portofolio extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_profic_user($id) {
        $this->db->select('profic');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get();
    }
    
    function select_users($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function select_metadata($id, $type) {
        $this->db->select('*');
        $this->db->from('user_meta');
        $this->db->where('user_id', $id);
        $this->db->where('type', $type);
        return $this->db->get();
    }

    function update_data_portofolio($id, $type, $informasi) {
        $this->db->where('user_id', $id);
        $this->db->where('type', $type);
        $this->db->set('information', $informasi);
        $this->db->update('user_meta');
    }
    
    function update_name($id,$fname,$lname){
        $this->db->where('id', $id);
        $this->db->set('first_name', $fname);
        $this->db->set('last_name', $lname);
        $this->db->update('users');
    }

    function update_profic($id, $filename) {
        $this->db->where('id', $id);
        $this->db->set('profic', $filename);
        $this->db->update('users');
    }

    function insert_usermeta($id, $type) {
        $this->db->set('user_id', $id);
        $this->db->set('type', $type);
        $this->db->insert('user_meta');
    }

}