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
    
    function insert_assignment_student($data) {
        $this->db->insert('assignment_file_student', $data);
        return $this->db->insert_id();
    }
    
    function update_assignment_student($id_assignment, $data) {
        $this->db->where('id_assignment_student', $id_assignment);
        $this->db->update('assignment_file_student', $data);
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
    
    function select_assignment_by_course_group($id_course, $id_assignment, $id_group){
    
        $this->db->select('af.start_time as start_time, af.end_time as end_time, ag.id_group as group_id, ag.assignment_id as group_assignment_id, af.title as assignment_title, ag.title as group_title, af.description, af.file_assignment, crs.course');
        $this->db->from('assignment_group as ag');
        $this->db->join('assignment_file as af', 'af.id_assignment = ag.assignment_id');
        $this->db->join('course as crs', 'crs.id_course = af.course_id');
        
        $this->db->where('af.deleted', 0);
        $this->db->where('ag.deleted', 0);
        $this->db->where('af.status', 1);
        $this->db->where('crs.show', 1);
        
        $this->db->where('crs.id_course', $id_course);
        $this->db->where('af.id_assignment', $id_assignment);
        $this->db->where('ag.id_group', $id_group);
        
        $this->db->order_by('ag.id_group', 'desc');
        
        return $this->db->get();
    }
    
    function select_assignment_submited_by_cag($user_id, $course_id, $assignment_id, $group_id){
        $this->db->select('*');
        $this->db->from('assignment_file_student as afs');
        $this->db->join('users as usr', 'usr.id = afs.user_id');
        $this->db->where('afs.course_id', $course_id);
        $this->db->where('afs.assignment_id', $assignment_id);
        $this->db->where('afs.group_id', $group_id);
        
        $this->db->order_by('afs.date_created', 'desc');
        return $this->db->get();
    }
    
    
    function select_assignment_result_by_id($assignment_student_id){
        $this->db->select('afs.course_id, afs.assignment_id, afs.group_id, crs.course, ag.title as group_title, af.title as assignment_title, usr.username, afs.file, afs.description, afs.feedback, afs.score');
        $this->db->from('assignment_file_student as afs');
        $this->db->join('users as usr', 'usr.id = afs.user_id');
        $this->db->join('course as crs', 'crs.id_course = afs.course_id');
        $this->db->join('assignment_group as ag', 'ag.id_group = afs.group_id');
        $this->db->join('assignment_file as af', 'af.id_assignment = afs.assignment_id');
        $this->db->where('afs.id_assignment_student', $assignment_student_id);
        
        return $this->db->get();
    }
    
    function select_assignment_result_by_user($user_id){
        $this->db->select('afs.course_id, afs.assignment_id, afs.group_id, crs.course, ag.title as group_title, af.title as assignment_title, af.file_assignment, usr.username, afs.file, afs.description, afs.feedback, afs.score');
        $this->db->from('assignment_file_student as afs');
        $this->db->join('course as crs', 'crs.id_course = afs.course_id');
        $this->db->join('assignment_group as ag', 'ag.id_group = afs.group_id');
        $this->db->join('assignment_file as af', 'af.id_assignment = afs.assignment_id');
        $this->db->join('users as usr', 'usr.id = af.user_id');
        $this->db->where('afs.user_id', $user_id);
        
        return $this->db->get();
    }
    
}