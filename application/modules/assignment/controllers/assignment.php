<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assignment extends MX_Controller {

    // inisiasi untuk meload library, helper, dan database
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('directory');
        $this->load->helper('text');
        $this->load->helper('file');
        $this->load->model('model_assignment', '', true);
    }

    // fungsi utama yang dipanggil untuk mulai mengelola kuis
    function index() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $temp_list_assignment = $this->load->model_assignment->select_all_assignment($user->id)->result();
            
            $temp_array = array();
            $i = 0;
            foreach ($temp_list_assignment as $assignment){
                $temp_array[$i] = $assignment;
                $temp_course = $this->load->model_assignment->select_course_by_assignment_id($user->id, $assignment->id_assignment)->row();
                if ($temp_course!=null){
                    $temp_array[$i]->course =  $temp_course->course;
                }
                else {
                    $temp_array[$i]->course =  null;
                    
                }
                $temp_group = $this->load->model_assignment->select_group_by_assignment($assignment->id_assignment)->result();
                $temp_array[$i]->list_group = $temp_group;
                $i++;
            }
            
            /*
            echo "<pre>";
            print_r($temp_array);
            echo "</pre>";
            */
            
            $data['list_assignment'] = $temp_list_assignment;
            $this->load->view('assignment/list_assignment', $data);
             
        }
    }

    function add_assignment(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['deleted'] = 0; 
            $data['status'] = 1; 
            $today = getdate();
            $temp_time = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':'. $today['seconds']);

            $data['start_time'] = date_format($temp_time, 'Y-m-d H:i:s');
            $data['end_time'] = date_format($temp_time, 'Y-m-d H:i:s');
            $id_assignment = $this->model_assignment->insert_assignment($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'zip|rar|pdf|ZIP|RAR|PDF';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            $config['file_name'] = 'assignment_file_' . $id_assignment; //berkas dikirim kemudian diganti namanya

            $this->load->library('upload', $config); //panggil librari upload
            $this->upload->overwrite = true;
            if (!$this->upload->do_upload()) {//kondisi upload gagal
                $error = array('error' => $this->upload->display_errors());
                echo "{";
                echo "msg: '" . $error['error'] . "'";
                echo "}";
            } else {//kondisi berhasil
                $hasil = $this->upload->data();
                $data2['file_assignment'] = $hasil['file_name'];
                $data2['size'] = $hasil['file_size'];
                $data2['ext'] = $hasil['file_ext'];
                $this->model_assignment->update_assignment($id_assignment, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }
    
    function show_form_add_assignment(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('assignment/form_add_assignment');
        }
    }
    
    function show_form_edit_assignment($id_assignment){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $arr_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

            $temp = $this->model_assignment->select_assignment_by_id($id_assignment)->row();
            $data['id_assignment'] = $id_assignment;
            $data['title'] = $temp->title;
            $data['description'] = $temp->description;
            $data['start_time'] = $temp->start_time;
            $data['end_time'] = $temp->end_time;
            $data['arr_bulan'] = $arr_bulan;
            
            $this->load->view('assignment/form_edit_assignment', $data);
        }
    }
    
    function update_assignment(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_assignment = $this->input->post('id_assignment', true);

            $hari1 = $this->input->post('hari1', true);
            $bulan1 = $this->input->post('bulan1', true);
            $tahun1 = $this->input->post('tahun1', true);
            $jam1 = $this->input->post('jam1', true);
            $menit1 = $this->input->post('menit1', true);
            $date1 = date_create($tahun1 . '-' . $bulan1 . '-' . $hari1 . " " . $jam1 . ":" . $menit1 . ":00");
            $tanggal1 = date_format($date1, 'Y-m-d H:i:s');
            
            $hari2 = $this->input->post('hari2', true);
            $bulan2 = $this->input->post('bulan2', true);
            $tahun2 = $this->input->post('tahun2', true);
            $jam2 = $this->input->post('jam2', true);
            $menit2 = $this->input->post('menit2', true);
            $date2 = date_create($tahun2 . '-' . $bulan2 . '-' . $hari2 . " " . $jam2 . ":" . $menit2 . ":00");
            $tanggal2 = date_format($date2, 'Y-m-d H:i:s');
            
            if ($date1 > $date2) {
                echo "{";
                echo "\"msg\": \"2\"";
                echo "}";
            }
            else if ($date1 < $date2){
                
                $data['title'] = $this->input->post('title', true);
                $data['description'] = $this->input->post('description', true);
                $data['start_time'] = $tanggal1;
                $data['end_time'] = $tanggal2;
                

                $this->model_assignment->update_assignment($id_assignment, $data);

                echo "{";
                echo "\"msg\": \"1\"";
                echo "}";
            }
            else if ($date1 == $date2){
                $data['title'] = $this->input->post('title', true);
                $data['description'] = $this->input->post('description', true);
                $data['start_time'] = $tanggal1;
                $data['end_time'] = $tanggal2;
                
                $this->model_assignment->update_assignment($id_assignment, $data);

                echo "{";
                echo "\"msg\": \"1\"";
                echo "}";
            }
            
        }
    }
    
    function delete_assignment($id_assignment){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            
            $data['deleted'] = 1;
            $this->load->model_assignment->update_assignment($id_assignment, $data);
        }
    }
    
    function list_assignment_result(){
    }

    function print_assignment_result_pdf(){
    }
    
    function print_assignment_result_excel(){
    }
    
    function add_group(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['assignment_id'] = $this->input->post('id_assignment', true);
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['status'] = 1;
            $data['deleted'] = 0;
            $today = getdate();
            $temp_time = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday']);
            $data['date_created'] = date_format($temp_time, 'Y-m-d');

            $this->model_assignment->insert_group($data);
        }
    }
    
    function show_form_add_group($id_assignment){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['assignment_id'] = $id_assignment;
            $this->load->view('assignment/form_add_group', $data);
        }
    }
    
    function update_group(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_group = $this->input->post('id_group', true);
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['status'] = $this->input->post('status', true);
            $data['password'] = $this->input->post('password', true);

            $this->model_assignment->update_group($id_group, $data);
        }
    }
    
    function show_form_edit_group($id_group){ 
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->model_assignment->select_group_by_id($id_group)->row();
            
            $data['assignment_id'] = $temp->assignment_id;
            $data['group_id'] = $temp->id_group;

            $data['title'] = $temp->title;
            $data['description'] = $temp->description;
            $data['status'] = $temp->status;
            $data['password'] = $temp->password;
            
            $this->load->view('assignment/form_edit_group', $data);
        }
    }
    
    function list_group($id_assignment){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['list_group'] = $this->model_assignment->select_group_by_assignment($id_assignment)->result();
            $data['assignment_id'] = $id_assignment;
            $this->load->view('assignment/list_group', $data);
        }
    }
    
    function delete_group($id_group){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['deleted'] = 1;
            $this->load->model_assignment->update_group($id_group, $data);
        }
    }
    
    function add_course(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $assignment_id = $this->input->post('assignment_id', true);
            $data['course_id'] = $this->input->post('course', true);


            $temp_check_course = $this->model_assignment->check_course_by_assignment_id($data['course_id'], $assignment_id)->row();
            $total = count($temp_check_course);
            if ($total > 0) {
                echo '1'; //sudah
            } else {
                echo '2'; //belum
                $this->model_assignment->update_assignment($assignment_id, $data);
            }
        }
    }
    
    
    function list_course($assignment_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['list_course'] = $this->model_assignment->select_all_course($user->id)->result();
            $data['list_course_chosen'] = $this->model_assignment->select_course_by_assignment_id($user->id, $assignment_id)->result();
            $data['assignment_id'] = $assignment_id;
            
            $this->load->view('assignment/list_course', $data);
        }
    }
    
    function delete_course($id_assignment){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['course_id'] = 0;
            $this->load->model_assignment->update_assignment($id_assignment, $data);
            //$this->load->model_quiz->delete_course($id_course);
        }
    }
    
    function show_form_submit_assignment_student($id_course, $id_assignment, $id_group){
        
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['id_course'] = $id_course;
            $data['id_assignment'] = $id_assignment;
            $data['id_group'] = $id_group;

            $data['assignment_item'] = $this->load->model_assignment->select_assignment_by_course_group($id_course, $id_assignment, $id_group)->row();

            $this->load->view('assignment/form_submit_assignment_student', $data);
        }
    }
    
    function show_form_upload_assignment($id_assignment, $id_group, $id_course){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['id_course'] = $id_course;
            $data['id_assignment'] = $id_assignment;
            $data['id_group'] = $id_group;

            
            $this->load->view('assignment/form_upload_assignment_student', $data);
        }
    }
    
    function submit_assignment_student(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['description'] = $this->input->post('description', true);
            $data['deleted'] = 0; 
            $data['status'] = 1; 
            $data['course_id'] = $this->input->post('id_course', true);
            $data['assignment_id'] = $this->input->post('id_assignment', true);
            $data['group_id'] =  $this->input->post('id_group', true);

            $today = getdate();
            $temp_time = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':'. $today['seconds']);

            $data['date_created'] = date_format($temp_time, 'Y-m-d H:i:s');
            $id_assignment = $this->model_assignment->insert_assignment_student($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'zip|rar|pdf|ZIP|RAR|PDF';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            //$config['file_name'] = 'assignment_file_student_' . $id_assignment; //berkas dikirim kemudian diganti namanya

            $this->load->library('upload', $config); //panggil librari upload
            $this->upload->overwrite = true;
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
                $this->model_assignment->update_assignment_student($id_assignment, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }
    
    function success_upload_assignment(){
        echo "<h2>Upload tugas berhasil</h2>";
    }
    
    function check_submit_assignment(){
         if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $id_course = $this->input->post('id_course', true);
            $id_assignment = $this->input->post('id_assignment', true);
            $id_group = $this->input->post('id_group', true);
            $password = $this->input->post('password', true);
            
            $temp_group = $this->load->model_assignment->select_group_by_id($id_group)->row();
            
            if ($temp_group->password == $password){
                echo "{";
                echo "\"msg\": \"1\"";
                echo "}";
            }
            else if ($temp_group->password != $password){
                echo "{";
                echo "\"msg\": \"0\"";
                echo "}";
            }
        }
    }
    
    function give_score($course_id, $assignment_id, $group_id){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            
            $temp_result = $this->load->model_assignment->select_assignment_submited_by_cag($user->id, $course_id, $assignment_id, $group_id)->result();
            $data['list_assignment_result'] = $temp_result;
            $data['assignment_id'] = $assignment_id;
            $this->load->view('assignment/assignment_score', $data);
        }
    }
    
    function show_form_edit_result($assignment_student_id){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->model_assignment->select_assignment_result_by_id($assignment_student_id)->row();
            
            $data['assignment_student_id'] = $assignment_student_id;
            $data['course_id'] = $temp->course_id;
            $data['assignment_id'] = $temp->assignment_id;
            $data['group_id'] = $temp->group_id;
            $data['course_title'] = $temp->course;
            $data['group_title'] = $temp->group_title;
            $data['assignment_title'] = $temp->assignment_title;
            $data['user'] = $temp->username;
            $data['file'] = $temp->file;
            $data['description'] = $temp->description;
            $data['feedback'] = $temp->feedback;
            $data['score'] = $temp->score;
            
            $this->load->view('assignment/form_edit_score', $data);
        }
    }
    
    function update_result(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            
            $id_assignment_student = $this->input->post('assignment_student_id', true);
            $data['feedback'] = $this->input->post('feedback', true);
            $data['score'] = $this->input->post('score', true);
            
            $this->model_assignment->update_assignment_student($id_assignment_student, $data);
            
        }
    }
    
    
    function show_my_assignment_result(){
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $temp = $this->model_assignment->select_assignment_result_by_user($user->id)->result();
            
            echo "<pre>";
            print_r($temp);
            echo "</pre>";
        }
    }
}
