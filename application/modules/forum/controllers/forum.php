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

    function index($user_id) {
        $data['user_id'] = $user_id;
        $data['content'] = $this->model_forum->select_users($user_id)->row();
        $data['themes'] = $this->model_forum->select_themes()->row();
        $this->load->view('forum/index', $data);
    }

    /*
     * Broadcast
     */

    function btn_broadcast($content_id, $type) {
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $data['count'] = count($this->model_forum->select_broadcast($content_id, $type)->result());
        $this->load->view('forum/btn_broadcast', $data);
    }

    function action_broadcast($content_id, $type) {
        $user = $this->ion_auth->user()->row();
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

    /*
     * Tag
     */

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

    function content_list_by_tag($tag) {
        $data['content'] = $this->model_forum->select_tag_join_content(urldecode($tag))->result();
        $this->load->view('forum/wall_content_tag', $data);
    }

    /*
     * Profile
     */

    function widget_profile() {
        $this->load->view('forum/widget_profile');
    }

    /*
     * Wall
     */

    function wall_form($user_idto) {
        $user = $this->ion_auth->user()->row();
        $data['user_id'] = $user->id;
        $data['user_idto'] = $user_idto;
        $this->load->view('forum/wall_form', $data);
    }

    //list/

    function wall_content_podcast() {
        $data['content'] = $this->model_forum->select_content_podcast()->result();
        $this->load->view('forum/wall_content_podcast', $data);
    }

    function wall_by_id($id_wall) {
        $data['content'] = $this->model_forum->select_wall_by_id($id_wall)->row();
        $this->load->view('forum/wall_after_post', $data);
    }

    function wall_broadcast_first() {
        $user = $this->ion_auth->user()->row();
        $data['content'] = $this->model_forum->select_wall_broadcast_first()->result();
        $this->load->view('forum/wall_broadcast_first', $data);
    }

    function wall_content_activity() {
        $data['content'] = $this->model_forum->select_activity()->result();
        $this->load->view('forum/wall_content_activity', $data);
    }

    function wall_content_document() {
        $data['content'] = $this->model_forum->select_content_document()->result();
        $this->load->view('forum/wall_content_document', $data);
    }

    function wall_content_presentation() {
        $data['content'] = $this->model_forum->select_content_presentation()->result();
        $this->load->view('forum/wall_content_presentation', $data);
    }

    function wall_content_bookmark() {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['content'] = $this->model_forum->select_content_bookmark($user_id)->result();
        $this->load->view('forum/wall_content_bookmark', $data);
    }

    function wall_content_log() {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $data['content'] = $this->model_forum->select_content_log($user_id)->result();
        $this->load->view('forum/wall_content_log', $data);
    }

    function wall_content_podcast_faculty($id_faculty) {
        $data['content'] = $this->model_forum->select_content_podcast_by_faculty($id_faculty)->result();
        $this->load->view('forum/wall_content_podcast', $data);
    }

    function wall_content_document_faculty($id_faculty) {
        $data['content'] = $this->model_forum->select_content_document_by_faculty($id_faculty)->result();
        $this->load->view('forum/wall_content_document', $data);
    }

    function wall_content_presentation_faculty($id_faculty) {
        $data['content'] = $this->model_forum->select_content_presentation_by_faculty($id_faculty)->result();
        $this->load->view('forum/wall_content_presentation', $data);
    }

    function wall_content_podcast_year($year) {
        $data['content'] = $this->model_forum->select_podcast_year($year)->result();
        $this->load->view('forum/wall_content_podcast', $data);
    }

    function wall_content_podcast_year_month($year, $month) {
        $data['content'] = $this->model_forum->select_podcast_year_month($year, $month)->result();
        $this->load->view('forum/wall_content_podcast', $data);
    }

    function wall_content_document_year($year) {
        $data['content'] = $this->model_forum->select_podcast_year($year)->result();
        $this->load->view('forum/wall_content_document', $data);
    }

    function wall_content_document_year_month($year, $month) {
        $data['content'] = $this->model_forum->select_podcast_year_month($year, $month)->result();
        $this->load->view('forum/wall_content_document', $data);
    }

    function wall_content_presentation_year($year) {
        $data['content'] = $this->model_forum->select_podcast_year($year)->result();
        $this->load->view('forum/wall_content_presentation', $data);
    }

    function wall_content_presentation_year_month($year, $month) {
        $data['content'] = $this->model_forum->select_podcast_year_month($year, $month)->result();
        $this->load->view('forum/wall_content_presentation', $data);
    }

    //action/

    function delete_wall($id_wall) {
        $this->model_forum->delete_wall($id_wall);
    }

    function add_wall() {
        $data['user_id'] = $this->input->post('user_id', TRUE);
        $data['user_idto'] = $this->input->post('user_idto', TRUE);
        $data['message'] = $this->input->post('message', TRUE);
        $data['url'] = $this->input->post('alamat', TRUE);
        $data['forum_id'] = 0;
        $data['forum_type'] = $this->input->post('forum_type', TRUE);
        $id_wall = $this->model_forum->insert_wall($data);
        echo $id_wall;
    }

    function wall_upload() {
        $user = $this->ion_auth->user()->row();
        $data['user_id'] = $this->input->post('user_id', true);
        $data['user_idto'] = $this->input->post('user_idto', true);
        $data['message'] = $this->input->post('message', true);
        $data['forum_type'] = $this->input->post('forum_type', true);
        $id_wall = $this->model_forum->insert_wall($data);

        $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
        $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
        $config['file_name'] = 'wall_' . $id_wall; //berkas dikirim kemudian diganti namanya

        $this->load->library('upload', $config); //panggil librari upload

        if (!$this->upload->do_upload()) {//kondisi upload gagal
            $error = array('error' => $this->upload->display_errors());
            echo "{";
            echo "msg: '" . $error['error'] . "'";
            echo "}";
        } else {//kondisi berhasil
            $hasil = $this->upload->data();
            $data2['url'] = $hasil['file_name'];
            $this->model_forum->update_wall($id_wall, $data2);
            echo "{";
            echo "msg: $id_wall";
            echo "}";
        }
    }

    function wall_player($id_wall) {
        $data['content'] = $this->model_forum->select_wall_by_id($id_wall)->row();
        $this->load->view('forum/wall_player', $data);
    }

    function wall_content_player($id_content) {
        $data['content'] = $this->model_forum->select_content_by_id($id_content)->row();
        $user = $this->ion_auth->user()->row();
        $datalog['content_id'] = $data['content']->id_content;
        $datalog['user_id'] = $user->id;
        $datalog['type'] = $data['content']->type;
        $this->model_forum->insert_log($datalog);
        $this->load->view('forum/wall_content_player', $data);
    }

    /*
     * User
     */

    function user_name($id) {
        $user_info = $this->model_forum->select_user_info($id)->row();
        echo $user_info->first_name . ' ' . $user_info->last_name;
    }

    /*
     * widget
     */

    function widget_podcast_meta_time() {
        $this->load->view('forum/widget_podcast_meta_time');
    }

    function widget_document_meta_time() {
        $this->load->view('forum/widget_document_meta_time');
    }

    function widget_presentation_meta_time() {
        $this->load->view('forum/widget_presentation_meta_time');
    }

    function widget_podcast_meta_faculty() {
        $data['content'] = $this->model_forum->select_faculty()->result();
        $this->load->view('forum/widget_podcast_meta_faculty', $data);
    }

    function widget_document_meta_faculty() {
        $data['content'] = $this->model_forum->select_faculty()->result();
        $this->load->view('forum/widget_document_meta_faculty', $data);
    }

    function widget_presentation_meta_faculty() {
        $data['content'] = $this->model_forum->select_faculty()->result();
        $this->load->view('forum/widget_presentation_meta_faculty', $data);
    }

}