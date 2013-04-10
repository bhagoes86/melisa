<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends MX_Controller {

    function __construct() {
        parent::__construct();
        //preload
        $this->load->library('ion_auth');
        $this->load->model('model_site', '', true);
        $this->load->helper('text');
        $this->load->helper(array('url', 'form'));
    }

    function index() {
        
    }

    function site_edit() {
        $data['content'] = $this->model_site->show_record()->row();
        //print_r($data);
        $this->load->view('site/edit_site', $data);
    }

    function update_site() {
        $data['header'] = $this->input->post('header', true);
        $data['menu1'] = $this->input->post('menu1', true);
        $data['menu2'] = $this->input->post('menu2', true);
        $data['menu3'] = $this->input->post('menu3', true);
        $data['caption'] = $this->input->post('caption', true);
        $data['footer'] = $this->input->post('footer', true);
        $data['bgheader'] = $this->input->post('bgheader', true);
        $data['bgfooter'] = $this->input->post('bgfooter', true);
        $data['tgpicture1'] = $this->input->post('tgpicture1', true);
        $data['tgpicture2'] = $this->input->post('tgpicture2', true);
        $data['tgpicture3'] = $this->input->post('tgpicture3', true);
        //print_r($data);
        $this->model_site->data_update($data['header'], $data['menu1'], $data['menu2'], $data['menu3'], $data['caption'], $data['footer']
                , $data['bgheader'], $data['bgfooter'], $data['tgpicture1'], $data['tgpicture2'], $data['tgpicture3']);
    }

    function update_header() {

        $data['header'] = $this->input->post('header', true);
        $this->model_site->header_update($data['header']);
        //print_r($data);
    }

    function update_bgheader() {

        $data['bgheader'] = $this->input->post('bgheader', true);
        $this->model_site->bgheader_update($data['bgheader']);
        //print_r($data);
    }

    function update_footer() {
        $data['footer'] = $this->input->post('footer', true);
        $this->model_site->footer_update($data['footer']);
    }

    function update_bgfooter() {
        $data['bgfooter'] = $this->input->post('bgfooter', true);
        $this->model_site->bgfooter_update($data['bgfooter']);
    }

    function update_caption() {
        $data['caption'] = $this->input->post('caption', true);
        $this->model_site->caption_update($data['caption']);
    }

    function update_menu1() {
        $data['menu1'] = $this->input->post('menu1', true);
        $this->model_site->menu1_update($data['menu1']);
    }

    function update_menu2() {
        $data['menu2'] = $this->input->post('menu2', true);
        $this->model_site->menu2_update($data['menu2']);
    }

    function update_menu3() {
        $data['menu3'] = $this->input->post('menu3', true);
        $this->model_site->menu3_update($data['menu3']);
    }

    function update_tgpicture1() {
        $data['tgpicture1'] = $this->input->post('tgpicture1', true);
        $this->model_site->tgpicture1_update($data['tgpicture1']);
    }

    function update_tgpicture2() {
        $data['tgpicture2'] = $this->input->post('tgpicture2', true);
        $this->model_site->tgpicture2_update($data['tgpicture2']);
    }

    function update_tgpicture3() {
        $data['tgpicture3'] = $this->input->post('tgpicture3', true);
        $this->model_site->tgpicture3_update($data['tgpicture3']);
    }

    function update_picture($status) {
        if (status == 1) {
            echo "masuk";
        }
        //$data['picture1'] = $this->input->post('picture1', true);
        //$data['picture2'] = $this->input->post('picture2', true);
        //$data['picture3'] = $this->input->post('picture3', true);
        //print_r($data);
    }

    function upload_smpicture($status) {

        $initial = "file_";
        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png';
        $config['max_size'] = '215000';
        $config['file_name'] = "'smpicture_$status'";

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
            if ($status == 1) {
                //$this->model_news->update_header($id, $data['picture']);
                $this->model_site->update_smpicture($data['picture'], $status);
            }
            if ($status == 2) {
                $this->model_site->update_smpicture($data['picture'], $status);
            }
            if ($status == 3) {
                $this->model_site->update_smpicture($data['picture'], $status);
            }

            echo "{";
            echo "msg: 1";
            echo "}";
        }
    }

    /*
     * Front End
     */

    function header() {
        $data['header'] = $this->model_site->select_header_text()->row();
        $this->load->view('site/header', $data);
    }

    function topbar() {
        $data['topbar'] = $this->model_site->select_topbar()->row();
        $this->load->view('site/topbar', $data);
    }

    function caption_text() {
        
    }

    function footer_text($param) {
        
    }

}