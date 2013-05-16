<?php

/*
 * Model Mobile
 * Maintainer : Sofia Umaroh
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_mobile extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_all_course($id_topic) {
        $this->db->select('*');
        $this->db->from('course_topic');
        $this->db->join('course', 'course.id_course=course_topic.course_id');
        $this->db->where('course_topic.topic_id', $id_topic);
        return $this->db->get();
    }

    function select_all_course_faculty($id_faculty) {
        $this->db->select('*');
        $this->db->from('course_faculty');
        $this->db->join('course', 'course.id_course=course_faculty.course_id');
        $this->db->where('course_faculty.faculty_id', $id_faculty);
        return $this->db->get();
    }

    function select_all_content($id_course) {
        $this->db->select('*');
        $this->db->from('content_course');
        $this->db->join('content', 'content.id_content=content_course.content_id');
        $names = array('0', '2', '3');
        $this->db->where('content_course.course_id', $id_course);
        $this->db->where_in('type', $names);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        return $this->db->get();
    }

    function select_all_video() {
        $this->db->select('*');
        $this->db->from('content');
        $names = array('0', '2', '3');
        $this->db->where_in('type', $names);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        return $this->db->get();
    }

    function select_video($id_content) {
        $this->db->select('*');
        $this->db->from('content');
        $names = array('0', '2', '3');
        $this->db->where('show', 1);
        $this->db->where_in('type', $names);
        return $this->db->get();
    }

    function select_all_topic() {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('status', 5);
        return $this->db->get();
    }

    function select_all_faculty() {
        $this->db->select('*');
        $this->db->from('faculty');
        return $this->db->get();
    }

    function select_content_by_id($id_content) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_content', $id_content);
        return $this->db->get();
    }

}