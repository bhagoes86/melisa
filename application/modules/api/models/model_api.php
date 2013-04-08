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

    function select_content_mp4() {
        $this->db->select('*');
        $this->db->from('content');
    }

}