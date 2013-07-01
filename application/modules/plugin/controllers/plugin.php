<?php

/*
 * Modul Plugin
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plugin extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('model_plugin', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function btn_bookmark($content_id, $type) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $data['bookmark_status'] = count($this->model_plugin->select_bookmark_status($content_id, $type, $user_id)->row());
        $this->load->view('plugin/btn_bookmark', $data);
    }

    function tag_content_by_id_limit($content_id, $limit) {
        $data['content_id'] = $content_id;
        $data['content'] = $this->model_plugin->select_tags_content($content_id, $limit)->result();
        $data['tag_counter'] = count($data['content']);
        $this->load->view('plugin/wall_content_tag_list', $data);
    }

    function get_content_from_tag($tag) {
        $data['content'] = $this->model_plugin->select_tag_join_content(urldecode($tag))->result();
        $this->load->view('plugin/wall_content_layout', $data);
    }

}