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

    /*
     * Auth
     */

    function form_login() {
        $this->load->view('mobile/authz/form_login');
    }

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

    function logout() {
        $this->ion_auth->logout();
        redirect('mobile');
    }

    function get_name() {
        $users = $this->ion_auth->user()->row();
        $name = $this->model_mobile->select_user_info($users->id)->row();
        echo $name->first_name . ' ' . $name->last_name;
    }

    /*
     * News Feed
     */

    function list_feed_new() {
        if (!$this->ion_auth->logged_in()) {
            $this->load->view('mobile/welcome');
        } else {
            $data['feed'] = $this->model_mobile->select_feed_new()->result();
            $this->load->view('mobile/feed/list_feed', $data);
        }
    }

    function list_feed_by_id($id_wall) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['feed'] = $this->model_mobile->select_feed_by_id($user_id)->row();
        $this->load->view('mobile/feed/lis_feed_by_id', $data);
    }

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

    function list_podcast_new() {
        
    }

    function list_sound_new() {
        
    }

    function list_document_new() {
        
    }

    function list_presentation_new() {
        
    }

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