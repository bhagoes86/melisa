<?php

/*
 * Model Plugin
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_plugin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_bookmark_status($content_id, $type, $user_id) {
        $this->db->select('*');
        $this->db->from('content_bookmark');
        $this->db->where('user_id', $user_id);
        $this->db->where('content_id', $content_id);
        $this->db->where('type', $type);
        return $this->db->get();
    }

    function select_tags_content($content_id, $limit) {
        $this->db->select('*');
        $this->db->from('tags');
        $this->db->where('content_id', $content_id);
        $this->db->limit($limit);
        return $this->db->get();
    }

}