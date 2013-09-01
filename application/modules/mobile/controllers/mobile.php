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
            redirect('mobile/list_feed_new');
        }
    }

    function panel_right() {
        $data['trending'] = $this->model_mobile->select_trending_content()->result();
        $this->load->view('mobile/panel_right', $data);
    }

    /*
     * Auth
     */

    // auth form login
    function form_login() {
        $this->load->view('mobile/authz/form_login');
    }

    // auth login proses
    function login() {
        /*
         * validasi username wajib diisi dan bersih dari cross site scripting
         */
        $this->form_validation->set_rules('username', 'Username', 'required');
        /* validasi password wajib diisi */
        $this->form_validation->set_rules('password', 'Password', 'required');
        /* validasi input */
        if ($this->form_validation->run() == true) {
            /* cek pada database, bila kombinasi username dan password benar */
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'))) {
                /*
                 * apabila hasilnya match
                 * redirect ke halaman beranda untuk dirouting sesuai rolenya
                 */
                $main['message'] = $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('mobile/list_feed_new', $main);
            } else {
                /*
                 * apabila hasilnya tidak match
                 * set pesan error login pada session flashdata 
                 */
                $main['message'] = 'Kombinasi username dan password salah';
                redirect('mobile/form_login', $main);
            }
        } else {
            /*
             * apabila salah satu field belum diisi
             * set pesan untuk kesalahan input atau untuk pesan error sebelumnya
             */
            $main['message'] = (validation_errors()) ? $this->session->set_flashdata('message', '<div class="error">' . validation_errors() . '</div>') : '';
            redirect('mobile/form_login', $main);
        }
    }

    function fan_page() {
        $data['site'] = $this->model_mobile->select_themes()->row();
        $this->load->view('mobile/authz/fan_page', $data);
    }

    //auth logout
    function logout() {
        $this->ion_auth->logout();
        redirect('mobile');
    }

    //auth get name
    function get_name() {
        $users = $this->ion_auth->user()->row();
        $name = $this->model_mobile->select_user_info($users->id)->row();
        echo $name->first_name . ' ' . $name->last_name;
    }

    /*
     * News Feed
     */

    // feed all new
    function list_feed_new() {
        if (!$this->ion_auth->logged_in()) {
            $this->load->view('mobile/welcome');
        } else {
            $data['site'] = $this->model_mobile->select_themes()->row();
            $data['num_feed'] = $this->model_mobile->num_feed();
            $data['feed'] = $this->model_mobile->get_feed();
            //$data['feed'] = $this->model_mobile->select_feed_new()->result();
            $this->load->view('mobile/feed/list_feed', $data);
        }
    }

    function get_feed($offset) {
        $data['feed'] = $this->model_mobile->get_feed($offset);
        $this->load->view('mobile/feed/list_layout', $data);
    }

    // feed by user
    function list_feed_by_id($id_wall) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['feed'] = $this->model_mobile->select_feed_by_id($user_id)->row();
        $this->load->view('mobile/feed/lis_feed_by_id', $data);
    }

    // feed message submit proses
    function submit_feed() {
        $user = $this->ion_auth->user()->row();
        //pengirim
        $data['user_id'] = $user->id;
        //feed yg dikirim
        $data['user_idto'] = $user->id;
        //?
        $data['forum_id'] = 0;
        //pesan keseluruhan
        $data['message'] = $this->input->post('message', true);
        //url ekstrak dari pesan
        $data['url'] = detector_url($this->input->post('message', true));
        //url media analisis
        $data['forum_type'] = url_media_analizer($data['url']);
        //insert into db
        $this->model_mobile->insert_feed($data);
    }

    /*
     * Content
     */

    // podcast all new    
    function list_podcast_new() {
        if (!$this->ion_auth->logged_in()) {
            $this->load->view('mobile/welcome');
        } else {
            $data['site'] = $this->model_mobile->select_themes()->row();
            $data['num_podcast'] = $this->model_mobile->num_podcast();
            $data['podcast'] = $this->model_mobile->get_podcast();
            $this->load->view('mobile/content/list_podcast', $data);
        }
    }

    function get_podcast($offset) {
        $data['podcast'] = $this->model_mobile->get_podcast($offset);
        $this->load->view('mobile/content/list_podcast_layout', $data);
    }

    function viewer_video($id_content) {
        $data['site'] = $this->model_mobile->select_themes()->row();
        $data['id_content'] = $id_content;
        $data['content'] = $this->model_mobile->select_content_by_id($id_content)->row();
        $this->load->view('mobile/content/viewer_video', $data);
    }

    function viewer_youtube($id_content) {
        $data['site'] = $this->model_mobile->select_themes()->row();
        $data['id_content'] = $id_content;
        $data['content'] = $this->model_mobile->select_content_by_id($id_content)->row();
        $this->load->view('mobile/content/viewer_youtube', $data);
    }

    function viewer_soundcloud($id_content) {
        $data['site'] = $this->model_mobile->select_themes()->row();
        $data['id_content'] = $id_content;
        $data['content'] = $this->model_mobile->select_content_by_id($id_content)->row();
        $this->load->view('mobile/content/viewer_soundcloud', $data);
    }

    function viewer_vimeo($id_content) {
        $data['site'] = $this->model_mobile->select_themes()->row();
        $data['id_content'] = $id_content;
        $data['content'] = $this->model_mobile->select_content_by_id($id_content)->row();
        $this->load->view('mobile/content/viewer_vimeo', $data);
    }

    function download_video($id_content) {
        $this->load->library('filedownload'); // panggil librari
        $content = $this->model_mobile->select_content_by_id($id_content)->row();
        $ext = $content->ext;
        $path = './resource' . '/' . $content->file;
        //$url = './resource/' . $id_document . '/pdf/' . $id_document . '.pdf';
        $config = array(
            'file' => "$path",
            'resume' => true,
            'filename' => "$content->title" . '.' . "$ext",
            'speed' => 2000,
        );
        $this->filedownload->send_download($config);
    }

    function panel_trending_content() {
        $data['trending'] = $this->model_mobile->select_trending_content()->result();
        $this->load->view('mobile/content/panel_trending_content', $data);
    }

    /*
     * Course
     */

    // course all new    
    function list_course_new() {
        if (!$this->ion_auth->logged_in()) {
            $this->load->view('mobile/welcome');
        } else {
            $data['site'] = $this->model_mobile->select_themes()->row();
            $data['num_course'] = $this->model_mobile->num_course();
            $data['course'] = $this->model_mobile->get_course();
            $this->load->view('mobile/course/list_course', $data);
        }
    }

    function get_course($offset) {
        $data['course'] = $this->model_mobile->get_course($offset);
        $this->load->view('mobile/course/list_course_layout', $data);
    }

    function course_info($id_course) {
        $data['course'] = $this->model_mobile->select_detail_course($id_course)->row();
        $this->load->view('mobile/course/course_info', $data);
    }

    function detail_course($id_course) {
        $data['site'] = $this->model_mobile->select_themes()->row();
        $data['course'] = $this->model_mobile->select_detail_course($id_course)->row();
        $this->load->view('mobile/course/detail_course', $data);
    }

    function list_syllabus_by_course($id_course) {
        $data['syllabus'] = $this->model_mobile->select_course_syllabus_parent($id_course)->result();
        $this->load->view('mobile/course/list_syllabus_by_course', $data);
    }

    function content_counter_by_syllabus($id_syllabus) {
        $content = $this->model_mobile->sellect_content_by_syllabus($id_syllabus)->result();
        echo count($content);
    }

    function list_content_by_syllabus($id_syllabus) {
        $data['content'] = $this->model_mobile->sellect_content_by_syllabus($id_syllabus)->result();
        $this->load->view('mobile/course/list_content_by_syllabus', $data);
    }

}