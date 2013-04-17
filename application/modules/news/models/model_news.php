<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_news extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_news($id) {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type', $id);
        $this->db->order_by('id_news', 'DESC');
        return $this->db->get();
    }

    function edit_news_db($id) {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id_news', $id);
        return $this->db->get();
    }

    function get_latest_id($type) {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type', $type);
        $this->db->order_by('id_news', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    function new_id_type($id, $type) {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id_news', $id);
        $this->db->where('type', $type);
        return $this->db->get();
    }

    function insert_news($data) {
        $this->db->set('title', $data['title']);
        $this->db->set('news', $data['news']);
        $this->db->set('type', $data['type']);
        $this->db->insert('news');
    }

    function update_news($data) {
        $this->db->where('id_news', $data['id']);
        $this->db->set('news', $data['news']);
        $this->db->set('title', $data['title']);
        $this->db->update('news');
    }

    function delete_news_db($id) {
        $this->db->where('id_news', $id);
        $this->db->delete('news');
    }

    function update_header($id, $filename) {
        $this->db->where('id_news', $id);
        $this->db->set('header', $filename);
        $this->db->update('news');
    }

    function update_attachment($id, $data, $att_type,$ext) {
        $this->db->where('id_news', $id);
        $this->db->set('attachment', $data);
        $this->db->set('attachment_type', $att_type);
        $this->db->set('ext', $ext);
        $this->db->update('news');
    }

    function select_news_by_type_limit($type, $limit) {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type', $type);
        $this->db->limit($limit);
        return $this->db->get();
    }

}