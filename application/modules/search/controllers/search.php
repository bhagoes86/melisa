<?php

/*
 * Modul Search
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('model_search', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function index($key = NULL) {
        $data['katakunci'] = $key;
        $data['content'] = $this->model_search->select_course_by_title(urldecode($key))->result();
        $data['total_course'] = count($data['content']);

        $arrayvideo = array('0', '2', '3');
        $data['video'] = $this->model_search->select_content_by_title_type(urldecode($key), $arrayvideo)->result();
        $data['total_video'] = count($data['video']);

        $arraydocument = array('1', '4', '7');
        $data['document'] = $this->model_search->select_content_by_title_type(urldecode($key), $arraydocument)->result();
        $data['total_document'] = count($data['document']);
        
        $arraypresnetation = array('5');
        $data['presentation'] = $this->model_search->select_content_by_title_type(urldecode($key), $arraypresnetation)->result();
        $data['total_presentation'] = count($data['presentation']);
        
        $arraysound = array('6');
        $data['sound'] = $this->model_search->select_content_by_title_type(urldecode($key), $arraysound)->result();
        $data['total_sound'] = count($data['sound']);

        $this->load->view('index', $data);
    }

    function search_course($course) {
        $data['content'] = $this->model_search->select_course_by_title(urldecode($course))->result();
        $data['total_course'] = count($data['content']);
        $this->load->view('search/table_course', $data);
    }

    function search_video($title) {
        $type = array('0', '2', '3');
        $data['video'] = $this->model_search->select_content_by_title_type(urldecode($title), $type)->result();
        $data['total_video'] = count($data['video']);
        $this->load->view('search/table_video', $data);
    }

    function search_document($title) {
        $type = array('1', '4', '7');
        $data['document'] = $this->model_search->select_content_by_title_type(urldecode($title), $type)->result();
        $data['total_document'] = count($data['document']);
        $this->load->view('search/table_document', $data);
    }

    function search_presentation($title) {
        $type = array('5');
        $data['presentation'] = $this->model_search->select_content_by_title_type(urldecode($title), $type)->result();
        $data['total_presentation'] = count($data['presentation']);
        $this->load->view('search/table_presentation', $data);
    }

    function search_sound($title) {
        $type = array('6');
        $data['sound'] = $this->model_search->select_content_by_title_type(urldecode($title), $type)->result();
        $data['total_sound'] = count($data['sound']);
        $this->load->view('search/table_sound', $data);
    }

}