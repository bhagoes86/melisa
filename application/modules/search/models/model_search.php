<?php

/*
 * Modul Model Search
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_search extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_course_by_title($course) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->like('course', $course);
        return $this->db->get();
    }

    function select_content_by_title_type($title, $type) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->like('title', $title);
        $this->db->where_in('type', $type);
        $this->db->where('show', 1);
        return $this->db->get();
    }

}