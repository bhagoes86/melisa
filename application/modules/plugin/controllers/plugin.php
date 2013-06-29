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
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $this->load->view('plugin/btn_bookmark', $data);
    }

//    function action_broadcast($content_id, $type) {
//        $user = $this->ion_auth->user()->row();
//        $content = $this->model_forum->select_content($content_id, $type)->row();
//        $data['user_id'] = $user->id;
//        $data['user_idto'] = $content->user_id;
//        $data['message'] = $content->title . ' - ' . $content->description;
//        $data['url'] = $content->file;
//        $data['forum_id'] = $content->id_content;
//        $data['forum_type'] = $content->type;
//        $this->model_forum->insert_wall($data);
//        $databroadcast['user_id'] = $user->id;
//        $databroadcast['content_id'] = $content->id_content;
//        $databroadcast['broadcast_type'] = $content->type;
//        $this->model_forum->insert_broadcast($databroadcast);
//        $countbroadcast = count($this->model_forum->select_broadcast($content->id_content, $content->type)->result());
//        echo '<i class="icon-broadcast"></i> <span class="badge">' . $countbroadcast . '</span>';
//    }
}