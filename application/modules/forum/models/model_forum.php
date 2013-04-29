<?php

/*
 * Model Course
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_forum extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_themes() {
        $this->db->select('*');
        $this->db->from('table_site');
        return $this->db->get();
    }

    function select_users($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get();
    }

    function select_content($id_content, $type) {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('id_content', $id_content);
        $this->db->where('type', $type);
        return $this->db->get();
    }

    function insert_wall($data) {
        $this->db->insert('wall', $data);
        return $this->db->insert_id();
    }

    function insert_broadcast($databroadcast) {
        $this->db->insert('broadcast', $databroadcast);
        return $this->db->insert_id();
    }

    function insert_tag($data) {
        $this->db->insert('tags', $data);
        return $this->db->insert_id();
    }

    function select_broadcast($content_id, $broadcast_type) {
        $this->db->select('*');
        $this->db->from('broadcast');
        $this->db->where('content_id', $content_id);
        $this->db->where('broadcast_type', $broadcast_type);
        return $this->db->get();
    }

    function select_tag($content_id, $tag_type) {
        $this->db->select('*');
        $this->db->from('tags');
        $this->db->where('content_id', $content_id);
        $this->db->where('tag_type', $tag_type);
        return $this->db->get();
    }

    function select_trending_tag() {
        return $this->db->query('SELECT count(tag) as jml, user_id, tag, tag_type from tags group by tag order by jml DESC limit 5');
    }

}