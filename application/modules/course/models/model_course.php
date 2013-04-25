<?php

/*
 * Model Course
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_course extends CI_Model {

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

    // [HARUS DIUBAH]
    function select_avail_quiz_group($id_course) {
        $this->db->select('qf.start_time as start_time, qf.end_time as end_time, qf.id_quiz as id_quiz,  qf.title as quiz_title, qg.id_group as id_group, qg.title as group_title, qg.status as group_status');

        $this->db->from('quiz_file as qf');
        $this->db->join('quiz_course as qc', 'qc.quiz_id=qf.id_quiz');
        $this->db->join('course as crs', 'qc.course_id=crs.id_course');
        $this->db->join('quiz_course_group as qcg', 'qcg.course_id = crs.id_course ');
        $this->db->join('quiz_group as qg', 'qcg.group_id = qg.id_group');

        $this->db->where('qf.deleted', 1);
        $this->db->where('qc.deleted', 0);
        $this->db->where('qg.deleted', 0);
        $this->db->where('qcg.deleted', 0);

        $this->db->where('qc.course_id', $id_course);
        $this->db->where('qg.quiz_id = qf.id_quiz');
        
        $this->db->order_by('qf.end_time', 'desc');
        return $this->db->get();
    }

    function select_topic() {
        $this->db->select('*');
        $this->db->from('topic');
        return $this->db->get();
    }

    function select_topic_for_navbar() {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('status', 5);
        return $this->db->get();
    }

    function select_bimbel_for_navbar() {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where_in('status', array(4, 3, 2));
        return $this->db->get();
    }

    function select_faculty() {
        $this->db->select('*');
        $this->db->from('faculty');
        return $this->db->get();
    }

    function select_category() {
        $this->db->select('*');
        $this->db->from('category');
        return $this->db->get();
    }

    function insert_category($data) {
        $this->db->insert('category', $data);
    }

    function insert_faculty($data) {
        $this->db->insert('faculty', $data);
    }

    function insert_topic($data) {
        $this->db->insert('topic', $data);
    }

    function select_course_by_creator($user_id) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('user_id', $user_id);
        $this->db->where('show !=', 2);
        return $this->db->get();
    }

    function insert_course($data) {
        $this->db->insert('course', $data);
    }

    function select_course() {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('show', 1);
        return $this->db->get();
    }
    
    function select_course_limit($limit) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('show', 1);
        $this->db->limit($limit);
        return $this->db->get();
    }

    function select_course_by_id($id_course) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id_course', $id_course);
        return $this->db->get();
    }

    function update_cover($id_course, $data) {
        $this->db->where('id_course', $id_course);
        $this->db->update('course', $data);
    }

    function select_video_by_course($id_course) {
        $this->db->select('*');
        $this->db->from('content_course');
        $this->db->join('content', 'content.id_content = content_course.content_id');
        $this->db->where('content_course.course_id', $id_course);
        $this->db->where_in('content.type', array(0, 2, 3));
        $this->db->order_by('content.title', 'asc');
        return $this->db->get();
    }

    function select_document_by_course($id_course) {
        $this->db->select('*');
        $this->db->from('content_course');
        $this->db->join('content', 'content.id_content = content_course.content_id');
        $this->db->where('content_course.course_id', $id_course);
        $this->db->where_in('content.type', array(1, 5, 4, 7));
        $this->db->order_by('content.title', 'asc');
        return $this->db->get();
    }

    function select_metadata($id, $type) {
        $this->db->select('*');
        $this->db->from('user_meta');
        $this->db->where('user_id', $id);
        $this->db->where('type', $type);
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

    function select_course_topic($id_course) {
        $this->db->select('*');
        $this->db->from('course_topic');
        $this->db->join('topic', 'topic.id_topic=course_topic.topic_id');
        $this->db->where('course_topic.course_id', $id_course);
        return $this->db->get();
    }

    function select_course_topic_in($id_course, $status) {
        $this->db->select('*');
        $this->db->from('course_topic');
        $this->db->join('topic', 'topic.id_topic=course_topic.topic_id');
        $this->db->where('course_topic.course_id', $id_course);
        $this->db->where_in('topic.status', $status);
        return $this->db->get();
    }

    function select_course_faculty($id_course) {
        $this->db->select('*');
        $this->db->from('course_faculty');
        $this->db->join('faculty', 'faculty.id_faculty=course_faculty.faculty_id');
        $this->db->where('course_faculty.course_id', $id_course);
        return $this->db->get();
    }

    function cek_course_by_topic_id($course_id, $topic_id) {
        $this->db->select('*');
        $this->db->from('course_topic');
        $this->db->where('course_id', $course_id);
        $this->db->where('topic_id', $topic_id);
        return $this->db->get();
    }

    function insert_course_topic($data) {
        $this->db->insert('course_topic', $data);
    }

    function cek_course_by_faculty_id($course_id, $faculty_id) {
        $this->db->select('*');
        $this->db->from('course_faculty');
        $this->db->where('course_id', $course_id);
        $this->db->where('faculty_id', $faculty_id);
        return $this->db->get();
    }

    function insert_course_faculty($data) {
        $this->db->insert('course_faculty', $data);
    }

    function select_course_by_faculty($faculty_id) {
        $this->db->select('*');
        $this->db->from('course_faculty');
        $this->db->join('faculty', 'faculty.id_faculty=course_faculty.faculty_id');
        $this->db->join('course', 'course.id_course=course_faculty.course_id');
        $this->db->where('course_faculty.faculty_id', $faculty_id);
        return $this->db->get();
    }

    function select_content_by_faculty($faculty_id, $type) {
        $this->db->select('*');
        $this->db->from('content_faculty');
        $this->db->join('content', 'content.id_content=content_faculty.content_id');
        $this->db->where('content_faculty.faculty_id', $faculty_id);
        $this->db->where_in('content.type', $type);
        return $this->db->get();
    }

    function select_course_by_topic($topic_id) {
        $this->db->select('*');
        $this->db->from('course_topic');
        $this->db->join('topic', 'topic.id_topic=course_topic.topic_id');
        $this->db->join('course', 'course.id_course=course_topic.course_id');
        $this->db->where('course_topic.topic_id', $topic_id);
        return $this->db->get();
    }

    function select_content_by_topic($topic_id, $type) {
        $this->db->select('*');
        $this->db->from('content_topic');
        $this->db->join('content', 'content.id_content=content_topic.content_id');
        $this->db->where('content_topic.topic_id', $topic_id);
        $this->db->where_in('content.type', $type);
        return $this->db->get();
    }

    function update_course($id_course, $data) {
        $this->db->where('id_course', $id_course);
        $this->db->update('course', $data);
    }

    function select_course_by_show($show) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('show', $show);
        return $this->db->get();
    }

    function count_content_course_faculty() {
        /* select id_faculty,faculty,
          (select count(*) from content_faculty  where faculty_id = id_faculty) as jmlh_content,(select count(*) from course_faculty  where faculty_id = id_faculty) as jmlh_kuliah
          from faculty
          group by id_faculty */
        $this->db->select('id_faculty,faculty,short,
        (select count(*) from content_faculty  where faculty_id = id_faculty) as jmlh_konten,(select count(*) from course_faculty  where faculty_id = id_faculty) as jmlh_kuliah', TRUE);
        $this->db->from('faculty');
        return $this->db->get();
    }

    function count_content_course_topic() {
        $this->db->select('id_topic,status,topic,
        (select count(*) from content_topic  where topic_id = id_topic) as jmlh_konten,(select count(*) from course_topic  where topic_id = id_topic) as jmlh_kuliah', TRUE);
        $this->db->from('topic');
        return $this->db->get();
    }

    function count_content_course_category() {
        $this->db->select('id_category,category,
        (select count(*) from content_category  where category_id = id_category) as jmlh_konten', TRUE);
        $this->db->from('category');
        return $this->db->get();
    }

    function count_course_topic_faculty() {
        /* select id_course,course,description,date,
          (select count(*) from course_topic  where course_id = id_course) as jmlh_topic,(select count(*) from course_faculty  where course_id = id_course) as jmlh_facultas
          from course
          group by id_course */
        $this->db->select('id_course,course,description,date,
        (select count(*) from course_topic  where course_id = id_course) as jmlh_topic,(select count(*) from course_faculty  where course_id = id_course) as jmlh_facultas', TRUE);
        $this->db->from('course');
        return $this->db->get();
    }

    function select_one_topic($id) {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('id_topic', $id);
        return $this->db->get();
    }

    function select_one_faculty($id) {
        $this->db->select('*');
        $this->db->from('faculty');
        $this->db->where('id_faculty', $id);
        return $this->db->get();
    }

    function select_one_category($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id_category', $id);
        return $this->db->get();
    }

    function select_one_course($id) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id_course', $id);
        return $this->db->get();
    }

    function update_topic($id, $topic, $status) {
        $this->db->where('id_topic', $id);
        $this->db->set('topic', $topic);
        $this->db->set('status', $status);
        $this->db->update('topic');
    }

    function update_faculty($id, $faculty, $short) {
        $this->db->where('id_faculty', $id);
        $this->db->set('faculty', $faculty);
        $this->db->set('short', $short);
        $this->db->update('faculty');
    }

    function update_category($id, $category) {
        $this->db->where('id_category', $id);
        $this->db->set('category', $category);
        $this->db->update('category');
    }

    function update_kuliah($id, $course, $description,$intkuliah,$pemdasar,$dipelajari) {
        $this->db->where('id_course', $id);
        $this->db->set('course', $course);
        $this->db->set('description', $description);
        $this->db->set('intkuliah', $intkuliah);
        $this->db->set('pemdasar', $pemdasar);
        $this->db->set('dipelajari', $dipelajari);
        $this->db->update('course');
    }

    function topic_delete($id) {
        $this->db->where('id_topic', $id);
        $this->db->delete('topic');
    }

    function faculty_delete($id) {
        $this->db->where('id_faculty', $id);
        $this->db->delete('faculty');
    }

    function category_delete($id) {
        $this->db->where('id_category', $id);
        $this->db->delete('category');
    }

    function course_delete($id) {
        $this->db->where('id_course', $id);
        $this->db->delete('course');
    }

    function course_add_silabus($id) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id_course', $id);
        return $this->db->get();
    }

    function course_silabus() {
        $this->db->select('*');
        $this->db->from('course_silabus');
        return $this->db->get();
    }

    function course_silabus_parent($id) {
        $this->db->select('*');
        $this->db->from('course_silabus');
        $this->db->where('course_id', $id);
        $this->db->where('parent_id', 0);
        return $this->db->get();
    }

    function cek_course_by_silabus_id($course_id, $silabus_id) {
        $this->db->select('*');
        $this->db->from('course_silabus');
        $this->db->where('course_id', $course_id);
        $this->db->where('parent_id', $silabus_id);
        return $this->db->get();
    }

    function cek_silabus($id) {
        $this->db->select('*');
        $this->db->from('course_silabus');
        $this->db->where('id_silabus', $id);
        return $this->db->get();
    }

    function insert_course_silabus($data) {
        $this->db->insert('course_silabus', $data);
    }

    function course_silabus_child($id) {
        $this->db->select('*');
        $this->db->from('course_silabus');
        $this->db->where('parent_id', $id);
        return $this->db->get();
    }

    function delete_silabus($id) {
        $this->db->where('id_silabus', $id);
        $this->db->delete('course_silabus');
    }

    function delete_silabus_id_silabus($id) {
        $this->db->where('id_silabus', $id);
        $this->db->delete('course_silabus');
    }

    function delete_silabus_parent_id($id) {
        $this->db->where('parent_id', $id);
        $this->db->delete('course_silabus');
    }

    function update_deskripsi_silabus($id, $deskripsi) {
        $this->db->where('id_silabus', $id);
        $this->db->set('deskripsi', $deskripsi);

        $this->db->update('course_silabus');
    }

    function delete_faculty_course($id_course, $id_faculty) {
        $this->db->where('course_id', $id_course);
        $this->db->where('faculty_id', $id_faculty);
        $this->db->delete('course_faculty');
    }

    function delete_topic_course($id_course, $id_topic) {
        $this->db->where('course_id', $id_course);
        $this->db->where('topic_id', $id_topic);
        $this->db->delete('course_topic');
    }

}