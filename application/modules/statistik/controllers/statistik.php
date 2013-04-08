<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
    class Statistik extends MX_Controller {
        
    function __construct() {
        parent::__construct();
        //preload
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('model_statistik', '', true);
        $this->load->helper('text');
        $this->load->helper(array('url', 'form'));
    }
    //???? forget untuk apa ini teh    
    function table_content($show) {
        $data['content'] = $this->model_content->select_content_show($show)->result();
        $this->load->view('content/table_content', $data);
    }
    //test coba
    function show(){
        $data['type_content'] = count($this->model_statistik->select_content_type(0)->result());
        $data['show_content'] = count($this->model_statistik->select_content_show(1)->result());
        //$data['topic_course'] = count($this->model_statistik->count_course_bytopic(1)->result());
        //
        $data['all_course'] = count($this->model_statistik->count_all_course()->result());
        //print_r($data);
        $this->load->view('statistik/my_statistik',$data);        
    }
    //fungsi count content berdasarkan type
    function content_type_count(){
        $data['type_content'] = count($this->model_statistik->select_content_type(0)->result());
        $this->load->view('statistik/test_view',$data);
    }
    //fungsi count content berdasarkan show
    function content_show_count(){
        $data['type_content'] = count($this->model_statistik->select_content_show(1)->result());
        $this->load->view('statistik/test_view',$data);
    }
    //fungsi count course berdasarkan topic
    function course_topic_count(){
        $data['type_content'] = count($this->model_statistik->count_course_bytopic(1)->result());
        $this->load->view('statistik/test_view',$data);
    }
    //fungsi count semua course
    function course_all_count(){
        $data['type_content'] = count($this->model_statistik->count_all_course()->result());
        $this->load->view('statistik/test_view',$data);
    }
    
    function video_topic(){
        $data['topic'] = $this->model_statistik->count_content_topic()->result();
        $data['kategori'] = $this->model_statistik->count_content_category()->result();
        $data['faculty'] = $this->model_statistik->count_content_faculty()->result();
        $this->load->view('statistik/my_statistik',$data);
        //$this->load->view('statistik/statistik_combination',$data);
        
        //print_r($data['faculty']);
        
    }
}
