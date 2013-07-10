<?php

/*
 * Modul Model API
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_api extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_all_document() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->join('users', 'users.id=content.user_id');
        $type = array(1, 4, 7);
        $this->db->where_in('content.type', $type);
        $this->db->where('content.show', 1);
        $this->db->order_by('content.id_content', 'DESC');
        return $this->db->get();
    }

}