<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MX_Controller {

    function __construct() {
        parent::__construct();
        //preload
        $this->load->library('ion_auth');
        $this->load->model('model_news', '', true);
        $this->load->helper('text');
        $this->load->helper(array('url', 'form'));
    }
    
    function index($id_news,$type){
        $data['news'] = $this->model_news->new_id_type($id_news,$type)->row();
        //print_r($data);
        
        $this->load->view('news/table_news',$data);
    }

    //home untuk news
    function home($type) {
        $data['news'] = $this->model_news->get_all_news($type)->result();
        $data['type'] = $type;
        $this->load->view('news/list_news', $data);
    }
    
    //show news
    function news_management($type){
        $data['news'] = $this->model_news->get_all_news($type)->result();
        $this->load->view('news/list_articles',$data);
    }
    
    //news viewer attachment
    function youtube_view($attachment){
        $data['attachment'] = $attachment;
        //print_r($data);
        $this->load->view('news/viewer_youtube',$data);
    }
    
    //news viewer attachment document
    function document_view($attachment){
        $data['attachment'] = $attachment;
        //print_r($data);
        $this->load->view('news/viewer_document',$data);
    }

    function video_view($attachment,$ext){
        $data['attachment'] = $attachment;
        $data['ext'] = $ext;
        //print_r($data);
        $this->load->view('news/viewer_video',$data);
    }
    //sound cloud
    
    function soundcloud_view($attachment){
        $data['attachment'] = $attachment;
        $this->load->view('news/viewer_soundcloud',$data);
    }
    function select_news($id_news){
        $data['news'] = $this->model_news->edit_news_db($id_news)->row();
        $this->load->view('news/selected_articles',$data);
    }
    
    function selected_type($type){
        $data['news'] = $this->model_news->get_latest_id($type)->row();
        //print_r($data);
        if($data['news']==NULL){
            $data['news']=NULL;
        }
        $this->load->view('news/table_news',$data);
    }

    function form_add_news($type) {
        $data['type'] = $type;
        $this->load->view('news/news_form_add', $data);
    }

    function insert_berita($type) {
        $data['title'] = $this->input->post('title', true);
        $data['news'] = $this->input->post('news', true);
        $data['type'] = $type;
//print_r($data);
        $this->model_news->insert_news($data);
    }

    function edit_news($id, $type) {
        //print_r($id);
        $data['news'] = $this->model_news->edit_news_db($id)->row();
        $data['type'] = $type;
        $this->load->view('news/news_form_edit', $data);
    }

    function update_berita() {
        $data['title'] = $this->input->post('title', true);
        $data['news'] = $this->input->post('news', true);
        $data['id'] = $this->input->post('id', true);
        $this->model_news->update_news($data);
        //print_r($user);
    }

    function delete_news($id) {
        $this->model_news->delete_news_db($id);
    }

    function header_upload($id, $type) {
        $data['id'] = $id;
        $data['type'] = $type;
        $this->load->view('news/form_upload_header', $data);
    }

    function upload_header($id) {
        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png';
        $config['max_size'] = '215000';
        $this->load->library('upload', $config);
        $this->upload->overwrite = true;
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
            echo "{";
            echo "msg: '" . $error['error'] . "'";
            echo "}";
            //$this->load->view('upload_form', $error);
        } else {
            $infofile = $this->upload->data();
            $data['picture'] = $infofile['file_name'];
            //print_r($data['picture']);
            $this->model_news->update_header($id, $data['picture']);
            echo "{";
            echo "msg: 1";
            echo "}";
        }
    }

    function shortcut($id, $type) {
        //print_r($id);
        $data['id'] = $id;
        $data['type'] = $type;
        //echo "test";
        $this->load->view('news/shortcut', $data);
    }

    function upload_video($id, $type, $att_type) {
        $data['id'] = $id;
        $data['type'] = $type;
        $data['att_type'] = $att_type;
        //print_r($data['id']);
        $this->load->view('news/form_video_upload', $data);
    }

    function upload_attachment_video($id, $att_type) {
        $data['id'] = $id;
        $data3['att_type'] = $att_type;
        $config['upload_path'] = './attachment/'; //upload ke folder 
        //
        //id/pdf
        $config['allowed_types'] = 'mp4|mov|flv|MP4|MOV|FLV';
        $config['max_size'] = '5000000'; //dengan maksimal ukuran berkas 50 Mb
        $config['file_name'] = $id; //berkas dikirim kemudian diganti namanya

        $this->load->library('upload', $config); //panggil librari upload

        if (!$this->upload->do_upload()) {//kondisi upload gagal
            $error = array('error' => $this->upload->display_errors());
            echo "{";
            echo "msg: '" . $error['error'] . "'";
            echo "}";
        } else {//kondisi berhasil
            $hasil = $this->upload->data();
            $data2['file'] = $hasil['file_name'];
            $data2['size'] = $hasil['file_size'];
            $data2['ext'] = $hasil['file_ext'];

            $this->model_news->update_attachment($data['id'], $data2['file'], $data3['att_type'],$data2['ext']);

            echo "{";
            echo "msg: 1";
            echo "}";
        }
    }

    function form_upload_document($id, $type, $att_type) {
        $data['id'] = $id;
        $data['type'] = $type;
        $data['att_type'] = $att_type;
        //print_r($data['att_type']);
        $this->load->view('news/form_document_upload', $data);
    }

    function upload_document($id, $att_type) {
        $data['id'] = $id;
        $data3['att_type'] = $att_type;
        $config['upload_path'] = './attachment/'; //upload ke folder /id/pdf
        $config['allowed_types'] = 'pdf|PDF';
        $config['max_size'] = '215000'; 
        $config['file_name'] = $id; //berkas dikirim kemudian diganti namanya

        $this->load->library('upload', $config); //panggil librari upload

        if (!$this->upload->do_upload()) {//kondisi upload gagal
            $error = array('error' => $this->upload->display_errors());
            echo "{";
            echo "msg: '" . $error['error'] . "'";
            echo "}";
        } else {//kondisi berhasil
            $hasil = $this->upload->data();
            $data2['file'] = $hasil['file_name'];
            $data2['size'] = $hasil['file_size'];
            $data2['ext'] = $hasil['file_ext'];

            $this->model_news->update_attachment($data['id'], $data2['file'], $data3['att_type']);

            echo "{";
            echo "msg: 1";
            echo "}";
        }
    }

    function form_add_link($id, $type, $att_type) {
        $data['id'] = $id;
        $data['type'] = $type;
        $data['att_type'] = $att_type;
        $this->load->view('news/form_add_link', $data);
    }

    function add_content_link($id, $att_type) {
        $data['id'] = $id;
        $data['att'] = $this->input->post('url', true);
        $data['att_type'] = $att_type;
        // print_r($data);
        $this->model_news->update_attachment($data['id'], $data['att'], $data['att_type']);
    }

    function home_berita() {
        $type = 1;
        $limit = 5;
        $data['type'] = $type;
        $data['content'] = $this->model_news->select_news_by_type_limit($type, $limit)->result();
        $this->load->view('news/list_news_home', $data);
    }

    function home_beasiswa() {
        $type = 2;
        $limit = 5;
        $data['type'] = $type;
        $data['content'] = $this->model_news->select_news_by_type_limit($type, $limit)->result();
        $this->load->view('news/list_news_home', $data);
    }

    function home_fitur() {
        $type = 3;
        $limit = 5;
        $data['type'] = $type;
        $data['content'] = $this->model_news->select_news_by_type_limit($type, $limit)->result();
        $this->load->view('news/list_news_home', $data);
    }
    
    function show_news($id_news){  
        $this->load->view('news/table_news');
    }

}