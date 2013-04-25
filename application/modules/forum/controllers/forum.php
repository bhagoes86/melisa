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
        $this->load->model('model_forum', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function index($user_id = 1) {
        $data['user_id'] = $user_id;        
        $data['themes'] = $this->model_forum->select_themes()->row();
        $this->load->view('forum/index', $data);
    }

}