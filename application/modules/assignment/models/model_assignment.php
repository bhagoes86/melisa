<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_assignment extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_all_assignment($user_id) {
        $this->db->select('*');
        $this->db->from('assignment_file');
        $this->db->where('user_id', $user_id);
        $this->db->where('deleted', 0);
        $this->db->order_by('date_modified', 'desc');
        return $this->db->get();
    }
    
    function select_assignment_by_id($id_assignment){
        $this->db->select('*');
        $this->db->from('assignment_file');
        $this->db->where('id_assignment', $id_assignment);
        return $this->db->get();
    }
    
    function insert_assignment($data) {
        $this->db->insert('assignment_file', $data);
        return $this->db->insert_id();
    }
    
    function update_assignment($id_assignment, $data) {
        $this->db->where('id_assignment', $id_assignment);
        $this->db->update('assignment_file', $data);
    }
    
    
    function select_all_course($user_id){
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }
    
    function select_course_by_assignment_id($user_id, $assignment_id){
        $this->db->select('*');
        $this->db->from('course');
        $this->db->join('assignment_file', 'course.id_course=assignment_file.course_id');
        $this->db->where('assignment_file.user_id', $user_id);
        $this->db->where('assignment_file.deleted', 0);
        $this->db->where('assignment_file.course_id !=', 0);
        $this->db->where('assignment_file.id_assignment', $assignment_id);
        
        
        return $this->db->get();
    }
    
    function check_course_by_assignment_id($course_id, $assignment_id) {
        $this->db->select('*');
        $this->db->from('assignment_file');
        $this->db->where('course_id', $course_id);
        $this->db->where('id_assignment', $assignment_id);
        return $this->db->get();
    }
    
    function select_group_by_assignment($id_assignment){
        $this->db->select('*');
        $this->db->from('assignment_group');
        $this->db->where('assignment_id', $id_assignment);
        $this->db->where('assignment_group.deleted', 0);
        $this->db->order_by('date_modified', 'desc');
        return $this->db->get();
    }
    
    function insert_group($data) {
        $this->db->insert('assignment_group', $data);
        return $this->db->insert_id();
    }
    
    function update_group($id_group, $data) {
        $this->db->where('id_group', $id_group);
        $this->db->update('assignment_group', $data);
    }
    
    function select_group_by_id($id_group){
        $this->db->select('*');
        $this->db->from('assignment_group');
        $this->db->where('id_group', $id_group);
        return $this->db->get();
    }
}