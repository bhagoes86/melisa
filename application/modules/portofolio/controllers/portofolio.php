<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portofolio extends MX_Controller {

    function __construct() {
        parent::__construct();
        //preload
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('model_portofolio', '', true);
        $this->load->helper('text');
        $this->load->helper(array('url', 'form'));
    }

    function user() {
        //ambil id user login
        $user = $this->ion_auth->user()->row();
        //
        //get id
        $data['profic'] = $this->model_portofolio->select_profic_user($user->id)->row();
        $data['user'] = $user;
        if ($this->model_portofolio->select_metadata($user->id, 1)->row() == NULL) {
            $this->model_portofolio->insert_usermeta($user->id, 1);
            $data['profil'] = $this->model_portofolio->select_metadata($user->id, 1)->row();
        } else {
            $data['profil'] = $this->model_portofolio->select_metadata($user->id, 1)->row();
        }
        if ($this->model_portofolio->select_metadata($user->id, 2)->row() == NULL) {
            $this->model_portofolio->insert_usermeta($user->id, 2);
            $data['pengajaran'] = $this->model_portofolio->select_metadata($user->id, 2)->row();
        }else{
            $data['pengajaran'] = $this->model_portofolio->select_metadata($user->id, 2)->row();
        }
        if ($this->model_portofolio->select_metadata($user->id, 3)->row() == NULL) {
            $this->model_portofolio->insert_usermeta($user->id, 3);
            $data['riset'] = $this->model_portofolio->select_metadata($user->id, 3)->row();
        }else{
            $data['riset'] = $this->model_portofolio->select_metadata($user->id, 3)->row();
        }
        if ($this->model_portofolio->select_metadata($user->id, 4)->row() == NULL) {
            $this->model_portofolio->insert_usermeta($user->id, 4);
            $data['publikasi'] = $this->model_portofolio->select_metadata($user->id, 4)->row();
        }else{
            $data['publikasi'] = $this->model_portofolio->select_metadata($user->id, 4)->row();
        }
        if ($this->model_portofolio->select_metadata($user->id, 5)->row() == NULL) {
            $this->model_portofolio->insert_usermeta($user->id, 5);
            $data['pengalaman'] = $this->model_portofolio->select_metadata($user->id, 5)->row();
        }else{
            $data['pengalaman'] = $this->model_portofolio->select_metadata($user->id, 5)->row();
        }
        if ($this->model_portofolio->select_metadata($user->id, 6)->row() == NULL) {
            $this->model_portofolio->insert_usermeta($user->id, 6);
            $data['pendidikan'] = $this->model_portofolio->select_metadata($user->id, 6)->row();
        }else{
            $data['pendidikan'] = $this->model_portofolio->select_metadata($user->id, 6)->row();
        }
        
        //print_r($data['profic']);
        //print_r($data['user']);
        //print_r($data['publikasi']);
        //print_r($data);
        $this->load->view('portofolio/profil', $data);
    }

    //fungsi untuk meredirect ke portofolio
    function edit_portofolio() {
        $user = $this->ion_auth->user()->row();
        $data['profil'] = $this->model_portofolio->select_metadata($user->id, 1)->row();
        $data['pengajaran'] = $this->model_portofolio->select_metadata($user->id, 2)->row();
        $data['riset'] = $this->model_portofolio->select_metadata($user->id, 3)->row();
        $data['publikasi'] = $this->model_portofolio->select_metadata($user->id, 4)->row();
        $data['pengalaman'] = $this->model_portofolio->select_metadata($user->id, 5)->row();
        $data['pendidikan'] = $this->model_portofolio->select_metadata($user->id, 6)->row();

        $this->load->view('portofolio/form_edit', $data);
    }

    //fungsi untuk menangkap data edit dari form_edit
    function edit_save() {
        $user = $this->ion_auth->user()->row();
        $data['profil'] = $this->input->post('profil', true);
        $data['pengajaran'] = $this->input->post('pengajaran', true);
        $data['riset'] = $this->input->post('riset', true);
        $data['publikasi'] = $this->input->post('publikasi', true);
        $data['pengalaman'] = $this->input->post('pengalaman', true);
        $data['pendidikan'] = $this->input->post('pendidikan', true);

        //print_r($data['profil']);

        $this->model_portofolio->update_data_portofolio($user->id, 1, $data['profil']);
        $this->model_portofolio->update_data_portofolio($user->id, 2, $data['pengajaran']);
        $this->model_portofolio->update_data_portofolio($user->id, 3, $data['riset']);
        $this->model_portofolio->update_data_portofolio($user->id, 4, $data['publikasi']);
        $this->model_portofolio->update_data_portofolio($user->id, 5, $data['pengalaman']);
        $this->model_portofolio->update_data_portofolio($user->id, 6, $data['pendidikan']);
        //redirect('portofolio/user');
    }

    //fungsi upload dan update foto
    function form_upload_picture() {
        $user = $this->ion_auth->user()->row();
        $this->load->view('portofolio/form_update_foto', $user);
    }

    //fungsi save fote
    public function upload_profic() {
        $user = $this->ion_auth->user()->row();
        $config['upload_path'] = './resource/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG';
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
            $this->model_portofolio->update_profic($user->id, $data['picture']);
            echo "{";
            echo "msg: 1";
            echo "}";
        }
    }

    function view_profil($id) {
        $data['profil'] = $this->model_portofolio->select_metadata($id, 1)->row();
        $data['pengajaran'] = $this->model_portofolio->select_metadata($id, 2)->row();
        $data['riset'] = $this->model_portofolio->select_metadata($id, 3)->row();
        $data['publikasi'] = $this->model_portofolio->select_metadata($id, 4)->row();
        $data['pengalaman'] = $this->model_portofolio->select_metadata($id, 5)->row();
        $data['pendidikan'] = $this->model_portofolio->select_metadata($id, 6)->row();
        $data['profic'] = $this->model_portofolio->select_profic_user($id)->row();
        $this->load->view('portofolio/profil_user', $data);
    }

}
