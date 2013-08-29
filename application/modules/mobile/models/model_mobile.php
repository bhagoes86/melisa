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

    /*
     * Feed
     */

    function select_feed_new() {
        $this->db->select('*');
        $this->db->from('wall');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->order_by('id_wall', 'DESC');
        $this->db->limit(50);
        return $this->db->get();
    }

    function get_feed($offset = 0) {
        $this->db->select('*');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->order_by('id_wall', 'DESC');
        $query = $this->db->get('wall', 10, $offset);
        return $query->result();
    }

    function num_feed() {
        $this->db->select('*');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->order_by('id_wall', 'DESC');
        $query = $this->db->count_all_results('wall');
        return $query;
    }

    function select_feed_by_id($id) {
        $this->db->select('*');
        $this->db->from('wall');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->where('users.id', $id);
        $this->db->order_by('id_wall', 'DESC');
        $this->db->limit(50);
        return $this->db->get();
    }

    function insert_feed($data) {
        $this->db->insert('wall', $data);
        return $this->db->insert_id();
    }

    /*
     * Course
     */

    function get_course($offset = 0) {
        $this->db->select('*');
        $this->db->join('users', 'users.id=course.user_id');
        $this->db->where('show', '1');
        $this->db->order_by('id_course', 'DESC');
        $query = $this->db->get('course', 10, $offset);
        return $query->result();
    }

    function num_course() {
        $this->db->select('*');
        $this->db->join('users', 'users.id=course.user_id');
        $this->db->where('show', '1');
        $this->db->order_by('id_course', 'DESC');
        $query = $this->db->count_all_results('course');
        return $query;
    }

}