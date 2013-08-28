<?php

/*
 * Modul Home
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller {

    function __construct() {
        parent::__construct();
        //preload
        $this->load->library('ion_auth');
        $this->load->model('model_home', '', true);
    }

    function index() {
        $this->load->library('user_agent');
        if ($this->agent->is_mobile()) {
            redirect('mobile');
        } else {
            $data['themes'] = $this->model_home->select_themes()->row();
            $this->load->view('home/index', $data);
        }
    }

    function welcome() {
        $data['themes'] = $this->model_home->select_themes()->row();
        $this->load->view('home/welcome', $data);
    }

    function sidebar() {
        $this->load->view('home/sidebar');
    }

    function top() {
        $this->load->view('home/top');
    }

    function top_noother() {
        $this->load->view('home/top_noother');
    }

    function manager() {
        $this->load->view('home/manager');
    }

    function site() {
        $this->load->view('home/site');
    }

}