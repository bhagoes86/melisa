<?php

/*
 * Modul Mobile
 * Maintainer : Sofia Umaroh
 * Email : sofia.umaroh@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_mobile', '', true);
    }

    function index() {
        $data['page'] = 'none';
        $this->load->view('mobile/index', $data);
    }

    function topic() {
        $data['page'] = 'topic';
        $data['content'] = $this->model_mobile->select_all_topic()->result();
        $this->load->view('mobile/list_topic', $data);
    }

    function faculty() {
        $data['page'] = 'faculty';
        $data['faculty'] = $this->model_mobile->select_all_faculty()->result();
        $this->load->view('mobile/list_faculty', $data);
    }

    function video() {
        $data['page'] = 'video';
        $data['video'] = $this->model_mobile->select_all_video()->result();
        $this->load->view('mobile/list_video', $data);
    }

    function content($id_course) {
        $data['page'] = 'none';
        $data['video'] = $this->model_mobile->select_all_content($id_course)->result();
        $this->load->view('mobile/list_video', $data);
    }

    function course($id) {
        $data['page'] = 'topic'; 
        $data['content'] = $this->model_mobile->select_all_course($id)->result();
        $this->load->view('mobile/all_course', $data);
    }
 
    function courses($id) {
        $data['page'] = 'faculty'; 
        $data['content'] = $this->model_mobile->select_all_course_faculty($id)->result();
        $this->load->view('mobile/all_course', $data);
    }

     function youtube($id_content) {
        $data['page'] = 'none'; 
        $data['content'] = $this->model_mobile->select_content_by_id($id_content)->row();
        $this->load->view('mobile/video_youtube', $data);
    }

    function video_view($id_content) {
        $data['page'] = 'none';
        $data['content'] = $this->model_mobile->select_content_by_id($id_content)->row();
        $this->load->view('mobile/video_viewer', $data);
    }

}