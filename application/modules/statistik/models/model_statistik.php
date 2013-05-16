<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_statistik extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //test coba query select 
    function test_select() {
        $this->db->select('*');
        $this->db->from('faculty');
        return $this->db->get();
    }

    //query untuk ngambil type berdasarkan typenya
    function select_content_type($id) {
        $this->db->select('type');
        $this->db->from('content');
        $this->db->where('type', $id);
        return $this->db->get();
    }

    //query untuk ngambil show berdasarkan shownya
    function select_content_show($id) {
        $this->db->select('show');
        $this->db->from('content');
        $this->db->where('show', $id);
        return $this->db->get();
    }

    //query untuk ngambil course berdasarkan id topic
    function count_course_bytopic($id) {
        $this->db->select('course');
        $this->db->from('course c');
        $this->db->join('topic t', 't.id_topic = c.topic_id');
        $this->db->where('topic_id', $id);
        return $this->db->get();
    }

    //query untuk ambil semua course
    function count_all_course() {
        $this->db->select('*');
        $this->db->from('course');
        return $this->db->get();
    }

    //query untuk menghitung jumlah video per topik
    function count_content_topic() {
        /* select id_topic,
          (select count(*) from course_topic  where topic_id = id_topic) as jmlh_video
          from topic
          group by id_topic */
        $this->db->select('id_topic,topic,
        (select count(*) from course_topic  where topic_id = id_topic) as jmlh_video', TRUE);
        $this->db->from('topic');
        return $this->db->get();
    }

    //query untuk menghitung junlah konten yang ada di kategori
    function count_content_category() {
        /* select id_category,category,
          (select count(*) from content_category  where category_id= id_category) as jmlh_conten
          from category
          group by id_category */
        $this->db->select('id_category,category,
        (select count(*) from content_category where category_id = id_category) as jumlah_konten', TRUE);
        $this->db->from('category');
        return $this->db->get();
    }

    function count_content_faculty() {
        /* select id_faculty,faculty,
          (select count(*) from content_faculty  where faculty_id= id_faculty) as jmlh_conten
          from faculty
          group by id_faculty */
        $this->db->select('id_faculty,faculty,
        (select count(*) from content_faculty where faculty_id = id_faculty) as jumlah_konten', TRUE);
        $this->db->from('faculty');
        return $this->db->get();
    }

}