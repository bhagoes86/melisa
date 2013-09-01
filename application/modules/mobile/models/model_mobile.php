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

    function get_feed_by_id($offset = 0, $id) {
        $this->db->select('*');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->where('wall.user_id', $id);
        $this->db->or_where('wall.user_idto', $id);
        $this->db->order_by('id_wall', 'DESC');
        $query = $this->db->get('wall', 10, $offset);
        return $query->result();
    }

    function num_feed_by_id($param) {
        $this->db->select('*');
        $this->db->join('users', 'users.id=wall.user_id');
        $this->db->where('wall.user_id', $id);
        $this->db->or_where('wall.user_idto', $id);
        $this->db->order_by('id_wall', 'DESC');
        $query = $this->db->count_all_results('wall');
        return $query;
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

    function select_detail_course($id_course) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id_course', $id_course);
        return $this->db->get();
    }

    function select_course_syllabus_parent($id_course) {
        $this->db->select('*');
        $this->db->from('course_silabus');
        $this->db->where('course_id', $id_course);
        $this->db->where('parent_id', 0);
        return $this->db->get();
    }

    function sellect_content_by_syllabus($id_syllabus) {
        $this->db->select('*');
        $this->db->from('content_silabus');
        $this->db->join('content', 'content.id_content = content_silabus.content_id');
        $this->db->where('content_silabus.silabus_id', $id_syllabus);
        return $this->db->get();
    }

    /*
     * Authz
     */

    function select_themes() {
        $this->db->select('*');
        $this->db->from('table_site');
        return $this->db->get();
    }

    /*
     * Content
     */

    function select_content_by_id($id_content) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_content', $id_content);
        return $this->db->get();
    }

    function get_podcast($offset = 0) {
        $this->db->select('*');
        $names = array('0', '2', '3', '6');
        $this->db->where_in('type', $names);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'DESC');
        $query = $this->db->get('content', 10, $offset);
        return $query->result();
    }

    function num_podcast() {
        $this->db->select('*');
        $names = array('0', '2', '3', '6');
        $this->db->where_in('type', $names);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'DESC');
        $query = $this->db->count_all_results('content');
        return $query;
    }

    function select_trending_content() {
        return $this->db->query('SELECT count(tag) as jml, user_id, tag, tag_type from tags group by tag order by jml DESC limit 10');
    }

}