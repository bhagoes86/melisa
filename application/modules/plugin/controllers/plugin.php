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

    function btn_subscribe($course_id) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['course_id'] = $course_id;
        $data['subscribe_status'] = count($this->model_plugin->select_subscribe_status($course_id, $user_id)->row());
        $this->load->view('plugin/btn_subscribe', $data);
    }

    function btn_bookmark_remove($content_id, $type) {
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $this->load->view('plugin/btn_bookmark_remove', $data);
    }

    function delete_bookmark_me($content_id, $type) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $this->model_plugin->delete_bookmark($content_id, $type, $user_id);
    }

    function add_bookmark_me($content_id, $type) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['content_id'] = $content_id;
        $data['user_id'] = $user_id;
        $data['type'] = $type;
        $this->model_plugin->insert_bookmark($data);
    }

    function add_subscribe_me($course_id) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['course_id'] = $course_id;
        $data['user_id'] = $user_id;
        $this->model_plugin->insert_subscribe($data);
    }

    function tag_content_by_id_limit($content_id, $limit) {
        $data['content_id'] = $content_id;
        $data['content'] = $this->model_plugin->select_tags_content($content_id, $limit)->result();
        $data['tag_counter'] = count($data['content']);
        $this->load->view('plugin/wall_content_tag_list', $data);
    }

    function tag_content_by_id_limit_in_bookmark($content_id, $limit) {
        $data['content_id'] = $content_id;
        $data['content'] = $this->model_plugin->select_tags_content($content_id, $limit)->result();
        $data['tag_counter'] = count($data['content']);
        $this->load->view('plugin/wall_content_tag_list_in_bookmark', $data);
    }

    function get_content_from_tag($tag) {
        $data['content'] = $this->model_plugin->select_tag_join_content(urldecode($tag))->result();
        $this->load->view('plugin/wall_content_layout', $data);
    }

    function get_content_from_tag_in_bookmark($tag) {
        $data['content'] = $this->model_plugin->select_tag_join_content(urldecode($tag))->result();
        $this->load->view('plugin/wall_content_bookmark_in_bookmark', $data);
    }

}