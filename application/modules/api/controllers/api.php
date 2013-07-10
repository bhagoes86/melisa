<?php

/*
 * Modul API
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class API extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('model_api', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function document() {
        $data['content'] = $this->model_api->select_all_document()->result();
        $this->load->view('api/document_xml', $data);
    }

    function podcast() {
        
    }

    function course() {
        
    }

    function presentation() {
        
    }

}