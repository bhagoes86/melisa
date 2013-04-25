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

}