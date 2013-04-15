<?php

/*
 * Modul Model Content
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Feed extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_content($data) {
        $this->db->insert('content', $data);
        return $this->db->insert_id();
    }

    function update_content($id_content, $data) {
        $this->db->where('id_content', $id_content);
        $this->db->update('content', $data);
    }

    function select_video_review() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('type', 0);
        $this->db->where('show', 0);
        $this->db->where('title !=', '');
        return $this->db->get();
    }

    function select_content_by_id($id_content) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_content', $id_content);
        return $this->db->get();
    }

    function select_content_show($show) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('show', $show);
        $this->db->where('title !=', "");
        return $this->db->get();
    }

    function select_video_show() {
        $this->db->select('*');
        $this->db->from('content');
        $names = array('0', '2', '3');
        $this->db->where_in('type', $names);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        return $this->db->get();
    }

    function select_video_limit_random($limit) {
        $this->db->select('*');
        $this->db->from('content');
        $names = array('0', '2', '3');
        $this->db->where_in('type', $names);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'random');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function insert_content_bookmark($data) {
        $this->db->insert('content_bookmark', $data);
    }

    function select_content_bookmark_by_content_user($content_id, $user_id) {
        $this->db->select('*');
        $this->db->from('content_bookmark');
        $this->db->where('content_id', $content_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get();
    }

    function select_content_bookmark_by_user($user_id) {
        $this->db->select('*');
        $this->db->from('content_bookmark');
        $this->db->join('content', 'content.id_content=content_bookmark.content_id');
        $this->db->where('content_bookmark.user_id', $user_id);
        $this->db->order_by('content_bookmark.id_content_bookmark', 'desc');
        return $this->db->get();
    }

    function delete_content($id_content) {
        $this->db->where('id_content', $id_content);
        $this->db->delete('content');
    }

    function insert_content_log($data) {
        $this->db->insert('content_log', $data);
    }

    function select_category() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('category', 'asc');
        return $this->db->get();
    }

    function select_my_content($user_id, $type) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('user_id', $user_id);
        $this->db->where('title !=', '');
        $this->db->where_in('type', $type);
        $this->db->where_in('show', array('0', '1'));
        $this->db->order_by('id_content', 'desc');
        return $this->db->get();
    }

    function select_faculty() {
        $this->db->select('*');
        $this->db->from('faculty');
        return $this->db->get();
    }

    function select_topic_where_status($status) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('status', $status);
        return $this->db->get();
    }

    function select_topic_where_status_in($status) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where_in('status', $status);
        return $this->db->get();
    }

    function select_course_by_user($user_id) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('user_id', $user_id);
        return $this->db->get();
    }

    function select_content_topic($id_content) {
        $this->db->select('*');
        $this->db->from('content_topic');
        $this->db->join('topic', 'topic.id_topic=content_topic.topic_id');
        $this->db->where('content_topic.content_id', $id_content);
        return $this->db->get();
    }

    function select_content_topic_in($id_content, $status) {
        $this->db->select('*');
        $this->db->from('content_topic');
        $this->db->join('topic', 'topic.id_topic=content_topic.topic_id');
        $this->db->where('content_topic.content_id', $id_content);
        $this->db->where_in('topic.status', $status);
        return $this->db->get();
    }

    function select_content_faculty($id_content) {
        $this->db->select('*');
        $this->db->from('content_faculty');
        $this->db->join('faculty', 'faculty.id_faculty=content_faculty.faculty_id');
        $this->db->where('content_faculty.content_id', $id_content);
        return $this->db->get();
    }

    function select_content_category($id_content) {
        $this->db->select('*');
        $this->db->from('content_category');
        $this->db->join('category', 'category.id_category=content_category.category_id');
        $this->db->where('content_category.content_id', $id_content);
        return $this->db->get();
    }

    function select_content_course($id_content) {
        $this->db->select('*');
        $this->db->from('content_course');
        $this->db->join('course', 'course.id_course=content_course.course_id');
        $this->db->where('content_course.content_id', $id_content);
        return $this->db->get();
    }

    function cek_content_by_category_id($content_id, $category_id) {
        $this->db->select('*');
        $this->db->from('content_category');
        $this->db->where('content_id', $content_id);
        $this->db->where('category_id', $category_id);
        return $this->db->get();
    }

    function insert_content_category($data) {
        $this->db->insert('content_category', $data);
    }

    function cek_content_by_course_id($content_id, $course_id) {
        $this->db->select('*');
        $this->db->from('content_course');
        $this->db->where('content_id', $content_id);
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }

    function insert_content_course($data) {
        $this->db->insert('content_course', $data);
    }

    function select_video_by_category($id_category) {
        $this->db->select('*');
        $this->db->from('content_category');
        $this->db->join('content', 'content.id_content=content_category.content_id');
        $this->db->where('content_category.category_id', $id_category);
        $this->db->where_in('content.type', array('0', '2', '3'));
        $this->db->order_by('content.id_content', 'desc');
        return $this->db->get();
    }

    function select_video_by_type($type, $limit) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('type', $type);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function select_video_by_type_in($type, $limit) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where_in('type', $type);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function cek_content_by_topic_id($content_id, $topic_id) {
        $this->db->select('*');
        $this->db->from('content_topic');
        $this->db->where('content_id', $content_id);
        $this->db->where('topic_id', $topic_id);
        return $this->db->get();
    }

    function insert_content_topic($data) {
        $this->db->insert('content_topic', $data);
    }

    function cek_content_by_faculty_id($content_id, $faculty_id) {
        $this->db->select('*');
        $this->db->from('content_faculty');
        $this->db->where('content_id', $content_id);
        $this->db->where('faculty_id', $faculty_id);
        return $this->db->get();
    }

    function insert_content_faculty($data) {
        $this->db->insert('content_faculty', $data);
    }

    function delete_watch_later($content_id, $user_id) {
        $this->db->where('content_id', $content_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('content_bookmark');
    }

    function delete_content_log($content_id, $user_id) {
        $this->db->where('content_id', $content_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('content_log');
    }

    function select_content_log($user_id, $status, $type) {
        $this->db->select('*');
        $this->db->from('content_log');
        $this->db->join('content', 'content.id_content = content_log.content_id');
        $this->db->where('content_log.user_id', $user_id);
        //0 lihat 2 download
        $this->db->where('content_log.status', $status);
        $this->db->where_in('content_log.type', $type);
        $this->db->group_by('content_log.content_id');
        $this->db->order_by('content_log.id_content_log', 'desc');
        return $this->db->get();
    }

    function select_content_by_type($type) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('type', $type);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        return $this->db->get();
    }

    function select_content_by_type_limit($type, $limit) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('type', $type);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function select_content_by_type_in_limit($type, $limit) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where_in('type', $type);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'desc');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function select_content_by_type_limit_random($type, $limit) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('type', $type);
        $this->db->where('show', 1);
        $this->db->order_by('id_content', 'random');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function delete_content_course($course_id, $content_id) {
        //jimho
        $this->db->where('course_id', $course_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('content_course');
    }

    function delete_content_topic($topic_id, $content_id) {
        //jimho
        $this->db->where('topic_id', $topic_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('content_topic');
    }

    function delete_content_category($category_id, $content_id) {
        //jimho
        $this->db->where('category_id', $category_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('content_category');
    }

    function select_silabus_course($id_course) {
        //jimho
        $this->db->select('*');
        $this->db->from('course_silabus');
        $this->db->where('course_id', $id_course);
        return $this->db->get();
    }

    function get_silabus_content($id_content,$id_course) {
        //jimho
        //using query binding
        $sql = " select s.deskripsi,s.id_silabus,cs.id_content_silabus
        from content_silabus cs,course_silabus s
        where cs.silabus_id=s.id_silabus AND cs.content_id = ? AND s.course_id = ?";

        return $this->db->query($sql, array($id_content,$id_course));
    }

    function select_silabus_content($id_content, $id_silabus) {
        //jimho
        $this->db->select('*');
        $this->db->from('content_silabus');
        $this->db->where('content_id', $id_content);
        $this->db->where('silabus_id', $id_silabus);
        return $this->db->get();
    }

    function insert_content_silabus($id_content, $id_silabus) {
        //jimho
        $this->db->set('content_id', $id_content);
        $this->db->set('silabus_id', $id_silabus);
        $this->db->insert('content_silabus');
    }
    
    function delete_content_silabus($id_content_silabus){
        //jimho
        //for delete db content silabus
        $this->db->where('id_content_silabus', $id_content_silabus);
        $this->db->delete('content_silabus');
    }

}
