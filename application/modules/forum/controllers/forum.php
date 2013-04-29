<?php

/*
 * Modul Forum
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forum extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('model_forum', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function index($user_id = 1) {
        $data['user_id'] = $user_id;
        $data['content'] = $this->model_forum->select_users($user_id)->row();
        $data['themes'] = $this->model_forum->select_themes()->row();
        $this->load->view('forum/index', $data);
    }

    function btn_broadcast($content_id, $type) {
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $data['count'] = count($this->model_forum->select_broadcast($content_id, $type)->result());
        $this->load->view('forum/btn_broadcast', $data);
    }

    function action_broadcast($content_id, $type) {
        $user = $this->ion_auth->user()->row();
        /*
         * forum_type
         * 10=wall
         * 8=gambar
         * 9=diskusi soal
         */
        if ($type != 10) {
            $content = $this->model_forum->select_content($content_id, $type)->row();
            $data['user_id'] = $user->id;
            $data['user_idto'] = $content->user_id;
            $data['message'] = $content->title . ' - ' . $content->description;
            $data['url'] = $content->file;
            $data['forum_id'] = $content->id_content;
            $data['forum_type'] = $content->type;
            $this->model_forum->insert_wall($data);
            $databroadcast['user_id'] = $user->id;
            $databroadcast['content_id'] = $content->id_content;
            $databroadcast['broadcast_type'] = $content->type;
            $this->model_forum->insert_broadcast($databroadcast);
            $countbroadcast = count($this->model_forum->select_broadcast($content->id_content, $content->type)->result());
            echo '<i class="icon-broadcast"></i> <span class="badge">' . $countbroadcast . '</span>';
        }
    }

    function btn_tags($content_id, $type) {
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $data['count'] = count($this->model_forum->select_tag($content_id, $type)->result());
        $this->load->view('forum/btn_tag', $data);
    }

    function form_tag_add($content_id, $type) {
        $data['content_id'] = $content_id;
        $data['tag_type'] = $type;
        $this->load->view('forum/form_list_tag', $data);
    }

    function add_tag() {
        $user = $this->ion_auth->user()->row();
        $data['user_id'] = $user->id;
        $data['content_id'] = $this->input->post('content_id', true);
        $data['tag'] = $this->input->post('tag', true);
        $data['tag_type'] = $this->input->post('tag_type', true);
        $this->model_forum->insert_tag($data);
        echo '<i class="icon-tag"></i>' . $data['tag'];
    }

    function counter_tag($content_id, $tag_type) {
        $count = count($this->model_forum->select_tag($content_id, $tag_type)->result());
        echo '<i class="icon-tag"></i> <span class="badge">' . $count . '</span>';
    }

    function widget_trending_tag() {
        $data['trending'] = $this->model_forum->select_trending_tag()->result();
        $this->load->view('forum/widget_trending_tag', $data);
    }

    function widget_profile() {
        $this->load->view('forum/widget_profile');
    }

    function content_list_by_tag($tag) {
        $data['content'] = $this->model_forum->select_tag_join_content($tag)->result();
        $this->load->view('forum/wall_content', $data);
    }

    function wall_list_first() {
        $data['content'] = $this->model_forum->select_wall_first()->result();
        $this->load->view('forum/wall_activity', $data);
    }

    function wall_list() {
        
    }

    function wall_activity_first() {
        $user = $this->ion_auth->user()->row();
        $data['content'] = $this->model_forum->select_activity_first($user->id)->result();
        $this->load->view('forum/wall_activity', $data);
    }

}