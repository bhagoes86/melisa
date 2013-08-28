<?php

/*
 * Model Mobile
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_mobile extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_course_public() {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('show', 1);
        return $this->db->get();
    }

    function select_user_info($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get();
    }

}