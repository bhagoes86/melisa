<?php

/*
 * Modul Authz
 * Maintainer : Taufik Sulaeman P
 * Email : taufiksu@gmail.com 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authz extends MX_Controller {

    function __construct() {
        parent::__construct();
        //preload
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->helper('text');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->load->model('model_authz', '', true);
    }

    function index() {
        die();
    }

    function login() {
        $this->load->view('login_form');
    }

    function do_login() {
        /* bila sudah login */
        if ($this->ion_auth->logged_in()) {
            /* tidak perlu lagi mengakses halaman form login */
            redirect('/');
        } else {
            /*
             * buat validasi input form login
             * validasi username wajib diisi dan bersih dari cross site scripting
             */
            $this->form_validation->set_rules('username', 'Username', 'required');
            /* validasi password wajib diisikasir1 */
            $this->form_validation->set_rules('password', 'Password', 'required');
            /* apabila validasi benar */
            if ($this->form_validation->run() == true) {
                /* cek apakah "remember me" dicentang */
                $remember = (bool) $this->input->post('remember');
                /* cek pada database, bila kombinasi username dan password benar */
                if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember)) {
                    /* set pesan berhasil login pada session flashdata */
                    $main['message'] = $this->session->set_flashdata('message', $this->ion_auth->messages());
                    /* redirect ke halaman beranda untuk dirouting sesuai rolenya */
                    //$user = $this->ion_auth->get_user_by_identity($this->input->post('username'));
                    /*
                     * kalo berhasil
                     */
                    echo '1';
                } else {
                    /*
                     * apabila login gagal
                     * set pesan error login pada session flashdata 
                     */
                    $main['message'] = 'Kombinasi username dan password salah';
                    /* redirect kembali ke halaman login */
                    echo '2';
                }
            } else {
                /*
                 * apabila validasi form login salah atau belum diisi
                 * set flashdata untuk kesalahan input atau untuk pesan error sebelumnya
                 */
                $main['message'] = (validation_errors()) ? $this->session->set_flashdata('message', '<div class="error">' . validation_errors() . '</div>') : '';
                echo '3';
            }
        }
    }

    function logout() {
        $this->ion_auth->logout();
        redirect('');
    }

    function error_login() {
        $this->load->view('login_form_error');
    }

    function registrasi() {
        //$data['profil'] = $this->input->post('profil', true);
        //$data['fullname']=$this->input->post('fullname',true);
        //$data['gender']=$this->input->post('gender',true);
        //print_r($data['gender']);
        $this->form_validation->set_rules('emails', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('fullname', 'Sure Name', 'required|xss_clean');
        $this->form_validation->set_rules('passwords', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');
        //$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
        /* apabila validasi benar */
        if ($this->form_validation->run() == true) {
            /*
             * Field utama untuk autentikasi adalah username, email dan password, disimpan di table users
             * selain ketiga itu dikelompokkan ke additional data dan disimpan di table meta
             * post nilai untuk username, email dan password
             */

            //print_r($user);
            $name = $this->input->post('fullname', true);
            $email = $this->input->post('emails', true);
            $password = $this->input->post('passwords', true);
            $gender = $this->input->post('gender', true);
            /* ini data tambahan untuk profil user */
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($name, $password, $email, $gender)) {
            /* apabila proses registrasi berhasil */
            echo"1";
        } else {
            /* apabila proses registrasi gagal */
            $message = (validation_errors()) ? validation_errors() : $this->ion_auth->errors();
            echo"2";
        }
    }

    function lupa_password() {
        $main['page'] = 'dashboard';
        $main['message'] = '';
        $main['sidemenu'] = 'overview';
        //$data['emails']= $this->input->post('emails',true);
        //print_r($data['emails']);
        /* set validasi untuk email */
        $this->form_validation->set_rules('emails', 'Alamat Email', 'required|valid_email');
        /* apabila validasi salah atau form dibuka pertama kali */
        if ($this->form_validation->run() == false) {
            $main['emails'] = array('name' => 'emails',
                'id' => 'emails',
                'type' => 'text'
            );
            echo 'Use Email Adress!';
            //$data = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //$redirect('', $main);
        } else {
            /*
             * apabila validasi benar
             * jalankan fungsi forgotten_password() untuk mengirimkan link reset password melalui email
             */
            $forgotten = $this->ion_auth->forgotten_password($this->input->post('emails'));
            /* apabila tidak ada error */
            //print_r($forgotten);
            if ($forgotten) {
                /* set message dari library ke flashdata */
                echo $this->ion_auth->messages();
                //$data = $this->session->set_flashdata('message', '<div class="message info" style="text-align:center;height:38px;">' . $this->ion_auth->messages() . '</div>');
                //redirect('', $main);
            } else {
                /*
                 * apabila ada error pada saat menjalankan forgotten_password()
                 * set pesan error dari library ke flashdata 
                 */
                echo $this->ion_auth->errors();
                //$data = $this->session->set_flashdata('message', '<div class="message error" style="text-align:center;height:38px;">' . $this->ion_auth->errors() . '</div>');
                //redirect('', $main);
            }
        }
    }

    function save_data() {
        //$data['profil'] = $this->input->post('profil', true);
        $data['fullname'] = $this->input->post('fullname', true);
        //print_r($data['fullname']);
        //echo("sadasdsada");
    }

    function test() {
        $this->load->library('email');
        $config['protocol'] = 'mail';
        $this->email->initialize($config);
        $this->email->from('sakola.net@gmail.com', 'Taufik Sulaiman');
        $this->email->to('jimho.obing@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        echo $this->email->print_debugger();
    }

    function success() {
        //$this->load->view('notification');
        echo ("<h4>Berhasil</h4>");
    }

    function register() {
        $this->load->view('register_form');
    }

    function forget_password() {
        $this->load->view('forgot_password');
    }

    function do_register() {
        
    }

    function all_user() {
        $data['user'] = $this->model_authz->select_all()->result();
        //print_r($data['user']);
        $this->load->view('list_all_user', $data);
    }

    function edit_user($id) {
        //print_r($id);
        $data['id'] = $id;
        $data['user'] = $this->model_authz->select_one($data['id'])->row();
        //print_r($data['user']);
        $this->load->view('form_edit_user', $data);
    }

    function edit_user_db($id) {
        $data1['id'] = $id;
        $data['username'] = $this->input->post('username', true);
        $data['password'] = $this->input->post('password', true);

        $data['email'] = $this->input->post('email', true);
        $this->ion_auth->update($data1['id'], $data);
        //print_r($test);
        //$this->model_authz->update_user($data['id'], $data['username'],$str, $data['email']);
    }

    function delete_user($id) {
        $this->model_authz->delete_user_db($id);
    }

    function update_active($id, $status) {
        //print_r($status);
        //print_r($id);
        $this->model_authz->update_active($id, $status);
    }

    function get_username($id) {
        $user = $this->model_authz->select_one($id)->row();
        echo $user->username;
    }

    function get_profic($id) {
        $user = $this->model_authz->select_one($id)->row();
        echo $user->profic;
    }

}