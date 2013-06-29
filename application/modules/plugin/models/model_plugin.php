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
        $this->db->where('content_id', $content_id);
        $this->db->where('type', $type);
        $this->db->where('user', $user_id);
        $this->db->get();
    }

}