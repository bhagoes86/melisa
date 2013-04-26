<?php

/*
 * Modul Content
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('model_content', '', true);
        $this->load->helper('directory');
        $this->load->helper('text');
    }

    function shortcut() {
        $this->load->view('content/shortcut');
    }

    /*
     * form upload video
     */

    function form_upload_video() {
        $this->load->view('content/form_video_upload');
    }

    /*
     * video uploader
     */

    function upload_video() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['type'] = 0; //video
            $data['show'] = 0; //unshow
            $id_content = $this->model_content->insert_content($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'mp4|mov|flv|MP4|MOV|FLV';
            $config['max_size'] = '2097152'; //dengan maksimal ukuran berkas 2 Giga
            $config['file_name'] = $id_content; //berkas dikirim kemudian diganti namanya

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
                $this->model_content->update_content($id_content, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    /*
     * cover generator
     */

    function gen_cov_vid_mp4($id_content) {
        exec("ffmpeg -y -i ./resource/'" . $id_content . "'.mp4 -f mjpeg -vframes 1 -ss 18 ./resource/'" . $id_content . "'.jpg");
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_vid_mp4_big($id_content) {
        exec("ffmpeg -y -i ./resource/'" . $id_content . "'.MP4 -f mjpeg -vframes 1 -ss 18 ./resource/'" . $id_content . "'.jpg");
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_vid_mov($id_content) {
        exec("ffmpeg -y -i ./resource/'" . $id_content . "'.mov -f mjpeg -vframes 1 -ss 18 ./resource/'" . $id_content . "'.jpg");
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_vid_mov_big($id_content) {
        exec("ffmpeg -y -i ./resource/'" . $id_content . "'.MOV -f mjpeg -vframes 1 -ss 18 ./resource/'" . $id_content . "'.jpg");
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_vid_flv($id_content) {
        exec("ffmpeg -y -i ./resource/'" . $id_content . "'.flv -f mjpeg -vframes 1 -ss 18 ./resource/'" . $id_content . "'.jpg");
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_vid_flv_big($id_content) {
        exec("ffmpeg -y -i ./resource/'" . $id_content . "'.FLV -f mjpeg -vframes 1 -ss 18 ./resource/'" . $id_content . "'.jpg");
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_doc_pdf($id_content) {
        exec("chmod 777 ./resource/'" . $id_content . "'.pdf -R");
        exec("convert ./resource/'" . $id_content . "'.pdf[0] ./resource/'" . $id_content . "'.jpg"); //buat cover
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    function gen_cov_doc_pdf_big($id_content) {
        exec("chmod 777 ./resource/'" . $id_content . "'.PDF -R");
        exec("convert ./resource/'" . $id_content . "'.PDF[0] ./resource/'" . $id_content . "'.jpg"); //buat cover
        //query update cover
        $data['cover'] = $id_content;
        $this->model_content->update_content($id_content, $data);
    }

    /*
     * Video Converter MOV to FLV
     */

    function con_vid_mov_flv($id_content) {
        exec("cp ./resource/'" . $id_content . "'.mov ./resource/'" . $id_content . "'.flv");
        $data['converted'] = 1;
        $this->model_content->update_content($id_content, $data);
    }

    function publish_content($id_content) {
        $data['show'] = 1;
        $this->model_content->update_content($id_content, $data);
    }

    /*
     * Form Add Content From Link
     */

    function form_add_link($type) {
        $data['type'] = $type;
        $this->load->view('form_add_link', $data);
    }

    /*
     * Add Content From Link
     */

    function add_content_link() {
        $user = $this->ion_auth->user()->row();
        $data['user_id'] = $user->id;
        $data['file'] = $this->input->post('url', true);
        $data['title'] = $this->input->post('title', true);
        $data['description'] = $this->input->post('description', true);
        $data['type'] = $this->input->post('type', true);
        $data['show'] = 0;
        $data['cover'] = 0;
        $this->model_content->insert_content($data);
    }

    /*
     * Viewer
     */

    function video($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        if (!$this->ion_auth->logged_in()) {
            $log['user_id'] = 0;
        } else {
            $user = $this->ion_auth->user()->row();
            $log['user_id'] = $user->id;
        }
        $log['content_id'] = $id_content;
        $log['type'] = 0;
        $log['status'] = 0;
        $this->model_content->insert_content_log($log);

        $this->load->view('content/viewer_video', $data);
    }

    function youtube($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();

        if (!$this->ion_auth->logged_in()) {
            $log['user_id'] = 0;
        } else {
            //get id
            $user = $this->ion_auth->user()->row();
            $log['user_id'] = $user->id;
        }
        $log['content_id'] = $id_content;
        $log['type'] = 2;
        $log['status'] = 0;
        $this->model_content->insert_content_log($log);

        $this->load->view('content/viewer_youtube', $data);
    }

    function vimeo($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();

        if (!$this->ion_auth->logged_in()) {
            $log['user_id'] = 0;
        } else {
            //get id
            $user = $this->ion_auth->user()->row();
            $log['user_id'] = $user->id;
        }
        $log['content_id'] = $id_content;
        //vimeo 3
        $log['type'] = 3;
        //baca
        $log['status'] = 0;
        $this->model_content->insert_content_log($log);

        $this->load->view('content/viewer_vimeo', $data);
    }

    function plain_video($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('plain_video', $data);
    }

    function plain_youtube($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('plain_youtube', $data);
    }

    function plain_vimeo($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('plain_vimeo', $data);
    }

    /*
     * List Video Random In Viewer
     */

    function rightbar_video_viewer() {
        $data['content'] = $this->model_content->select_video_limit_random(5)->result();
        $this->load->view('content/rightbar_video_viewer', $data);
    }

    /*
     * Bookmark
     */

    function btn_content_bookmark($content_id, $type) {
        $data['content_id'] = $content_id;
        $data['type'] = $type;
        $this->load->view('content/btn_watch_latter', $data);
    }

    function do_content_bookmark($content_id, $type) {
        $user = $this->ion_auth->user()->row();

        $total_content = count($this->model_content->select_content_bookmark_by_content_user($content_id, $user->id)->result());
        if ($total_content >= 1) {
            echo 'Sudah Disimpan Sebelumnya';
        } elseif ($total_content == 0) {
            $data['user_id'] = $user->id;
            $data['content_id'] = $content_id;
            $data['type'] = $type;
            $this->model_content->insert_content_bookmark($data);
            echo 'Data Disimpan';
        }
    }

    function list_my_bookmark_content() {
        $user = $this->ion_auth->user()->row();
        $data['content'] = $this->model_content->select_content_bookmark_by_user($user->id)->result();
        $this->load->view('content/table_content_watchlater', $data);
    }

    /*
     * Content Downloader
     */

    function download($id_content) {
        $this->load->library('filedownload'); // panggil librari

        $user = $this->ion_auth->user()->row();
        $log['user_id'] = $user->id;
        $log['content_id'] = $id_content;
        $log['type'] = 0;
        $log['status'] = 1;

        $content = $this->model_content->select_content_by_id($id_content)->row();

        $ext = $content->ext;
        $url = './resource/' . $content->file;
        $config = array(
            'file' => "$url", // lokasi file di server. path relatif pada lokasi index.php root CI
            'resume' => true, // seeting support resume
            'filename' => "$content->title" . "$ext", //file name yang akan disimpan di komputer.
            'speed' => 200, // file download speed limit, in kbytes
        );

        $this->model_content->insert_content_log($log);
        $this->filedownload->send_download($config);
    }

    /*
     * List Video
     */

    function list_my_video() {
        $user = $this->ion_auth->user()->row();
        $type = array('0', '2', '3');
        $data['content'] = $this->model_content->select_my_content($user->id, $type)->result();
        $this->load->view('content/table_video_me', $data);
    }

    function list_my_sound() {
        $user = $this->ion_auth->user()->row();
        $type = array('6');
        $data['content'] = $this->model_content->select_my_content($user->id, $type)->result();
        $this->load->view('content/table_content_me', $data);
    }

    function list_my_document() {
        $user = $this->ion_auth->user()->row();
        $type = array('1', '4', '5', '7');
        $data['content'] = $this->model_content->select_my_content($user->id, $type)->result();
        $this->load->view('content/table_content_me', $data);
    }

    function list_my_video_history() {
        $user = $this->ion_auth->user()->row();
        $status = 0;
        $type = array('0', '1', '2', '3', '4', '5', '6', '7');
        $data['content'] = $this->model_content->select_content_log($user->id, $status, $type)->result();
        $this->load->view('content/table_content_history', $data);
    }

    function list_video_by_category($id_category) {
        $data['content'] = $this->model_content->select_video_by_category($id_category)->result();
        $this->load->view('content/table_video', $data);
    }

    function table_content($show) {
        $data['content'] = $this->model_content->select_content_show($show)->result();
        $this->load->view('content/table_content', $data);
    }

    function video_list() {
        $data['category'] = $this->model_content->select_category()->result();
        $data['video'] = $this->model_content->select_video_by_type(0, 57)->result();
        $data['video_external'] = $this->model_content->select_video_by_type_in(array(2, 3), 57)->result();
        $data['soundcloud'] = $this->model_content->select_content_by_type_limit(6, 1)->row();

        $this->load->view('content/table_content_dashboard', $data);
    }

    /*
     * Action
     */

    function content_config($id_content) {
        $user = $this->ion_auth->user()->row();
        $data['topic'] = $this->model_content->select_topic_where_status(5)->result();
        $data['faculty'] = $this->model_content->select_faculty()->result();
        $data['bimbel'] = $this->model_content->select_topic_where_status_in(array('4', '3', '2'))->result();
        $data['category'] = $this->model_content->select_category()->result();
        $data['course'] = $this->model_content->select_course_by_user($user->id)->result();

        $data['content_id'] = $id_content;
        $data['content_course'] = $this->model_content->select_content_course($id_content)->result();
        $data['content_topic'] = $this->model_content->select_content_topic($id_content)->result();
        $data['content_faculty'] = $this->model_content->select_content_faculty($id_content)->result();
        $data['content_bimbel'] = $this->model_content->select_content_topic_in($id_content, array('4', '3', '2'))->result();
        $data['content_category'] = $this->model_content->select_content_category($id_content)->result();
        $this->load->view('content/form_content_configuration', $data);
    }

    function content_category_add() {
        $data['content_id'] = $this->input->post('content_id', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $total = count($this->model_content->cek_content_by_category_id($data['content_id'], $data['category_id'])->result());
        if ($total > 0) {
            echo '1'; //sudah
        } else {
            echo '2'; //belum
            $this->model_content->insert_content_category($data);
        }
    }

    function content_course_add() {
        $data['content_id'] = $this->input->post('content_id', true);
        $data['course_id'] = $this->input->post('course_id', true);
        $total = count($this->model_content->cek_content_by_course_id($data['content_id'], $data['course_id'])->result());
        if ($total > 0) {
            echo '1'; //sudah
        } else {
            echo '2'; //belum
            $this->model_content->insert_content_course($data);
        }
    }

    function content_topic_add() {
        $data['content_id'] = $this->input->post('content_id', true);
        $data['topic_id'] = $this->input->post('topic_id', true);
        $total = count($this->model_content->cek_content_by_topic_id($data['content_id'], $data['topic_id'])->result());
        if ($total > 0) {
            echo '1'; //sudah
        } else {
            echo '2'; //belum
            $this->model_content->insert_content_topic($data);
        }
    }

    function content_faculty_add() {
        $data['content_id'] = $this->input->post('content_id', true);
        $data['faculty_id'] = $this->input->post('faculty_id', true);
        $total = count($this->model_content->cek_content_by_faculty_id($data['content_id'], $data['faculty_id'])->result());
        if ($total > 0) {
            echo '1'; //sudah
        } else {
            echo '2'; //belum
            $this->model_content->insert_content_faculty($data);
        }
    }

    function content_edit($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/form_content_edit', $data);
    }

    function content_info_update() {
        $id_content = $this->input->post('id_content', true);
        $data['title'] = $this->input->post('title', true);
        $data['description'] = $this->input->post('description', true);
        $this->model_content->update_content($id_content, $data);
    }

    function delete_content($id_content) {
        $data['show'] = 2;
        $this->model_content->update_content($id_content, $data);
    }

    function delete_watch_later($content_id) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $this->model_content->delete_watch_later($content_id, $user_id);
    }

    function delete_history($content_id) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $this->model_content->delete_content_log($content_id, $user_id);
    }

    function url_embed($id_content) {
        $data_url = $this->model_content->select_content_by_id($id_content)->row();
        $url = $data_url->file;
        $media = analyze_media($url);
        $trace = explode('^^^', $media);
        switch ($trace[0]) {
            case 'image' :
                echo "<a href='" . $trace[3] . "' target='_blank'><img src='" . $trace[3] . "' width='100%' /></a>";
                break;
            case 'youtube' :
                echo 'http://youtube.com/embed/' . $trace[1];
                break;
            case 'vimeo' :
                //vimeo
                echo vimeo($trace[1]);
                break;
            case 'scribd' :
                //scribd
                echo scribd($trace[1]);
                break;
            case 'docstoc' :
                //docstoc
                echo docstoc($trace[1]);
                break;
            case 'link' :
                //link
                break;
            default :
                die;
        }
    }

    /*
     * Dokumen
     */

    function plain_slideshare($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $url = $data['content']->file;
        if (!function_exists('curl_init'))
            die('CURL is not installed!');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.slideshare.net/api/oembed/2?url=$url&format=json&maxwidth=550");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        //$output = unserialize(curl_exec($ch));
        curl_close($ch);
        $slideshare = json_decode($output);
        $data['presentation'] = explode("/", "$slideshare->slide_image_baseurl");
        $this->load->view('content/plain_slideshare', $data);
    }

    function slideshare($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $url = $data['content']->file;
        if (!function_exists('curl_init'))
            die('CURL is not installed!');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.slideshare.net/api/oembed/2?url=$url&format=json&maxwidth=550");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        //$output = unserialize(curl_exec($ch));
        curl_close($ch);
        $slideshare = json_decode($output);
        $data['presentation'] = explode("/", "$slideshare->slide_image_baseurl");
        $this->load->view('content/viewer_slideshare', $data);
    }

    function plain_scribd($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/plain_scribd', $data);
    }

    function plain_soundcloud($id_content) {
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/plain_soundcloud', $data);
    }

    function soundcloud($id_content) {
        $data['other_content'] = $this->model_content->select_content_by_type_limit(6, 50)->result();
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/viewer_soundcloud', $data);
    }

    function docstoc($id_content) {
        $data['other_content'] = $this->model_content->select_content_by_type_limit(7, 50)->result();
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/viewer_docstoc', $data);
    }

    function scribd($id_content) {
        $data['other_content'] = $this->model_content->select_content_by_type_limit(4, 50)->result();
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/viewer_scribd', $data);
    }

    function all_radio() {
        $data['content'] = $this->model_content->select_content_by_type(6)->result();
        $this->load->view('content/table_radio', $data);
    }

    function random_radio_limit($limit) {
        $data['content'] = $this->model_content->select_content_by_type_limit_random(6, $limit)->row();
        $this->load->view('content/plain_soundcloud', $data);
    }

    function random_video_limit($limit) {
        $data['content'] = $this->model_content->select_content_by_type_limit_random(0, $limit)->result();
        $this->load->view('content/table_video_random', $data);
    }

    function random_slideshare_limit($limit) {
        $data['content'] = $this->model_content->select_content_by_type_limit_random(5, $limit)->row();
        $url = $data['content']->file;
        if (!function_exists('curl_init'))
            die('CURL is not installed!');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.slideshare.net/api/oembed/2?url=$url&format=json&maxwidth=550");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        //$output = unserialize(curl_exec($ch));
        curl_close($ch);
        $slideshare = json_decode($output);
        $data['presentation'] = explode("/", "$slideshare->slide_image_baseurl");
        $this->load->view('content/plain_slideshare', $data);
    }

    function all_document() {
        $document = array(1, 4, 7);
        $limit = 95;
        $data['content'] = $this->model_content->select_content_by_type_in_limit($document, $limit)->result();
        $this->load->view('content/table_document', $data);
    }

    function all_presentation() {
        $document = array(5);
        $limit = 95;
        $data['content'] = $this->model_content->select_content_by_type_in_limit($document, $limit)->result();
        $this->load->view('content/table_document', $data);
    }

    function my_document() {
        $this->load->view('content/table_document_me', $data);
    }

    function my_radio() {
        $this->load->view('content/table_radio_me', $data);
    }

    function form_upload_document() {
        $this->load->view('content/form_document_upload');
    }

    function upload_document() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['type'] = 1; //document
            $data['show'] = 0; //unshow
            $id_content = $this->model_content->insert_content($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'pdf|PDF';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            $config['file_name'] = $id_content; //berkas dikirim kemudian diganti namanya

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
                $this->model_content->update_content($id_content, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    function document($id_content) {
        $data['other_content'] = $this->model_content->select_content_by_type_limit(1, 50)->result();
        $data['content'] = $this->model_content->select_content_by_id($id_content)->row();
        $this->load->view('content/viewer_document', $data);
    }

    function delete_content_course($course_id, $content_id) {
        $this->model_content->delete_content_course($course_id, $content_id);
    }

    function delete_content_topic($topic_id, $content_id) {
        $this->model_content->delete_content_topic($topic_id, $content_id);
    }

    function delete_content_category($category_id, $content_id) {
        $this->model_content->delete_content_category($category_id, $content_id);
    }

//    function btn_share($url) {
//        $data['url'] = $url;
//        $this->load->view('content/button_share_facebook', $data);
//        $this->load->view('content/button_share_twitter', $data);
//        $this->load->view('content/button_share_googleplus', $data);
//    }

    function content_silabus($id_content, $id_course) {
        $data['id_course'] = $id_course;
        $data['id_content'] = $id_content;
        $data['silabus_course'] = $this->model_content->select_silabus_course($id_course)->result();
        $data['silabus_content'] = $this->model_content->get_silabus_content($id_content, $id_course)->result();
        //print_r($data);
        $this->load->view('content_add_silabus', $data);
    }

    function content_silabus_add($id_content) {
        $data['content_id'] = $id_content;
        $data['silabus_id'] = $this->input->post('silabus_id', true);
        $cek_konten = count($this->model_content->select_silabus_content($data['content_id'], $data['silabus_id'])->result());
        if ($cek_konten == 0) {
            $this->model_content->insert_content_silabus($data['content_id'], $data['silabus_id']);
        } else {
            echo "1";
        }
    }

    function delete_silabus_content($id_content_silabus) {
        $this->model_content->delete_content_silabus($id_content_silabus);
    }

    function home_video() {
        $data['content'] = $this->model_content->select_content(0, 3)->result();
        $this->load->view('content/home_video', $data);
    }

    function home_presentation() {
        $data['content'] = $this->model_content->select_content(5, 3)->result();
        $this->load->view('content/home_presentation', $data);
    }

}
