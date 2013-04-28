<?php

/*
 * Modul Course
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('model_course', '', true);
        $this->load->helper('text');
        $this->load->helper(array('url', 'form'));
    }

    function list_assignment($id_course) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['id_course'] = $id_course;
            $data['list_assignment'] = $this->model_course->select_avail_assignment_group($id_course)->result();
            $this->load->view('course/list_assignment', $data);
        }
    }

    function list_quiz($id_course) {

        $user = $this->ion_auth->user()->row();
        if ($user != null) {
            $data['id_course'] = $id_course;
            $list_quiz = array();
            $temp_quiz = $this->model_course->select_avail_quiz_group($id_course)->result();
            $i = 0;
            foreach ($temp_quiz as $quiz) {
                $check_user_quiz = $this->model_course->check_user_quiz_participate($user->id, $id_course, $quiz->id_quiz, $quiz->id_group)->row();
                $count_check_user_quiz = count($check_user_quiz);

                // menambah atrribute
                if ($count_check_user_quiz == 0) {
                    $quiz->is_attempt = 0;
                } else {
                    if ($check_user_quiz->status == 0) {
                        $quiz->is_attempt = 1;
                        if ($this->session->userdata('data_quiz') == '') {
                            $data_quiz['tiket_quiz'] = $check_user_quiz->id_result;
                            $data_quiz['group_id'] = $quiz->id_group;
                            $data_quiz['quiz_id'] = $quiz->id_quiz;
                            $data['data_quiz'] = $data_quiz;
                            $this->session->set_userdata($data);
                        }
                    } else if ($check_user_quiz->status == 1) {
                        $quiz->is_attempt = 2;
                    }
                }


                $list_quiz[$i] = $quiz;
                $i++;
            }
            $data['list_quiz'] = $list_quiz;


            if ($this->session->userdata('data_quiz') != '') {
                $temp_data_quiz = $this->session->userdata('data_quiz');
                $data['tiket_quiz'] = $temp_data_quiz['tiket_quiz'];
                $data['group_id'] = $temp_data_quiz['group_id'];
                $data['quiz_id'] = $temp_data_quiz['quiz_id'];
            }


            $this->load->view('course/list_quiz', $data);
        } else {
            echo "<p>Login untuk mengikuti evaluasi</p>";
        }
    }

    function form_add_topic() {
        $this->load->view('course/topic_form_add');
    }

    function topic_add() {
        $data['topic'] = $this->input->post('topic', true);
        $data['status'] = $this->input->post('status', true);
        $this->model_course->insert_topic($data);
    }

    function all_topic() {
        $data['select'] = $this->model_course->count_content_course_topic()->result();
        $this->load->view('course/topic', $data);
    }

    /*
     * Faculty
     */

    function all_faculty() {
        $data['select'] = $this->model_course->count_content_course_faculty()->result();
        $this->load->view('course/faculty', $data);
    }

    function all_kuliah() {
        $data['select'] = $this->model_course->count_course_topic_faculty()->result();
        $this->load->view('course/all_course', $data);
    }

    function form_add_faculty() {
        $this->load->view('course/faculty_form_add');
    }

    function faculty_add() {
        $data['faculty'] = $this->input->post('faculty', true);
        $data['short'] = $this->input->post('short', true);
        $data['parent'] = 0;
        $this->model_course->insert_faculty($data);
    }

    /*
     * Category
     */

    function all_category() {
        $data['select'] = $this->model_course->count_content_course_category()->result();
        //$data['total_content'] = count($data['content']);
        $this->load->view('course/category', $data);
    }

    function form_add_category() {
        $this->load->view('course/category_form_add');
    }

    function category_add() {
        $data['category'] = $this->input->post('category', true);
        $this->model_course->insert_category($data);
    }

    /*
     * Course
     */

    function index($id_course) {
        $data['id'] = $id_course;
        $data['course'] = $this->model_course->select_course_by_id($id_course)->row();
        $data['video'] = $this->model_course->select_video_by_course($id_course)->result();
        $data['document'] = $this->model_course->select_document_by_course($id_course)->result();
        $data['profil'] = $this->model_course->select_metadata($data['course']->user_id, 1)->row();
        $data['pengajaran'] = $this->model_course->select_metadata($data['course']->user_id, 2)->row();
        $data['riset'] = $this->model_course->select_metadata($data['course']->user_id, 3)->row();
        $data['publikasi'] = $this->model_course->select_metadata($data['course']->user_id, 4)->row();
        $data['pengalaman'] = $this->model_course->select_metadata($data['course']->user_id, 5)->row();
        $data['pendidikan'] = $this->model_course->select_metadata($data['course']->user_id, 6)->row();
        $data['silabus'] = $this->model_course->course_silabus_parent($id_course)->result();
        $this->load->view('course', $data);
    }

    function my_course() {
        $user = $this->ion_auth->user()->row();
        $data['content'] = $this->model_course->select_course_by_creator($user->id)->result();
        $this->load->view('course/course_table_me', $data);
    }

    function course_form_add() {
        $this->load->view('course/course_form_add');
    }

    function course_add() {
        $user = $this->ion_auth->user()->row();
        $data['user_id'] = $user->id;
        $data['course'] = $this->input->post('course', true);
        $data['description'] = $this->input->post('description', true);
        $this->model_course->insert_course($data);
    }

    function all_course() {
        $data['content'] = $this->model_course->select_course()->result();
        $this->load->view('course_table', $data);
    }

    function home_course() {
        $data['content'] = $this->model_course->select_course_limit(3)->result();
        $this->load->view('course_home', $data);
    }

    function course_form_add_cover($id_course) {
        $data['content'] = $this->model_course->select_course_by_id($id_course)->row();
        $this->load->view('course_form_cover', $data);
    }

    function upload_cover() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_course = $this->input->post('id_course', true);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|png|PNG';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            $config['file_name'] = 'course_' . $id_course; //berkas dikirim kemudian diganti namanya

            $this->load->library('upload', $config); //panggil librari upload

            if (!$this->upload->do_upload()) {//kondisi upload gagal
                $error = array('error' => $this->upload->display_errors());
                echo "{";
                echo "msg: '" . $error['error'] . "'";
                echo "}";
            } else {//kondisi berhasil
                $hasil = $this->upload->data();
                $data['picture'] = $hasil['file_name'];
                $this->model_course->update_cover($id_course, $data);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    function course_config($id_course) {
        $user = $this->ion_auth->user()->row();
        $data['topic'] = $this->model_course->select_topic_where_status(5)->result();
        $data['faculty'] = $this->model_course->select_faculty()->result();
        $data['bimbel'] = $this->model_course->select_topic_where_status_in(array('4', '3', '2'))->result();

        $data['course_id'] = $id_course;
        $data['course_topic'] = $this->model_course->select_course_topic($id_course)->result();
        $data['course_faculty'] = $this->model_course->select_course_faculty($id_course)->result();
        $data['course_bimbel'] = $this->model_course->select_course_topic_in($id_course, array('4', '3', '2'))->result();
        $this->load->view('course/course_form_configuration', $data);
    }

    function course_topic_add() {
        $data['course_id'] = $this->input->post('course_id', true);
        $data['topic_id'] = $this->input->post('topic_id', true);
        $total = count($this->model_course->cek_course_by_topic_id($data['course_id'], $data['topic_id'])->result());
        if ($total > 0) {
            echo '1'; //sudah
        } else {
            echo '2'; //belum
            $this->model_course->insert_course_topic($data);
        }
    }

    function course_faculty_add() {
        $data['course_id'] = $this->input->post('course_id', true);
        $data['faculty_id'] = $this->input->post('faculty_id', true);
        $total = count($this->model_course->cek_course_by_faculty_id($data['course_id'], $data['faculty_id'])->result());
        if ($total > 0) {
            echo '1'; //sudah
        } else {
            echo '2'; //belum
            $this->model_course->insert_course_faculty($data);
        }
    }

    function delete_course($id_course) {
        $data['show'] = 2;
        $this->model_course->update_course($id_course, $data);
    }

    function course_pending() {
        $data['content'] = $this->model_course->select_course_by_show(0)->result();
        $this->load->view('course_table_pending', $data);
    }

    function publish_course($id_course) {
        $data['show'] = 1;
        $this->model_course->update_course($id_course, $data);
    }

    function form_edit_topic($id) {
        $data['id'] = $id;
        $data['topic'] = $this->model_course->select_one_topic($data['id'])->row();
        $this->load->view('edit_topic', $data);
    }

    function form_edit_faculty($id) {
        $data['id'] = $id;
        $data['faculty'] = $this->model_course->select_one_faculty($data['id'])->row();
        $this->load->view('edit_faculty', $data);
    }

    function form_edit_category($id) {
        $data['id'] = $id;
        $data['category'] = $this->model_course->select_one_category($data['id'])->row();
        $this->load->view('edit_category', $data);
    }

    function form_edit_kuliah($id) {
        $data['id'] = $id;
        $data['course'] = $this->model_course->select_one_course($data['id'])->row();
        $this->load->view('edit_course', $data);
    }

    function topic_update($id) {
        $data['id'] = $id;
        $data['topic'] = $this->input->post('topic', true);
        $data['status'] = $this->input->post('status', true);
        $this->model_course->update_topic($data['id'], $data['topic'], $data['status']);
    }

    function faculty_update($id) {
        $data['id'] = $id;
        $data['faculty'] = $this->input->post('faculty', true);
        $data['singkatan'] = $this->input->post('singkatan', true);
        $this->model_course->update_faculty($data['id'], $data['faculty'], $data['singkatan']);
    }

    function category_update($id) {
        $data['id'] = $id;
        $data['category'] = $this->input->post('category', true);
        $this->model_course->update_category($data['id'], $data['category']);
    }

    function kuliah_update($id) {
        $data['id'] = $id;
        $data['kuliah'] = $this->input->post('kuliah', true);
        $data['deskripsi'] = $this->input->post('deskripsi', true);
        $data['intkuliah'] = $this->input->post('intkuliah', true);
        $data['pemdasar'] = $this->input->post('pemdasar', true);
        $data['dipelajari'] = $this->input->post('dipelajari', true);
        $this->model_course->update_kuliah($data['id'], $data['kuliah'], $data['deskripsi'], $data['intkuliah'], $data['pemdasar'], $data['dipelajari']);
    }

    function delete_topic($id) {
        $data['id'] = $id;
        $this->model_course->topic_delete($data['id']);
    }

    function delete_faculty($id) {
        $data['id'] = $id;
        $this->model_course->faculty_delete($data['id']);
    }

    function delete_category($id) {
        $data['id'] = $id;
        $this->model_course->category_delete($data['id']);
    }

    function delete_kuliah($id) {
        $data['id'] = $id;
        $this->model_course->course_delete($data['id']);
    }

    function course_silabus($id) {
        $data['id'] = $id;
        $data['silabus_parent'] = $this->model_course->course_silabus_parent($data['id'])->result();
        $this->load->view('add_course_silabus', $data);
    }

    function course_silabus_add() {
        $data['course_id'] = $this->input->post('course_id', true);
        $data['parent_id'] = $this->input->post('silabus_id', true);
        $data['deskripsi'] = $this->input->post('deskripsi', true);
        $user = $this->ion_auth->user()->row();
        $data['creator'] = $user->username;
        $data['user_id'] = $user->id;
        $this->model_course->insert_course_silabus($data);
    }

    function check_child($id_silabus, $id) {
        $data['id_silabus'] = $id_silabus;
        $data['id'] = $id;
        $data['silabus_anak'] = $this->model_course->course_silabus_child($data['id_silabus'])->result();
        $this->load->view('table_child', $data);
    }

    function show_child($id_silabus, $id) {
        $data['id_silabus'] = $id_silabus;
        $data['id'] = $id;
        $data['silabus_anak'] = $this->model_course->course_silabus_child($data['id_silabus'])->result();
        $this->load->view('show_sub_silabus', $data);
    }

    function delete_silabus($id_silabus) {
        $data['id'] = $id_silabus;
        $data['course'] = $this->model_course->cek_silabus($data['id'])->row();
        if ($data['course']->parent_id == 0) {
            $this->model_course->delete_silabus_parent_id($id_silabus);
            $this->model_course->delete_silabus_id_silabus($id_silabus);
        } else {
            $this->model_course->delete_silabus($id_silabus);
        }
    }

    function silabus_edit($id_silabus, $id) {
        $data['id_silabus'] = $id_silabus;
        $data['id'] = $id;
        $data['select'] = $this->model_course->cek_silabus($data['id_silabus'])->row();
        $this->load->view('form_edit_silabus', $data);
    }

    function update_silabus($id) {
        $data['id'] = $id;
        $data['deskripsi'] = $this->input->post('deskripsi', true);
        $this->model_course->update_deskripsi_silabus($data['id'], $data['deskripsi']);
    }

    function delete_course_faculty($id_faculty, $id_course) {
        $this->model_course->delete_faculty_course($id_course, $id_faculty);
    }

    function delete_course_topic($id_topic, $id_course) {
        $this->model_course->delete_topic_course($id_course, $id_topic);
    }

    function edit_course($id_course) {
        $data['course'] = $this->model_course->select_course_by_id($id_course)->row();
        $this->load->view('course/form_edit_course', $data);
    }

    function list_content_by_sylabus($silabus_id) {
        $data['content'] = $this->model_course->select_content_by_sylabus($silabus_id)->result();
        $this->load->view('course/table_content_viewer', $data);
    }

    /*
     * Menu
     */

    function menu_topic() {
        $data['content'] = $this->model_course->select_topic_for_navbar()->result();
        $this->load->view('course/topic_list', $data);
    }

    function menu_faculty() {
        $data['content'] = $this->model_course->select_faculty()->result();
        $this->load->view('course/faculty_list', $data);
    }

    function menu_bimbel() {
        $data['content'] = $this->model_course->select_bimbel_for_navbar()->result();
        $this->load->view('course/bimbel_list', $data);
    }

    /*
     * List Course By Menu
     */

    function knowledge_by_faculty($faculty_id) {
        $data['course'] = $this->model_course->select_course_by_faculty($faculty_id)->result();
        $data['total_course'] = count($data['course']);
        $data['video'] = $this->model_course->select_content_by_faculty($faculty_id, array(0))->result();
        $data['total_video'] = count($data['video']);
        $data['youtube'] = $this->model_course->select_content_by_faculty($faculty_id, array(2))->result();
        $data['total_youtube'] = count($data['youtube']);
        $data['vimeo'] = $this->model_course->select_content_by_faculty($faculty_id, array(3))->result();
        $data['total_vimeo'] = count($data['vimeo']);
        $this->load->view('course/knowledge_list', $data);
    }

    function knowledge_by_topic($topic_id) {
        $data['course'] = $this->model_course->select_course_by_topic($topic_id)->result();
        $data['total_course'] = count($data['course']);
        $data['video'] = $this->model_course->select_content_by_topic($topic_id, array(0))->result();
        $data['total_video'] = count($data['video']);
        $data['youtube'] = $this->model_course->select_content_by_topic($topic_id, array(2))->result();
        $data['total_youtube'] = count($data['youtube']);
        $data['vimeo'] = $this->model_course->select_content_by_topic($topic_id, array(3))->result();
        $data['total_vimeo'] = count($data['vimeo']);
        $this->load->view('course/knowledge_list', $data);
    }

}
