<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_quiz extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_user_quiz_participate($user_id, $course_id, $quiz_id, $group_id){
        $this->db->select('*');
        $this->db->from('quiz_result');
        $this->db->where('user_id', $user_id);
        $this->db->where('course_id', $course_id);
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('group_id', $group_id);

        return $this->db->get();
    }
    
    function insert_quiz($data) {
        $this->db->insert('quiz_file', $data);
        return $this->db->insert_id();
    }

    function insert_soal($data) {
        $this->db->insert('quiz_soal', $data);
        return $this->db->insert_id();
    }

    function insert_choice($data) {
        $this->db->insert('quiz_choice', $data);
        return $this->db->insert_id();
    }

    function insert_answer_log($data) {
        $this->db->insert('quiz_answer_log', $data);
        return $this->db->insert_id();
    }

    function insert_group($data) {
        $this->db->insert('quiz_group', $data);
        return $this->db->insert_id();
    }

    function insert_quiz_result($data) {
        $this->db->insert('quiz_result', $data);
        return $this->db->insert_id();
    }

    
    function update_quiz($id_quiz, $data) {
        $this->db->where('id_quiz', $id_quiz);
        $this->db->update('quiz_file', $data);
    }

    function update_quiz_result($id_result, $data) {
        $this->db->where('id_result', $id_result);
        $this->db->update('quiz_result', $data);
    }

    function select_pass_tryout($user_id, $group_id, $quiz_id){
        $this->db->select('*');
        $this->db->from('quiz_pass_tryout');
        $this->db->where('user_id', $user_id);
        $this->db->where('group_id', $group_id);
        $this->db->where('quiz_id', $quiz_id);


        $this->db->order_by('date', 'desc');

        return $this->db->get();
    }
    
    function select_pass_tryout_by_group($group_id){
        $this->db->select('*');
        $this->db->from('quiz_pass_tryout');
        $this->db->where('group_id', $group_id);

        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_pass_tryout_by_cqg_pass($course_id, $quiz_id, $group_id, $password){
        $this->db->select('*');
        $this->db->from('quiz_pass_tryout');
        $this->db->where('course_id', $course_id);
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('group_id', $group_id);

        $this->db->where('password', $password);
        $this->db->where('expired !=', 1);

        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_pass_tryout_by_cqg_user($course_id, $quiz_id, $group_id, $user_id){
        $this->db->select('*');
        $this->db->from('quiz_pass_tryout');
        $this->db->where('course_id', $course_id);
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('group_id', $group_id);

        $this->db->where('participant_user_id', $user_id);
        

        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_quiz_result_by_cqg_user($course_id, $quiz_id, $group_id, $user_id){
        $this->db->select('*');
        $this->db->from('quiz_result');
        $this->db->where('course_id', $course_id);
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('group_id', $group_id);

        $this->db->where('user_id', $user_id);
        $this->db->where('status', 1);

        $this->db->order_by('finish_time', 'desc');
        return $this->db->get();
    }
    
    function select_all_course($user_id){
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('user_id', $user_id);
        
        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_course_by_group_id($group_id){
        $this->db->select('*');
        $this->db->from('quiz_course_group');
        $this->db->join('course', 'course.id_course=quiz_course_group.course_id');
        $this->db->where('quiz_course_group.deleted',0);
        $this->db->where('quiz_course_group.group_id', $group_id);

        return $this->db->get();
    }

    function select_user_by_id ($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get();
    }
    function select_course_by_quiz_id($user_id, $quiz_id){
        $this->db->select('*');
        $this->db->from('quiz_course');
        $this->db->join('course', 'course.id_course=quiz_course.course_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('quiz_course.deleted',0);
        $this->db->where('quiz_course.quiz_id', $quiz_id);
        
        return $this->db->get();
    }

    function select_all_quiz_resource($user_id){
        $this->db->select('*');
        $this->db->from('quiz_resource');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_quiz_resource_by_id($id_quiz_resource){
        $this->db->select('*');
        $this->db->from('quiz_resource');
        $this->db->where('id_quiz_resource', $id_quiz_resource);
        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }
    

    function select_all_quiz($user_id) {
        $this->db->select('*');
        $this->db->from('quiz_file');
        $this->db->where('user_id', $user_id);
        $this->db->where('deleted', 1);
        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_avail_quiz() {
        $this->db->select('*');
        $this->db->from('quiz_file');
        $this->db->where('status', 1);
        $this->db->order_by('date', 'asc');
        return $this->db->get();
    }


    function select_soal_by_quiz($id_quiz){
        $this->db->select('*');
        $this->db->from('quiz_soal');
        $this->db->where('quiz_id', $id_quiz);
        $this->db->where('deleted', 1);
        $this->db->order_by('id_soal');
        return $this->db->get();
    }

    function select_group_by_quiz($id_quiz){
        $this->db->select('*');
        $this->db->from('quiz_group');
        $this->db->where('quiz_id', $id_quiz);
        $this->db->order_by('date_modified', 'desc');
        return $this->db->get();
    }

    function select_choice_by_soal($id_soal){
        $this->db->select('*');
        $this->db->from('quiz_choice');
        $this->db->where('soal_id', $id_soal);
        $this->db->where('deleted', 1);
        
        return $this->db->get();
    }

    function select_user_answer_by_soal($result_id, $soal_id){
        $this->db->select('*');
        $this->db->from('quiz_answer_log');
        $this->db->where('result_id', $result_id);
        $this->db->where('soal_id', $soal_id);
        return $this->db->get();
    }

    function select_user_answer_by_result_id($result_id){
        $this->db->select('*');
        $this->db->from('quiz_answer_log');
        $this->db->where('result_id', $result_id);
        return $this->db->get();
    }


    
    function select_key_choice_by_soal($id_soal, $answer_key){
        $this->db->select('*');
        $this->db->from('quiz_choice');
        $this->db->where('soal_id', $id_soal);
        $this->db->where('option_idx', $answer_key);
        $this->db->where('deleted', 1);

        return $this->db->get();
    }

    function select_other_choice_by_soal($key_answer, $id_soal){
        $this->db->select('*');
        $this->db->from('quiz_choice');
        $this->db->where('soal_id', $id_soal);
        $this->db->where('option_idx !=', $key_answer);
        $this->db->where('deleted', 1);

        return $this->db->get();
    }

    function select_last_choice($id_soal){
        $this->db->select_max('option_idx');
        $this->db->from('quiz_choice');
        $this->db->where('soal_id', $id_soal);
        return $this->db->get();
    }

    function select_min_answer_show( $quiz_id){
  
        return $this->db->query('select min(qc.count_choice) as count_choice from (SELECT count( id_choice ) as count_choice FROM quiz_choice WHERE quiz_id = '.$quiz_id.' and deleted = 1 GROUP BY soal_id ) as qc');
        
    }
    
    function select_quiz_by_course($course_id, $user_id){
        $this->db->select('*');
        $this->db->from('quiz_course');
        $this->db->join('quiz_file', 'quiz_course.quiz_id=quiz_file.id_quiz');
        $this->db->where('quiz_course.course_id', $course_id);
        $this->db->where('user_id', $user_id);
        $this->db->order_by('date', 'desc');
        return $this->db->get();
    }

    function select_quiz_by_id($id_quiz){
        $this->db->select('*');
        $this->db->from('quiz_file');
        $this->db->where('id_quiz', $id_quiz);
        return $this->db->get();
    }
    
    function select_soal_by_id($id_soal){
        $this->db->select('*');
        $this->db->from('quiz_soal');
        $this->db->where('id_soal', $id_soal);
        return $this->db->get();
    }

    function select_choice_by_id($id_choice){
        $this->db->select('*');
        $this->db->from('quiz_choice');
        $this->db->where('id_choice', $id_choice);
        
        return $this->db->get();
    }

    function select_group_by_id($id_group){
        $this->db->select('*');
        $this->db->from('quiz_group');
        $this->db->where('id_group', $id_group);
        return $this->db->get();
    }

    function select_course_by_id($id_course){
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id_course', $id_course);
        return $this->db->get();
    }

    function check_quiz_result_by_cqg_user($user_id, $course_id, $quiz_id, $group_id){
        $this->db->select('*');
        $this->db->from('quiz_result');
        $this->db->where('user_id', $user_id);
        $this->db->where('course_id', $course_id);
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('group_id', $group_id);
        $this->db->where('status', 1);
        
        return $this->db->get();
    }
    function select_quiz_result_by_course_quiz_group($user_id, $course_id, $quiz_id, $group_id, $status){
        $this->db->select('qr.id_result, qr.user_id, qr.course_id, qr.quiz_id, qr.group_id, qr.score, qr.right_answer, qr.wrong_answer, qr.start_time, qr.end_time, qr.finish_time, usr.username, usr.email, usr.first_name, usr.last_name, usr.phone');
        $this->db->from('quiz_result as qr');
        $this->db->join('users as usr', 'qr.user_id = usr.id');
        $this->db->where('qr.user_id !=', $user_id);
        $this->db->where('qr.course_id', $course_id);
        $this->db->where('qr.quiz_id', $quiz_id);
        $this->db->where('qr.group_id', $group_id);
        $this->db->where('qr.status', $status);
        $this->db->order_by('qr.end_time', 'desc');
        return $this->db->get();
    }

    function select_quiz_result_by_user($user_id, $status){
        $this->db->select('qr.id_result, qr.user_id, qr.course_id, qr.quiz_id, qr.group_id, qr.score, qr.right_answer, qr.wrong_answer, qr.start_time, qr.end_time, qr.finish_time, qf.title as quiz_title, qg.title as group_title, crs.course as course_title, usr.username as owner_quiz');
        $this->db->from('quiz_result as qr');
        
        $this->db->join('quiz_file as qf', 'qf.id_quiz = qr.quiz_id');
        $this->db->join('quiz_group as qg', 'qg.id_group = qr.group_id');
        $this->db->join('course as crs', 'crs.id_course = qr.course_id');
        $this->db->join('users as usr', 'usr.id = qf.user_id');
        
        $this->db->where('qr.user_id =', $user_id);
        $this->db->where('qr.status', $status);
        $this->db->where('qf.user_id != ', $user_id );
        $this->db->order_by('qr.end_time', 'desc');
        return $this->db->get();
    }

    // [HARUS DIUBAH]
    function select_course_group_by_quiz($user_id, $quiz_id, $course_id){
        $this->db->select('qf.id_quiz as id_quiz, qg.id_group as id_group, crs.id_course as id_course, qf.title as quiz_title, qg.title as group_title, crs.course as course_title, qg.status as qg_status');
        $this->db->from('quiz_file as qf');
        $this->db->join('quiz_course as qc', 'qc.quiz_id=qf.id_quiz');
        $this->db->join('course as crs', 'qc.course_id=crs.id_course');
        $this->db->join('quiz_course_group as qcg', 'qcg.course_id = crs.id_course ');
        $this->db->join('quiz_group as qg', 'qcg.group_id = qg.id_group');

        $this->db->where('qf.deleted', 1);
        $this->db->where('qc.deleted', 0);
        $this->db->where('qg.deleted', 0);
        $this->db->where('qcg.deleted', 0);

        $this->db->where('qf.id_quiz', $quiz_id);
        $this->db->where('qf.user_id', $user_id);
        $this->db->where('qc.course_id', $course_id);
        $this->db->where('qcg.course_id', $course_id);
        $this->db->where('qg.quiz_id = qf.id_quiz');

        $this->db->order_by('qg.date_create', 'desc');
        $this->db->order_by('qg.id_group', 'desc');


        return $this->db->get();
    }

    function select_quiz_result_by_quiz_user_group_id($quiz_id, $user_id, $group_id, $id_result){
        $this->db->select('*');
        $this->db->from('quiz_result');
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('group_id', $group_id);
        $this->db->where('id_result', $id_result);

        return $this->db->get();
    }

    function select_quiz_result_by_id($id_result){
        $this->db->select('*');
        $this->db->from('quiz_result');
        $this->db->where('id_result', $id_result);

        return $this->db->get();
    }

    


    function select_quiz_result_by_status($quiz_id, $user_id, $group_id, $status){
        $this->db->select('*');
        $this->db->from('quiz_result');
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('group_id', $group_id);
        $this->db->where('status', $status);
        return $this->db->get();
    }
    
    function check_course_by_quiz_id($course_id, $quiz_id) {
        $this->db->select('*');
        $this->db->from('quiz_course');
        $this->db->where('course_id', $course_id);
        $this->db->where('quiz_id', $quiz_id);
        return $this->db->get();
    }

    function check_course_by_group_id($course_id, $group_id) {
        $this->db->select('*');
        $this->db->from('quiz_course_group');
        $this->db->where('course_id', $course_id);
        $this->db->where('group_id', $group_id);
        return $this->db->get();
    }

    function insert_quiz_pass_tryout($data){
        $this->db->insert('quiz_pass_tryout', $data);
        return $this->db->insert_id();
    }
    
    function insert_quiz_course($data){
        $this->db->insert('quiz_course', $data);
        return $this->db->insert_id();
    }

    function insert_quiz_course_group($data){
        $this->db->insert('quiz_course_group', $data);
        return $this->db->insert_id();
    }
    
    function insert_quiz_resource($data) {
        $this->db->insert('quiz_resource', $data);
        return $this->db->insert_id();
    }

    function delete_quiz_resource($id_quiz_resource){
        $this->db->where('id_quiz_resource', $id_quiz_resource);
        $this->db->delete('quiz_resource');
    }

    function delete_quiz_pass_tryout_by_group($group_id){
        $this->db->where('group_id', $group_id);
        $this->db->delete('quiz_pass_tryout');
    }

    function delete_quiz($id_quiz){
        $this->db->where('id_quiz', $id_quiz);
        $this->db->delete('quiz_file');
    }
    
    function delete_choice($id_choice) {
        $this->db->where('id_choice', $id_choice);
        $this->db->delete('quiz_choice');
    }

    function delete_course($id_course) {
        $this->db->where('course_id', $id_course);
        $this->db->delete('quiz_course');
    }

    function delete_soal($id_soal){
        $this->db->where('id_soal', $id_soal);
        $this->db->delete('quiz_soal');
    }

    function update_pass_tryout($id_pass_tryout, $data) {
        $this->db->where('id_quiz_pass_tryout', $id_pass_tryout);
        $this->db->update('quiz_pass_tryout', $data);
    }

    

    function update_choice($id_choice, $data) {
        $this->db->where('id_choice', $id_choice);
        $this->db->update('quiz_choice', $data);
    }

    function update_group($id_group, $data) {
        $this->db->where('id_group', $id_group);
        $this->db->update('quiz_group', $data);
    }

    function update_quiz_resource($id_resource, $data) {
        $this->db->where('id_quiz_resource', $id_resource);
        $this->db->update('quiz_resource', $data);
    }

    function update_quiz_course($id_course, $data) {
        $this->db->where('id_quiz_course', $id_course);
        $this->db->update('quiz_course', $data);
    }

    function update_quiz_course_group($id_course, $data) {
        $this->db->where('id_quiz_course_group', $id_course);
        $this->db->update('quiz_course_group', $data);
    }
   
    function update_soal($id_soal, $data) {
        $this->db->where('id_soal', $id_soal);
        $this->db->update('quiz_soal', $data);
    }

    function count_avail_quiz($user_id){
        $this->db->select('*');
        $this->db->from('quiz_file');
        $this->db->where('user_id', $user_id);
        $this->db->where('deleted', 1);
        $this->db->order_by('date', 'asc');

        return $this->db->get();
    }

    function count_avail_group(){
        $this->db->select('*');
        $this->db->from('quiz_group');
        $this->db->where('deleted', 0);
        $this->db->order_by('date_modified', 'asc');

        return $this->db->get();
    }

    function count_avail_soal(){
        $this->db->select('*');
        $this->db->from('quiz_soal');
        $this->db->where('deleted', 1);
        $this->db->order_by('date', 'asc');

        return $this->db->get();
    }

    function count_avail_choice($id_soal){
        $this->db->select('*');
        $this->db->from('quiz_choice');
        $this->db->where('deleted', 1);
        $this->db->where('soal_id', $id_soal);
        $this->db->order_by('date', 'asc');

        return $this->db->get();
    }

}