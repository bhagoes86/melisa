<?php

/*
 * Modul Forum
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forum extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('model_content', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function index($user_id) {
        $data['user_id'] = $user_id;
        $this->load->view('forum/index', $data);
    }

}