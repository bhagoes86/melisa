<?php

/*
 * Modul Mobile
 * Maintainer : Taufik Sulaeaman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('text');
        $this->load->helper(array('url', 'form'));
        $this->load->model('model_mobile', '', true);
    }

    function index() {
        if (!$this->ion_auth->logged_in()) {
            $this->load->view('mobile/welcome');
        } else {
            echo'in';
        }
    }

    /*
     * Auth
     */

    function login() {
        
    }

    function logout() {
        $this->ion_auth->logout();
        redirect('mobile');
    }

    /*
     * Content
     */

    /*
     * Course
     */

    function list_course_new() {
        if (!$this->ion_auth->logged_in()) {
            $data['course'] = $this->model_mobile->select_course_public()->result();
            $this->load->view('mobile/course/list_public', $data);
        } else {
            echo'in';
        }
    }

}