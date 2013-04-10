<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quiz extends MX_Controller {

    // inisiasi untuk meload library, helper, dan database
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('directory');
        $this->load->helper('text');
        $this->load->helper('file');
        //$this->load->library('excel_reader2');
        $this->load->model('model_quiz', '', true);
    }

    // fungsi utama yang dipanggil untuk mulai mengelola kuis
    function index() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            // mengambil data kuis
            $data['list_quiz'] = $this->model_quiz->select_all_quiz($user->id)->result();
            $data['list_avail_quiz'] = $this->model_quiz->count_avail_quiz($user->id)->result();
            $this->load->view('quiz/list_quiz', $data);
        }
    }

    /* --- VIEW   ---- */

    function check_tryout_password($group_id) {
        $check_pass_tryout = count($this->model_quiz->select_pass_tryout_by_group($group_id)->result());
        if ($check_pass_tryout != 0) {
            echo "Anda sudah memiliki kumpulan password untuk tryout  <br /><br />";
        } else {
            echo "Anda belum memiliki kumpulan password untuk tryout. Tekan tombol Generate untuk menghasilkan kumpulan password tryout <br /><br />";
        }
    }

    function store_tryout_password($course_id, $quiz_id, $group_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {

            $user = $this->ion_auth->user()->row();


            // check dulu datanya ada apa enggak
            $check_pass_tryout = count($this->model_quiz->select_pass_tryout_by_group($group_id)->result());

            // check group dengan kuliah yang terkait
            $temp_cg = $this->model_quiz->select_course_by_group_id($group_id)->result();

            $check_course_group = count($temp_cg);


            if ($check_pass_tryout != 0) {
                $this->model_quiz->delete_quiz_pass_tryout_by_group($group_id);
            }


            if ($check_course_group != 0) {


                $angka = $group_id;
                $angka.= 1000;
                $shuffle_angka = str_shuffle($angka);
                $temp = $shuffle_angka;
                $temp = "";

                $start_code = 1001;
                $end_code = 1999;

                foreach ($temp_cg as $tcg) {




                    for ($i = $start_code; $i <= $end_code; $i++) {
                        // $id_group
                        $angka = $group_id;
                        $angka.= $i;
                        $shuffle_angka = str_shuffle($angka);
                        if ($temp == $shuffle_angka) {
                            continue;
                        } else {
                            $temp = $shuffle_angka;

                            $chunk_angka = str_split($shuffle_angka, 2);
                            $new_angka = "";
                            foreach ($chunk_angka as $chunks) {
                                if (($chunks >= 65 && $chunks <= 90) || ($chunks >= 97 && $chunks <= 122)) {
                                    $new_angka.= chr($chunks);
                                } else {
                                    $new_angka.= $chunks;
                                }
                            }

                            $data['user_id'] = $user->id;
                            $data['course_id'] = $tcg->course_id;
                            $data['quiz_id'] = $quiz_id;
                            $data['group_id'] = $group_id;
                            $data['password'] = $new_angka;
                            $data['expired'] = 0;

                            $this->model_quiz->insert_quiz_pass_tryout($data);
                        }
                    }

                    $start_code += 1000;
                    $end_code += 1000;
                }
                echo "<h1>Berhasil ....</h1>";
            }
        }
    }

    function show_quiz_help() {

        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/quiz_help');
        }
    }

    function print_ticket_tryout($group_id, $quiz_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            require_once(APPPATH . 'libraries/html2pdf/html2pdf.class.php');

            $user = $this->ion_auth->user()->row();

            // ambil data dari database
            $temp_result = $this->model_quiz->select_pass_tryout($user->id, $group_id, $quiz_id)->result();


            $data['list_ticket'] = $temp_result;
            $data['list_avail_ticket'] = count($data['list_ticket']);
            $data['username'] = $user->username;

            // convert in PDF
            $content = $this->load->view('quiz/list_ticket', $data, true);

            try {
                $html2pdf = new HTML2PDF('P', 'A4', 'en');
                $html2pdf->setDefaultFont('Arial');
                $html2pdf->writeHTML($content);
                $html2pdf->Output("daftar-tiket-" . $user->username . ".pdf");
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit;
            }
        }
    }

    function print_my_quiz_result() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            require_once(APPPATH . 'libraries/html2pdf/html2pdf.class.php');

            $user = $this->ion_auth->user()->row();
            $temp_result = $this->model_quiz->select_quiz_result_by_user($user->id, 1)->result();
            foreach ($temp_result as $result) {
                $result->num_soal = count($this->model_quiz->select_soal_by_quiz($result->quiz_id)->result());
            }
            $data['list_my_quiz_result'] = $temp_result;
            $data['list_avail_my_quiz_result'] = count($data['list_my_quiz_result']);
            $data['username'] = $user->username;
            // convert in PDF
            $content = $this->load->view('quiz/list_my_quiz_result_print', $data, true);
            //echo $content;

            try {
                $html2pdf = new HTML2PDF('P', 'A4', 'en');
                $html2pdf->setDefaultFont('Arial');
                $html2pdf->writeHTML($content);
                $html2pdf->Output("daftar-hasil-kuis-" . $user->username . ".pdf");
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit;
            }
        }
    }

    function print_participant_quiz_result_excel($id_course, $id_quiz, $id_group) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            set_include_path(APPPATH . 'libraries/phpexcel/Classes/');
            include 'PHPExcel/IOFactory.php';

            $user = $this->ion_auth->user()->row();

            $temp_group = $this->model_quiz->select_group_by_id($id_group)->row();
            $temp_quiz = $this->model_quiz->select_quiz_by_id($id_quiz)->row();
            $temp_course = $this->model_quiz->select_course_by_id($id_course)->row();


            $group_title = $temp_group->title;
            $quiz_title = $temp_quiz->title;
            $course_title = $temp_course->course;

            $quiz_soal = $this->model_quiz->select_soal_by_quiz($id_quiz)->result();
            $count_quiz_soal = count($quiz_soal);

            $objPHPExcel = new PHPExcel();

            $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory;
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod);

            $myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'Hasil Ujian');
            $objPHPExcel->addSheet($myWorkSheet, 0);

            $sheetIndex = $objPHPExcel->getIndex($objPHPExcel->getSheetByName('Worksheet'));
            $objPHPExcel->removeSheetByIndex($sheetIndex);

            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'No');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'Nama');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'Mulai');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, 'Selesai');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 1, 'Benar');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, 1, 'Salah');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, 1, 'Kosong');
            if ($count_quiz_soal != 0) {
                for ($i = 1; $i <= $count_quiz_soal; $i++) {
                    $temp_idx_header = $i + 6;
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($temp_idx_header, 1, $i);
                }



                $temp_quiz_result = $this->model_quiz->select_quiz_result_by_course_quiz_group($user->id, $id_course, $id_quiz, $id_group, 1)->result();

                $pos_data = 2;
                $i = 1;

                foreach ($temp_quiz_result as $quiz_res) {
                    //$list_quiz_result[$i] = $quiz_res;
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $pos_data, $i);

                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $pos_data, $quiz_res->username);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $pos_data, $quiz_res->start_time);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $pos_data, $quiz_res->end_time);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $pos_data, $quiz_res->right_answer);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $pos_data, $quiz_res->wrong_answer);

                    $num_soal = count($quiz_soal);
                    $blank_answer = $num_soal - ($quiz_res->right_answer + $quiz_res->wrong_answer);

                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $pos_data, $blank_answer);



                    $temp_quiz_soal = $this->model_quiz->select_soal_by_quiz($quiz_res->quiz_id)->result();

                    //$j = 0;
                    $pos_answer = 7;
                    foreach ($temp_quiz_soal as $qz_soal) {
                        $temp_user_answer = $this->model_quiz->select_user_answer_by_soal($quiz_res->id_result, $qz_soal->id_soal)->row();


                        if ($temp_user_answer != null) {
                            if ($qz_soal->answer == $temp_user_answer->answer) {
                                //$check_answer[$j] = '1';
                                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($pos_answer, $pos_data, '1');
                            } else if ($qz_soal->answer != $temp_user_answer->answer) {
                                //$check_answer[$j] = '2';
                                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($pos_answer, $pos_data, '0');
                            }
                        } else {
                            //$check_answer[$j] = '0';
                            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($pos_answer, $pos_data, 'x');
                        }

                        //$j++;

                        $pos_answer++;
                    }


                    //$list_quiz_result[$i]->check_answer = $check_answer;
                    //unset($check_answer);


                    $i++;
                    $pos_data++;
                }

                // Create a new worksheet called “My Data”
                $myWorkSheet2 = new PHPExcel_Worksheet($objPHPExcel, 'Indeks Soal');
                // Attach the “My Data” worksheet as the first worksheet in the PHPExcel object
                $objPHPExcel->addSheet($myWorkSheet2, 1);

                $objPHPExcel->getSheetByName('Indeks Soal')->setCellValueByColumnAndRow(0, 1, 'No');
                $objPHPExcel->getSheetByName('Indeks Soal')->setCellValueByColumnAndRow(1, 1, 'Soal');


                $pos_soal = 2;
                $idx_soal = 1;
                foreach ($quiz_soal as $soal) {

                    $objPHPExcel->getSheetByName('Indeks Soal')->setCellValueByColumnAndRow(0, $pos_soal, $idx_soal);
                    $objPHPExcel->getSheetByName('Indeks Soal')->setCellValueByColumnAndRow(1, $pos_soal, $soal->soal);

                    $pos_soal++;
                    $idx_soal++;
                }
            }

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="hasil-kuis-' . $course_title . '_' . $quiz_title . '_' . $group_title . '.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('php://output');

            $objPHPExcel->disconnectWorksheets();
            unset($objPHPExcel);
        }
    }

    function print_participant_quiz_result_pdf($id_course, $id_quiz, $id_group) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            require_once(APPPATH . 'libraries/html2pdf/html2pdf.class.php');


            $user = $this->ion_auth->user()->row();

            $temp_group = $this->model_quiz->select_group_by_id($id_group)->row();
            $temp_quiz = $this->model_quiz->select_quiz_by_id($id_quiz)->row();
            $temp_course = $this->model_quiz->select_course_by_id($id_course)->row();

            $group_title = $temp_group->title;
            $quiz_title = $temp_quiz->title;
            $course_title = $temp_course->course;

            $data['course_id'] = $id_course;
            $data['quiz_id'] = $id_quiz;
            $data['group_id'] = $id_group;
            $data['group_title'] = $temp_group->title;
            $data['quiz_title'] = $temp_quiz->title;
            $data['course_title'] = $temp_course->course;

            // ambil ada berapa soal pada kuis ini
            $data['quiz_soal'] = $this->model_quiz->select_soal_by_quiz($id_quiz)->result();

            $temp_quiz_result = $this->model_quiz->select_quiz_result_by_course_quiz_group($user->id, $id_course, $id_quiz, $id_group, 1)->result();
            $list_quiz_result = array();
            $check_answer = array();
            $i = 0;

            foreach ($temp_quiz_result as $quiz_res) {
                $list_quiz_result[$i] = $quiz_res;

                $temp_quiz_soal = $this->model_quiz->select_soal_by_quiz($quiz_res->quiz_id)->result();

                $j = 0;
                foreach ($temp_quiz_soal as $quiz_soal) {
                    $temp_user_answer = $this->model_quiz->select_user_answer_by_soal($quiz_res->id_result, $quiz_soal->id_soal)->row();


                    if ($temp_user_answer != null) {
                        if ($quiz_soal->answer == $temp_user_answer->answer) {
                            $check_answer[$j] = '1';
                        } else if ($quiz_soal->answer != $temp_user_answer->answer) {
                            $check_answer[$j] = '2';
                        }
                    } else {
                        $check_answer[$j] = '0';
                    }


                    $j++;
                }


                $list_quiz_result[$i]->check_answer = $check_answer;

                unset($check_answer);
                $i++;
            }

            $data['list_quiz_result'] = $list_quiz_result;
            $data['list_avail_quiz_result'] = count($data['list_quiz_result']);


            // convert in PDF
            $content = $this->load->view('quiz/manage_list_result_detail_print', $data, true);
            //echo $content;

            try {
                $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(15, 5, 15, 5));
                $html2pdf->setDefaultFont('Arial');
                $html2pdf->writeHTML($content);
                $html2pdf->Output("hasil-kuis-'.$course_title.'_'.$quiz_title.'_'.$group_title.'.pdf");
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit;
            }
        }
    }

    function show_quiz_course($quiz_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['quiz_id'] = $quiz_id;

            $data['list_quiz_course'] = $this->model_quiz->select_course_by_quiz_id($user->id, $quiz_id)->result();
            $data['list_avail_quiz_course_group'] = count($data['list_quiz_course']);
            $this->load->view('quiz/list_quiz_course', $data);
        }
    }

    function show_quiz_course_group($quiz_id, $course_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['quiz_id'] = $quiz_id;
            $data['course_id'] = $course_id;

            $data['list_quiz_course_group'] = $this->model_quiz->select_course_group_by_quiz($user->id, $quiz_id, $course_id)->result();
            $data['list_avail_quiz_course_group'] = count($data['list_quiz_course_group']);
            $this->load->view('quiz/list_quiz_course_group', $data);
        }
    }

    function show_manage_course_result($id_course, $id_quiz, $id_group) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $temp_group = $this->model_quiz->select_group_by_id($id_group)->row();
            $temp_quiz = $this->model_quiz->select_quiz_by_id($id_quiz)->row();
            $temp_course = $this->model_quiz->select_course_by_id($id_course)->row();

            $data['group_title'] = $temp_group->title;
            $data['quiz_title'] = $temp_quiz->title;
            $data['course_title'] = $temp_course->course;
            $data['course_id'] = $id_course;
            $data['quiz_id'] = $id_quiz;
            $data['group_id'] = $id_group;



            $data['list_quiz_result'] = $this->model_quiz->select_quiz_result_by_course_quiz_group($user->id, $id_course, $id_quiz, $id_group, 1)->result();
            $data['list_avail_quiz_result'] = count($data['list_quiz_result']);
            $this->load->view('quiz/manage_list_quiz_result', $data);
        }
    }

    function show_my_quiz_result() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $temp_result = $this->model_quiz->select_quiz_result_by_user($user->id, 1)->result();
            foreach ($temp_result as $result) {
                $result->num_soal = count($this->model_quiz->select_soal_by_quiz($result->quiz_id)->result());
            }
            $data['list_my_quiz_result'] = $temp_result;
            $data['list_avail_my_quiz_result'] = count($data['list_my_quiz_result']);
            $this->load->view('quiz/list_my_quiz_result', $data);
        }
    }

    function show_manage_course_group($id_quiz, $id_course) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['quiz_id'] = $id_quiz;
            $data['course_id'] = $id_course;
            $data['list_group'] = $this->model_quiz->select_group_by_quiz($id_quiz)->result();
            $data['list_avail_quiz_group'] = count($data['list_group']);
            $this->load->view('quiz/manage_list_quiz_group', $data);
        }
    }

    function show_manage_course_quiz($id_course) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['course_id'] = $id_course;
            $data['list_quiz'] = $this->model_quiz->select_quiz_by_course($id_course, $user->id)->result();
            $data['list_avail_quiz_course'] = count($data['list_quiz']);
            $this->load->view('quiz/manage_list_quiz_course', $data);
        }
    }

    function show_manage_result() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['list_course'] = $this->model_quiz->select_all_course($user->id)->result();
            $data['list_avail_course'] = count($data['list_course']);
            $this->load->view('quiz/manage_quiz_result', $data);
        }
    }

    function show_video($content) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['content'] = $content;
            $this->load->view('quiz/viewer_video', $data);
        }
    }

    function show_audio($content) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['content'] = $content;
            $this->load->view('quiz/viewer_audio', $data);
        }
    }

    function show_slideshare($file_url) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $url = $file_url;
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

            $this->load->view('quiz/viewer_slideshare', $data);
        }
    }

    function show_form_upload_quiz_video() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/form_upload_quiz_video');
        }
    }

    function show_form_upload_quiz_document() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/form_upload_quiz_document');
        }
    }

    function show_form_upload_quiz_voice() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/form_upload_quiz_voice');
        }
    }

    function show_form_upload_quiz_picture() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/form_upload_quiz_picture');
        }
    }

    function show_form_quiz_embed_link($type) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['type'] = $type;
            $this->load->view('quiz/form_quiz_embed_link', $data);
        }
    }

    function save_quiz_answer_temp() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $answer = $this->input->post('answer', true);
            $group_id = $this->input->post('group_id', true);
            $quiz_id = $this->input->post('quiz_id', true);
            $tiket_quiz = $this->input->post('tiket_quiz', true);

            $data_quiz['tiket_quiz'] = $tiket_quiz;
            $data_quiz['answer'] = $answer;
            $data_quiz['group_id'] = $group_id;
            $data_quiz['quiz_id'] = $quiz_id;
            $data['data_quiz'] = $data_quiz;

            echo "<pre>";
            print_r($data_quiz);
            echo "</pre>";

            $this->session->set_userdata($data);
        }
    }

    function display_particular_answer($answer_id, $answer_value) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            echo "Anda memilih opsi : " . $answer_id . " -----  " . $answer_value;
        }
    }

    function group_quiz($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['list_group'] = $this->model_quiz->select_group_by_quiz($id_quiz)->result();
            $data['quiz_id'] = $id_quiz;
            $data['list_avail_group'] = $this->model_quiz->count_avail_group()->result();
            $this->load->view('quiz/list_group_quiz', $data);
        }
    }

    function check_quiz_password() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $id_course = $this->input->post('id_course', true);
            $id_quiz = $this->input->post('id_quiz', true);
            $id_group = $this->input->post('id_group', true);
            $password = $this->input->post('password', true);


            $temp = $this->model_quiz->select_group_by_id($id_group)->row();

            // kalau grupnya bertipe 0 (ujian biasa)
            if ($temp->type == 0) {
                if ($password == $temp->password) {
                    echo "{";
                    echo "\"msg\": \"1\"";
                    echo "}";
                } else {
                    echo "{";
                    echo "\"msg\": \"0\"";
                    echo "}";
                }
            }
            // kalau grupnya bertipe 1 (try out)
            else if ($temp->type == 1) {

                // kalau user pernah ikut sebelumnya. maka ga boleh pakai kode lain
                // kalau user belum pernah ikut sama sekali
                $temp2 = $this->model_quiz->select_pass_tryout_by_cqg_pass($id_course, $id_quiz, $id_group, $password)->row();
                if ($temp2 != null) {

                    // kalau participant baru memasukkan kode tryout
                    if ($temp2->participant_user_id == 0) {
                        $data['participant_user_id'] = $user->id;
                        $this->load->model_quiz->update_pass_tryout($temp2->id_quiz_pass_tryout, $data);

                        echo "{";
                        echo "\"msg\": \"1\"";
                        echo "}";
                    }
                    // kalau participant sudah pernah memasukkan kode tryout
                    else if ($temp2->participant_user_id == $user->id) {

                        echo "{";
                        echo "\"msg\": \"1\"";
                        echo "}";
                    }

                    // kalau participant menggunakan kode tryout participant lain
                    else if ($temp2->participant_user_id != $user->id && $temp2->participant_user_id != 0) {

                        echo "{";
                        echo "\"msg\": \"2\"";
                        echo "}";
                    }
                } else {
                    echo "{";
                    echo "\"msg\": \"0\"";
                    echo "}";
                }
            } else {
                echo "<h1>Maaf ada gangguan teknis, hubungi segera administrator :D </h1>";
            }
        }
    }

    function show_add_group($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['quiz_id'] = $id_quiz;
            $this->load->view('quiz/form_add_group_quiz', $data);
        }
    }

    function show_add_resource() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/menu_quiz_resource');
        }
    }

    // menampilkan form tambah kuis
    function show_add_quiz() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->view('quiz/form_add_quiz');
        }
    }

    // menampilkan form tambah soal
    function show_add_soal($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['quiz_id'] = $id_quiz;
            $this->load->view('quiz/form_add_soal', $data);
        }
    }

    // menampilkan form tambah jawaban
    function show_add_choice($id_soal, $id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['soal_id'] = $id_soal;
            $data['quiz_id'] = $id_quiz;
            $this->load->view('quiz/form_add_choice', $data);
        }
    }

    function list_course($quiz_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['list_course'] = $this->model_quiz->select_all_course($user->id)->result();
            $data['list_course_chosen'] = $this->model_quiz->select_course_by_quiz_id($user->id, $quiz_id)->result();

            $data['list_avail_quiz_course'] = count($data['list_course_chosen']);
            $data['quiz_id'] = $quiz_id;
            $this->load->view('quiz/list_course', $data);
        }
    }

    function list_course_group($quiz_id, $group_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['list_course'] = $this->model_quiz->select_course_by_quiz_id($user->id, $quiz_id)->result();
            $data['list_course_chosen'] = $this->model_quiz->select_course_by_group_id($group_id)->result();

            $data['list_avail_quiz_course'] = count($data['list_course_chosen']);
            $data['quiz_id'] = $quiz_id;
            $data['group_id'] = $group_id;

            $this->load->view('quiz/list_course_group', $data);
        }
    }

    function list_all_quiz_resource() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['list_quiz_resource'] = $this->model_quiz->select_all_quiz_resource($user->id)->result();
            $data['list_avail_quiz_resource'] = 2;
            $this->load->view('quiz/list_quiz_resource', $data);
        }
    }

    function list_all_quiz_attachment($id_soal) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['id_soal'] = $id_soal;

            $temp = $this->model_quiz->select_soal_by_id($id_soal)->row();
            $data['resource_id'] = $temp->resource_id;

            $data['list_quiz_resource'] = $this->model_quiz->select_all_quiz_resource($user->id)->result();
            $data['list_avail_quiz_resource'] = 2;
            $this->load->view('quiz/list_quiz_resource_attach', $data);
        }
    }

    // menampilkan daftar soal dari suatu kuis
    function list_all_soal($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['list_soal'] = $this->model_quiz->select_soal_by_quiz($id_quiz)->result();
            $data['quiz_id'] = $id_quiz;
            $data['list_avail_soal'] = $this->model_quiz->count_avail_soal()->result();
            $this->load->view('quiz/list_soal_by_quiz', $data);
        }
    }

    // menampilkan daftar jawaban dari suatu soal
    function list_all_choice($id_soal) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['list_choice'] = $this->model_quiz->select_choice_by_soal($id_soal)->result();
            $temp = $this->model_quiz->select_soal_by_id($id_soal)->row();
            $data['quiz_id'] = $temp->quiz_id;
            $data['soal_id'] = $id_soal;

            $data['list_avail_choice'] = $this->model_quiz->count_avail_choice($id_soal)->result();

            $this->load->view('quiz/list_choice_by_soal', $data);
        }
    }

    // proses menampilkan lembar kuis dan membuat session baru pengerjaan
    function view_form_quiz($id_quiz, $tiket_quiz, $id_group, $course_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $list_soal = array();
            $list_jawaban = array();
            $temp_answer = array();
            $temp_data_quiz = array();
            $temp = $this->model_quiz->select_quiz_by_id($id_quiz)->row();


            if ($this->session->userdata('data_quiz') != '') {
                $temp_data_quiz = $this->session->userdata('data_quiz');
                if (isset($temp_data_quiz['answer'])) {
                    $temp_answer = $temp_data_quiz['answer'];
                    ksort($temp_answer);
                }
            }

            $i = 0;

            // mengambil soal
            $temp_soal = $this->load->model_quiz->select_soal_by_quiz($id_quiz)->result();
            foreach ($temp_soal as $soal) {

                // mengambil jawaban
                $jawaban_benar = $this->load->model_quiz->select_key_choice_by_soal($soal->id_soal, $soal->answer)->row();
                // echo $jawaban_benar->option_text." | ";
                $list_jawaban[] = get_object_vars($jawaban_benar);

                $temp_jawaban = $this->load->model_quiz->select_other_choice_by_soal($jawaban_benar->option_idx, $soal->id_soal, $temp->max_answer_show)->result();
                foreach ($temp_jawaban as $jawaban) {
                    // echo $jawaban->option_text." | ";
                    $list_jawaban[] = get_object_vars($jawaban);
                }

                $temp_resource = $this->load->model_quiz->select_quiz_resource_by_id($soal->resource_id)->row();
                // menyimpan ke dalam array
                sort($list_jawaban);
                $list_soal[$i] = get_object_vars($soal);
                $list_soal[$i]['jawaban'] = $list_jawaban;
                $list_soal[$i]['resource'] = $temp_resource;

                // menyertakan jawaban yang sudah terjawab
                if ($this->session->userdata('data_quiz') != '') {
                    $current_key = current($temp_answer);

                    if ($list_soal[$i]['id_soal'] == key($temp_answer)) {
                        $list_soal[$i]['temp_jawaban'] = $temp_answer[key($temp_answer)];
                        next($temp_answer);
                    } else {
                        $list_soal[$i]['temp_jawaban'] = 'x';
                    }
                }
                // destroy
                $temp_jawaban = "";
                $list_jawaban = "";
                $i++;
            }



            $data['quiz_id'] = $id_quiz;
            $data['user_id'] = $user->id;
            $data['course_id'] = $course_id;
            $data['score'] = 0;
            $data2['group_id'] = $id_group;
            $data2['list_soal'] = $list_soal;

            $data2['quiz_id'] = $id_quiz;
            $data2['user_id'] = $user->id;
            $data2['tiket_quiz'] = $tiket_quiz;
            $data2['random_soal'] = $temp->random_soal;
            $data2['random_jawaban'] = $temp->random_jawaban;
            $data2['num_per_page'] = $temp->num_per_page;

            $this->load->view('form_quiz', $data2);
        }
    }

    function detail_quiz_result($id_course, $id_quiz, $id_group) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $temp_group = $this->model_quiz->select_group_by_id($id_group)->row();
            $temp_quiz = $this->model_quiz->select_quiz_by_id($id_quiz)->row();
            $temp_course = $this->model_quiz->select_course_by_id($id_course)->row();

            $data['course_id'] = $id_course;
            $data['quiz_id'] = $id_quiz;
            $data['group_id'] = $id_group;
            $data['group_title'] = $temp_group->title;
            $data['quiz_title'] = $temp_quiz->title;
            $data['course_title'] = $temp_course->course;
            // ambil ada berapa soal pada kuis ini
            $data['quiz_soal'] = $this->model_quiz->select_soal_by_quiz($id_quiz)->result();
            // ambil jawaban user
            // ambil kunci jawaban

            $temp_quiz_result = $this->model_quiz->select_quiz_result_by_course_quiz_group($user->id, $id_course, $id_quiz, $id_group, 1)->result();
            $list_quiz_result = array();
            $check_answer = array();
            $i = 0;

            foreach ($temp_quiz_result as $quiz_res) {
                $list_quiz_result[$i] = $quiz_res;

                $temp_quiz_soal = $this->model_quiz->select_soal_by_quiz($quiz_res->quiz_id)->result();

                $j = 0;
                foreach ($temp_quiz_soal as $quiz_soal) {
                    $temp_user_answer = $this->model_quiz->select_user_answer_by_soal($quiz_res->id_result, $quiz_soal->id_soal)->row();


                    if ($temp_user_answer != null) {
                        if ($quiz_soal->answer == $temp_user_answer->answer) {
                            $check_answer[$j] = '1';
                        } else if ($quiz_soal->answer != $temp_user_answer->answer) {
                            $check_answer[$j] = '2';
                        }
                    } else {
                        $check_answer[$j] = '0';
                    }


                    $j++;
                }


                $list_quiz_result[$i]->check_answer = $check_answer;

                unset($check_answer);
                $i++;
            }

            $data['list_quiz_result'] = $list_quiz_result;
            $data['list_avail_quiz_result'] = count($data['list_quiz_result']);

            $this->load->view('quiz/manage_list_result_detail', $data);
        }
    }

    function detail_participant_quiz_result($id_result) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $temp_result = $this->model_quiz->select_quiz_result_by_id($id_result)->row();

            $temp_group = $this->model_quiz->select_group_by_id($temp_result->group_id)->row();
            $temp_quiz = $this->model_quiz->select_quiz_by_id($temp_result->quiz_id)->row();
            $temp_course = $this->model_quiz->select_course_by_id($temp_result->course_id)->row();


            $list_soal = array();
            $list_jawaban = array();
            $i = 0;

            // mengambil soal
            $temp_soal = $this->load->model_quiz->select_soal_by_quiz($temp_result->quiz_id)->result();
            foreach ($temp_soal as $soal) {


                // mengambil jawaban
                $temp_jawaban = $this->load->model_quiz->select_choice_by_soal($soal->id_soal)->result();
                foreach ($temp_jawaban as $jawaban) {
                    $list_jawaban[] = get_object_vars($jawaban);
                }

                // mengambil jawaban peserta dari answer_log
                $user_answer = $this->load->model_quiz->select_user_answer_by_soal($id_result, $soal->id_soal)->row();

                // mengambil kunci jawaban
                $kunci_jawaban = $this->load->model_quiz->select_key_choice_by_soal($soal->id_soal, $soal->answer)->row();


                // menyimpan ke dalam array
                $list_soal[$i] = get_object_vars($soal);
                $list_soal[$i]['jawaban'] = $list_jawaban;

                if (count($user_answer) == 0) {
                    $list_soal[$i]['jawaban_user'] = null;
                } else {
                    $list_soal[$i]['jawaban_user'] = $user_answer;
                }

                $list_soal[$i]['kunci_jawaban'] = $kunci_jawaban;

                // destroy
                $temp_jawaban = "";
                $list_jawaban = "";
                $i++;
            }


            $data['list_soal'] = $list_soal;
            $data['quiz_id'] = $temp_result->quiz_id;
            $data['course_id'] = $temp_result->course_id;
            $data['group_id'] = $temp_result->group_id;
            $data['user_id'] = $user->id;
            $data['id_result'] = $id_result;


            $data['group_title'] = $temp_group->title;
            $data['quiz_title'] = $temp_quiz->title;
            $data['course_title'] = $temp_course->course;
            $data['start_time'] = $temp_result->start_time;
            $data['end_time'] = $temp_result->end_time;
            $data['participant'] = $this->model_quiz->select_user_by_id($temp_result->user_id)->row();


            $this->load->view('quiz/manage_detail_quiz_result', $data);
        }
    }

    function detail_my_quiz_result($id_result) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {

            $user = $this->ion_auth->user()->row();

            $temp_result = $this->model_quiz->select_quiz_result_by_id($id_result)->row();

            $temp_group = $this->model_quiz->select_group_by_id($temp_result->group_id)->row();
            $temp_quiz = $this->model_quiz->select_quiz_by_id($temp_result->quiz_id)->row();
            $temp_course = $this->model_quiz->select_course_by_id($temp_result->course_id)->row();


            $list_soal = array();
            $list_jawaban = array();
            $i = 0;

            // mengambil soal
            $temp_soal = $this->load->model_quiz->select_soal_by_quiz($temp_result->quiz_id)->result();
            foreach ($temp_soal as $soal) {


                // mengambil jawaban
                $temp_jawaban = $this->load->model_quiz->select_choice_by_soal($soal->id_soal)->result();
                foreach ($temp_jawaban as $jawaban) {
                    $list_jawaban[] = get_object_vars($jawaban);
                }

                // mengambil jawaban peserta dari answer_log
                $user_answer = $this->load->model_quiz->select_user_answer_by_soal($id_result, $soal->id_soal)->row();

                // mengambil kunci jawaban
                $kunci_jawaban = $this->load->model_quiz->select_key_choice_by_soal($soal->id_soal, $soal->answer)->row();


                // menyimpan ke dalam array
                $list_soal[$i] = get_object_vars($soal);
                $list_soal[$i]['jawaban'] = $list_jawaban;

                if (count($user_answer) == 0) {
                    $list_soal[$i]['jawaban_user'] = null;
                } else {
                    $list_soal[$i]['jawaban_user'] = $user_answer;
                }

                $list_soal[$i]['kunci_jawaban'] = $kunci_jawaban;

                // destroy
                $temp_jawaban = "";
                $list_jawaban = "";
                $i++;
            }


            $data['list_soal'] = $list_soal;
            $data['quiz_id'] = $temp_result->quiz_id;
            $data['user_id'] = $user->id;
            $data['id_result'] = $id_result;


            $data['group_title'] = $temp_group->title;
            $data['quiz_title'] = $temp_quiz->title;
            $data['course_title'] = $temp_course->course;
            $data['start_time'] = $temp_result->start_time;
            $data['end_time'] = $temp_result->end_time;


            $this->load->view('view_my_quiz_result', $data);
        }
    }

    // menampilkan kuis yang telah dibuat
    function preview_quiz($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();


            $list_soal = array();
            $list_jawaban = array();
            $i = 0;

            // mengambil soal
            $temp_soal = $this->load->model_quiz->select_soal_by_quiz($id_quiz)->result();
            foreach ($temp_soal as $soal) {

                // mengambil jawaban
                $temp_jawaban = $this->load->model_quiz->select_choice_by_soal($soal->id_soal)->result();
                foreach ($temp_jawaban as $jawaban) {
                    $list_jawaban[] = get_object_vars($jawaban);
                }

                // menyimpan ke dalam array
                $list_soal[$i] = get_object_vars($soal);
                $list_soal[$i]['jawaban'] = $list_jawaban;

                // destroy
                $temp_jawaban = "";
                $list_jawaban = "";
                $i++;
            }

            $data['quiz_id'] = $id_quiz;
            $data['user_id'] = $user->id;
            $data['course_id'] = 1;
            $data['score'] = 0;

            $data2['list_soal'] = $list_soal;
            $data2['quiz_id'] = $id_quiz;
            $data2['user_id'] = $user->id;
            //$data2['tiket_quiz'] = $this->load->model_quiz->insert_quiz_result($data);
            $this->load->view('view_quiz', $data2);
        }
    }

    // menampilkan tombol submit kuis ketika waktu telah habis
    function quiz_submit_wtro($tiket_quiz, $quiz_id, $group_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['user_id'] = $user->id;
            $data['quiz_id'] = $quiz_id;
            $data['group_id'] = $group_id;
            $data['tiket_quiz'] = $tiket_quiz;

            $this->load->view('quiz/form_end_quiz', $data);
        }
    }

    // menampilkan hasil kuis
    function quiz_result($quiz_id, $user_id, $tiket_quiz, $group_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['count_quiz_soal'] = count($this->load->model_quiz->select_soal_by_quiz($quiz_id)->result());
            $data['result'] = $this->load->model_quiz->select_quiz_result_by_quiz_user_group_id($quiz_id, $user_id, $group_id, $tiket_quiz)->row();
            $this->load->view('quiz/view_quiz_result', $data);
        }
    }

    // menampilkan daftar kuis yang aktif untuk dikerjakan
    function list_avail_quiz() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            // mengambil data kuis
            $data['list_quiz'] = $this->model_quiz->select_avail_quiz()->result();
            $this->load->view('quiz/view_avail_quiz', $data);
        }
    }

    // menampilkan halaman pengecekan kuis jika memakai kode masuk
    function gate_avail_quiz($id_group, $id_course) {

        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $temp_group = $this->model_quiz->select_group_by_id($id_group)->row();
            $data['check_course_quiz_group_avail'] = count($temp_group);

            if ($data['check_course_quiz_group_avail'] != 0) {
                // mengambil data kuis berdasarkan group
                $temp = $this->model_quiz->select_quiz_by_id($temp_group->quiz_id)->row();
                $data['id_group'] = $id_group;
                $data['id_quiz'] = $temp_group->quiz_id;
                $data['title'] = $temp->title;
                $data['description'] = $temp->description;
                $data['length_time'] = $temp->length_time;
                $data['password'] = $temp_group->password;
                $data['start_time'] = $temp->start_time;
                $data['end_time'] = $temp->end_time;
                $data['course_id'] = $id_course;

                $temp2 = $this->model_quiz->check_quiz_result_by_cqg_user($user->id, $id_course, $temp_group->quiz_id, $id_group)->row();
                $data['has_participated'] = count($temp2);
            }
            $this->load->view('quiz/view_test', $data);
        }
    }

    // melakukan pengerjaan kuis
    function do_quiz($id_quiz, $id_group, $id_course) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {

            $user = $this->ion_auth->user()->row();

            $temp = $this->model_quiz->select_quiz_by_id($id_quiz)->row();


            $data['quiz_id'] = $id_quiz;
            $data['group_id'] = $id_group;
            $data['user_id'] = $user->id;
            $data['course_id'] = $id_course;
            $today = getdate();
            $temp_start_time = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':00');

            $data['start_time'] = date_format($temp_start_time, 'Y-m-d H:i:s');

            $temp_length_time = 60 * $temp->length_time;
            $temp_start_time = strtotime($data['start_time']);
            $temp_end_time = strtotime($data['start_time']) + $temp_length_time;

            $data['end_time'] = date('Y-m-d H:i:s', $temp_end_time);

            //echo $data['end_time']."<br>";
            //echo $temp_start_time."<br>";
            //echo $temp_end_time."<br>";
            // apakah kuis bisa diresume atau gak
            $temp2 = $this->load->model_quiz->select_quiz_result_by_status($id_quiz, $user->id, $id_group, 0)->result();

            // count array
            $x = count($temp2);

            //echo "Jumlah coba kuis yang belum dilakukan - ".$x."<br>";

            if ($x == 1) {
                //echo "Lanjutkan  ujian ... ";
                $temp3 = $this->load->model_quiz->select_quiz_result_by_status($id_quiz, $user->id, $id_group, 0)->row();
                $data2['tiket_quiz'] = $temp3->id_result;
                $data2['start_time'] = $temp3->start_time;
                $data2['end_time'] = $temp3->end_time;
            } else if ($x == 0) {
                //echo "Mulai kuis baru ... ";
                $data2['tiket_quiz'] = $this->load->model_quiz->insert_quiz_result($data);
                $data2['start_time'] = $data['start_time'];
                $data2['end_time'] = $data['end_time'];
            }


            $data2['quiz_id'] = $id_quiz;
            $data2['group_id'] = $id_group;
            $data2['user_id'] = $user->id;
            $data2['course_id'] = $id_course;
            $data2['username'] = $user->username;
            $data2['quiz_title'] = $temp->title;


            $this->load->view('quiz/view_question', $data2);
        }
    }

    // menampilkan waktu pengerjaan kuis
    function quiz_clock($tiket_quiz, $quiz_id, $group_id, $course_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['tiket_quiz'] = $tiket_quiz;
            $data['quiz_id'] = $quiz_id;
            $data['group_id'] = $group_id;
            $data['course_id'] = $course_id;
            $this->load->view('quiz/view_clock', $data);
        }
    }

    // menampilkan berakhirnya pengerjaan kuis
    function quiz_end($tiket_quiz, $quiz_id, $group_id, $course_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $temp = $this->load->model_quiz->select_quiz_result_by_quiz_user_group_id($quiz_id, $user->id, $group_id, $tiket_quiz)->row();

            $data['quiz_id'] = $quiz_id;
            $data['tiket_quiz'] = $tiket_quiz;
            $data['quiz_result'] = $temp;
            $data['course_id'] = $course_id;

            $today = getdate();
            $temp_now = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':00');
            $now = date_format($temp_now, 'Y-m-d H:i:s');
            $waktu2 = date_parse($temp->end_time);


            $temp_interval2 = strtotime($today['year'] . '-' . $today['mon'] . '-' . $today['mday'] . ' ' . $today['hours'] . ':' . $today['minutes'] . ':00') - strtotime($waktu2['year'] . '-' . $waktu2['month'] . '-' . $waktu2['day'] . ' ' . $waktu2['hour'] . ':' . $waktu2['minute'] . ':00');

            if ($temp->status == 0) {
                if ($temp_interval2 < 0) {
                    echo "<fieldset>Waktu pengerjaan kuis <b>masih tersisa</b> ...</fieldset>";
                } else {

                    echo "<fieldset>Waktu pengerjaan kuis <b>sudah habis</b> ... </fieldset>";
                    $this->load->view('quiz/form_end_quiz_trigger', $data);
                }
            } else {
                if ($this->session->userdata('data_quiz') != '') {
                    $this->session->unset_userdata('data_quiz');
                }



                echo "<fieldset>Waktu pengerjaan kuis <b>sudah habis</b> ... </fieldset>";
                $this->load->view('quiz/form_end_quiz_trigger', $data);
            }
            echo "<hr>";
        }
    }

    /* --- INSERT ---- */

    function add_course() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['quiz_id'] = $this->input->post('quiz_id', true);
            $data['course_id'] = $this->input->post('course', true);


            $temp_check_course = $this->model_quiz->check_course_by_quiz_id($data['course_id'], $data['quiz_id'])->row();
            $total = count($temp_check_course);
            if ($total > 0) {
                if ($temp_check_course->deleted == 1) {
                    $data['deleted'] = 0;
                    $this->load->model_quiz->update_quiz_course($temp_check_course->id_quiz_course, $data);
                } else if ($temp_check_course->deleted == 0) {
                    echo '1'; //sudah
                }
            } else {
                echo '2'; //belum
                $this->model_quiz->insert_quiz_course($data);
            }
        }
    }

    function add_course_group() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['group_id'] = $this->input->post('group_id', true);
            $data['course_id'] = $this->input->post('course', true);


            $temp_check_course = $this->model_quiz->check_course_by_group_id($data['course_id'], $data['group_id'])->row();
            $total = count($temp_check_course);
            if ($total > 0) {
                if ($temp_check_course->deleted == 1) {
                    $data['deleted'] = 0;
                    $this->load->model_quiz->update_quiz_course_group($temp_check_course->id_quiz_course_group, $data);
                } else if ($temp_check_course->deleted == 0) {
                    echo '1'; //sudah
                }
            } else {
                echo '2'; //belum
                $this->model_quiz->insert_quiz_course_group($data);
            }
        }
    }

    function add_quiz_embed_link() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $data['user_id'] = $user->id;
            $data['file'] = $this->input->post('url', true);
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['type'] = $this->input->post('type', true);
            $data['show'] = 0;
            $data['cover'] = 0;
            $this->model_quiz->insert_quiz_resource($data);
        }
    }

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
            $id_quiz_resource = $this->model_quiz->insert_quiz_resource($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'mp4|mov|flv|MP4|MOV|FLV';
            $config['max_size'] = '2097152'; //dengan maksimal ukuran berkas 2 Giga
            $config['file_name'] = 'quiz_video_' . $id_quiz_resource; //berkas dikirim kemudian diganti namanya

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
                $this->model_quiz->update_quiz_resource($id_quiz_resource, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
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
            $id_quiz_resource = $this->model_quiz->insert_quiz_resource($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'pdf|PDF';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            $config['file_name'] = 'quiz_document_' . $id_quiz_resource; //berkas dikirim kemudian diganti namanya

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
                $this->model_quiz->update_quiz_resource($id_quiz_resource, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    function upload_picture() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['type'] = 8; //document
            $data['show'] = 0; //unshow
            $id_quiz_resource = $this->model_quiz->insert_quiz_resource($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'jpg|png|JPG|PNG';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            $config['file_name'] = 'quiz_picture_' . $id_quiz_resource; //berkas dikirim kemudian diganti namanya

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
                $this->model_quiz->update_quiz_resource($id_quiz_resource, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    function upload_sound() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['type'] = 9; //document
            $data['show'] = 0; //unshow
            $id_quiz_resource = $this->model_quiz->insert_quiz_resource($data);

            $config['upload_path'] = './resource/'; //upload ke folder resource/id/pdf
            $config['allowed_types'] = 'mp3|MP3';
            $config['max_size'] = '215000'; //dengan maksimal ukuran berkas 50 Mb
            $config['file_name'] = 'quiz_sound_' . $id_quiz_resource; //berkas dikirim kemudian diganti namanya

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
                $this->model_quiz->update_quiz_resource($id_quiz_resource, $data2);

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    // proses mengupload kuis dari file kemudian diparsing ke database
    function upload_quiz() {

        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();

            $data['user_id'] = $user->id;
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['random_soal'] = 0;
            $data['random_jawaban'] = 0;
            $data['num_per_page'] = 5;
            $data['status'] = 1;
            $data['deleted'] = 1;

            $id_quiz = $this->model_quiz->insert_quiz($data);

            $config['upload_path'] = './resource/';
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size'] = '215000';
            $config['file_name'] = 'quiz_' . $id_quiz; //berkas dikirim kemudian diganti namanya

            $this->load->library('upload', $config);
            $this->upload->overwrite = true;
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                echo "{";
                echo "msg: '" . $error['error'] . "'";
                echo "}";
            } else {
                $hasil = $this->upload->data();
                $data2['file_quiz'] = $hasil['file_name'];

                $this->model_quiz->update_quiz($id_quiz, $data2);

                error_reporting(E_ALL ^ E_NOTICE);
                include_once (APPPATH . "libraries/Excel_reader2.php");
                $filename = "resource/" . $hasil['file_name'];
                $data = new Spreadsheet_Excel_Reader($filename);

                // memindahkan data ke dalam array
                $question_bank = '';
                $question = '';
                for ($i = 2; $i <= $data->rowcount(); $i++) {
                    for ($j = 1; $j <= $data->colcount(); $j++) {
                        $question[$data->val(1, $j, 0)] = $data->val($i, $j, 0);
                    }
                    $question_bank[] = $question;
                    $question = '';
                }


                $data3['quiz_id'] = $id_quiz;
                $data3['status'] = 1;
                $data3['deleted'] = 1;

                // menampilkan array question dalam bentuk quiz form

                foreach ($question_bank as $quest) {

                    $i = 0;
                    foreach ($quest as $quiz_form => $value) {
                        if ($quiz_form == "pertanyaan") {
                            $data3['soal'] = $value;
                        } else if ($quiz_form == 'jawaban') {
                            $data3['answer'] = $value;
                        } else if ($quiz_form == "no") {
                            continue;
                        } else {
                            if ($value == "") {
                                continue;
                            } else if ($value != "") {
                                $list_option[$i]['option_idx'] = $quiz_form;
                                $list_option[$i]['option_text'] = $value;

                                $i++;
                            }
                        }
                    }
                    $id_soal = $this->model_quiz->insert_soal($data3);

                    foreach ($list_option as $option) {
                        $data4['quiz_id'] = $id_quiz;
                        $data4['soal_id'] = $id_soal;
                        $data4['status'] = 1;
                        $data4['option_idx'] = $option['option_idx'];
                        $data4['option_text'] = $option['option_text'];
                        $data4['deleted'] = 1;

                        $this->model_quiz->insert_choice($data4);
                    }

                    unset($list_option);
                }

                echo "{";
                echo "msg: 1";
                echo "}";
            }
        }
    }

    // proses untuk menambah soal
    function add_soal() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['quiz_id'] = $this->input->post('quiz_id', true);
            $data['answer'] = 'x';
            $data['soal'] = $this->input->post('soal', true);
            $data['status'] = $this->input->post('status', true);
            $data['deleted'] = 1;

            $this->model_quiz->insert_soal($data);
        }
    }

    // proses untuk menambah jawaban
    function add_choice() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $soal_id = $this->input->post('soal_id', true);
            $data['soal_id'] = $soal_id;
            $data['quiz_id'] = $this->input->post('quiz_id', true);
            $temp = $this->model_quiz->select_last_choice($soal_id)->row();

            $data['option_idx'] = $temp->option_idx + 1;
            $data['option_text'] = $this->input->post('answer', true);
            $data['status'] = $this->input->post('status', true);
            $data['deleted'] = 1;

            $this->model_quiz->insert_choice($data);
        }
    }

    function add_group() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['quiz_id'] = $this->input->post('id_choice', true);
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['status'] = 1;
            $data['deleted'] = 0;
            $today = getdate();
            $temp_time = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday']);
            $data['date_create'] = date_format($temp_time, 'Y-m-d');

            $this->model_quiz->insert_group($data);
        }
    }

    // menyimpan hasil kuis
    function save_quiz_result() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $user = $this->ion_auth->user()->row();
            $this->session->unset_userdata('data_quiz');

            $answer = $this->input->post('answer', true);
            $temp_answer = $this->input->post('answer', true);
            $id_quiz = $this->input->post('quiz_id', true);
            $tiket_quiz = $this->input->post('tiket_quiz', true);

            // ambil cqg quiz
            $temp = $this->load->model_quiz->select_quiz_result_by_id($tiket_quiz)->row();

            // select id quiz pass tryout
            $temp2 = $this->load->model_quiz->select_pass_tryout_by_cqg_user($temp->course_id, $temp->quiz_id, $temp->group_id, $user->id)->row();

            // update kode tersebut telah expired
            $data_tryout['expired'] = 1;
            $this->load->model_quiz->update_pass_tryout($temp2->id_quiz_pass_tryout, $data_tryout);

            $key_answer = $this->load->model_quiz->select_soal_by_quiz($id_quiz)->result();
            $data2['result_id'] = $tiket_quiz;
            $banyak_soal = count($key_answer);
            $i = 0;
            $score = 0;
            $benar = 0;
            $salah = 0;
            foreach ($key_answer as $key) {
                if (array_key_exists($key->id_soal, $answer)) {

                    echo $key->id_soal . ". " . $key->answer . " --- " . $answer[$key->id_soal];
                    if ($key->answer == $answer[$key->id_soal]) {
                        $benar += 1;
                    } else {
                        $salah += 1;
                    }
                    $data2['soal_id'] = $key->id_soal;
                    $data2['answer'] = $answer[$key->id_soal];
                    $this->load->model_quiz->insert_answer_log($data2);
                } else {
                    echo "tidak terdefinisi <br>";
                }
            }

            $score = ($benar / $banyak_soal ) * 100;
            $data['score'] = $score;
            $data['status'] = 1;
            $data['right_answer'] = $benar;
            $data['wrong_answer'] = $salah;
            $this->model_quiz->update_quiz_result($tiket_quiz, $data);
        }
    }

    /* --- UPDATE ---- */

    function edit_group($id_group) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->model_quiz->select_group_by_id($id_group)->row();
            $temp2 = $this->model_quiz->select_course_by_group_id($id_group)->row();

            $data['course_id'] = $temp2->course_id;
            $data['quiz_id'] = $temp->quiz_id;
            $data['group_id'] = $temp->id_group;

            $data['title'] = $temp->title;
            $data['description'] = $temp->description;
            $data['status'] = $temp->status;
            $data['password'] = $temp->password;
            $data['type'] = $temp->type;

            $this->load->view('quiz/form_edit_group_quiz', $data);
        }
    }

    function edit_quiz_resource($id_quiz_resource) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->model_quiz->select_quiz_resource_by_id($id_quiz_resource)->row();
            $data['title'] = $temp->title;
            $data['description'] = $temp->description;
            $data['show'] = $temp->show;
            $data['id_quiz_resource'] = $id_quiz_resource;

            $this->load->view('quiz/form_edit_quiz_resource', $data);
        }
    }

    // menampilkan form edit quiz
    function edit_quiz($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $arr_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

            $temp = $this->model_quiz->select_quiz_by_id($id_quiz)->row();
            $data['id_quiz'] = $id_quiz;
            $data['title'] = $temp->title;
            $data['description'] = $temp->description;
            $data['length_time'] = $temp->length_time;
            $data['start_time'] = $temp->start_time;
            $data['end_time'] = $temp->end_time;
            $data['arr_bulan'] = $arr_bulan;
            $data['num_per_page'] = $temp->num_per_page;

            $temp2 = $this->model_quiz->select_min_answer_show($id_quiz)->row();
            $data['count_choice'] = $temp2->count_choice;
            $data['max_answer_show'] = $temp->max_answer_show;
            $data['random_soal'] = $temp->random_soal;
            $data['random_jawaban'] = $temp->random_jawaban;

            $this->load->view('quiz/form_edit_quiz', $data);
        }
    }

    // menampilkan form edit soal
    function edit_soal($id_soal) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->model_quiz->select_soal_by_id($id_soal)->row();
            $data['soal'] = $temp->soal;
            $data['answer'] = $temp->answer;
            $data['status'] = $temp->status;
            $data['id_soal'] = $id_soal;
            $data['quiz_id'] = $temp->quiz_id;
            $data['resource_id'] = $temp->resource_id;
            $data['resource'] = $this->model_quiz->select_quiz_resource_by_id($temp->resource_id)->row();

            $data['list_choice'] = $this->model_quiz->select_choice_by_soal($id_soal)->result();
            $this->load->view('quiz/form_edit_soal', $data);
        }
    }

    // menampilkan form edit jawaban
    function edit_choice($id_choice) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->model_quiz->select_choice_by_id($id_choice)->row();
            $data['id_choice'] = $temp->id_choice;
            $data['quiz_id'] = $temp->quiz_id;
            $data['soal_id'] = $temp->soal_id;
            $data['option_idx'] = $temp->option_idx;
            $data['option_text'] = $temp->option_text;
            $data['status'] = $temp->status;

            $this->load->view('quiz/form_edit_choice', $data);
        }
    }

    /* --- UPDATE - PROCESS ---- */

    function update_quiz_resource() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_quiz_resource = $this->input->post('id_quiz_resource', true);
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['show'] = $this->input->post('show', true);
            print_r($data);
            $this->model_quiz->update_quiz_resource($id_quiz_resource, $data);
        }
    }

    function update_quiz_group_type() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_group = $this->input->post('id_group', true);
            $data['type'] = $this->input->post('tipe_ujian', true);

            $this->model_quiz->update_group($id_group, $data);
        }
    }

    function update_quiz_group() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_group = $this->input->post('id_group', true);
            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['status'] = $this->input->post('status', true);
            $data['password'] = $this->input->post('password', true);

            $this->model_quiz->update_group($id_group, $data);
        }
    }

    // proses mengubah data - data jawaban
    function update_quiz_choice() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_choice = $this->input->post('id_choice', true);
            $data['option_text'] = $this->input->post('answer', true);
            $data['status'] = $this->input->post('status', true);
            $this->model_quiz->update_choice($id_choice, $data);
        }
    }

    // proses mengubah data - data soal
    function update_quiz_soal() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_soal = $this->input->post('id_soal', true);
            $data['soal'] = $this->input->post('soal', true);
            $data['answer'] = $this->input->post('answer', true);
            $data['status'] = $this->input->post('status', true);
            $this->model_quiz->update_soal($id_soal, $data);
        }
    }

    function update_quiz_soal_resource($id_soal, $id_resource) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_soal = $id_soal;
            $data['resource_id'] = $id_resource;
            $this->model_quiz->update_soal($id_soal, $data);

            $resource = $this->model_quiz->select_quiz_resource_by_id($id_resource)->row();

            echo "{";
            echo "msg: " . $resource->title;
            echo "}";
        }
    }

    // proses mengubah data - data kuis
    function update_quiz() {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $id_quiz = $this->input->post('id_quiz', true);

            $hari1 = $this->input->post('hari1', true);
            $bulan1 = $this->input->post('bulan1', true);
            $tahun1 = $this->input->post('tahun1', true);
            $jam1 = $this->input->post('jam1', true);
            $menit1 = $this->input->post('menit1', true);
            $date1 = date_create($tahun1 . '-' . $bulan1 . '-' . $hari1 . " " . $jam1 . ":" . $menit1 . ":00");
            $tanggal1 = date_format($date1, 'Y-m-d H:i:s');
            //echo $tanggal1."<br><br>";

            $hari2 = $this->input->post('hari2', true);
            $bulan2 = $this->input->post('bulan2', true);
            $tahun2 = $this->input->post('tahun2', true);
            $jam2 = $this->input->post('jam2', true);
            $menit2 = $this->input->post('menit2', true);
            $date2 = date_create($tahun2 . '-' . $bulan2 . '-' . $hari2 . " " . $jam2 . ":" . $menit2 . ":00");
            $tanggal2 = date_format($date2, 'Y-m-d H:i:s');
            //echo $tanggal2;

            $data['title'] = $this->input->post('title', true);
            $data['description'] = $this->input->post('description', true);
            $data['length_time'] = $this->input->post('length_time', true);
            $data['start_time'] = $tanggal1;
            $data['end_time'] = $tanggal2;
            $data['random_soal'] = $this->input->post('random-soal', true);
            $data['random_jawaban'] = $this->input->post('random-jawaban', true);
            $data['num_per_page'] = $this->input->post('num_per_page', true);
            $data['max_answer_show'] = $this->input->post('max_answer_show', true);
            //echo $this->input->post('max_answer_show', true);

            $this->model_quiz->update_quiz($id_quiz, $data);
        }
    }

    // meenghentikan kuis dan memulai session baru
    function quiz_terminate($tiket_quiz, $quiz_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['status'] = 1;

            $this->model_quiz->update_quiz_result($tiket_quiz, $data);
        }
    }

    /* --- DELETE ---- */

    function delete_quiz_resource($id_quiz_resource) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $temp = $this->load->model_quiz->select_quiz_resource_by_id($id_quiz_resource)->row();
            if ($temp->ext != '') {
                unlink('./resource/' . $temp->file);
                $this->load->model_quiz->delete_quiz_resource($id_quiz_resource);
            } else {
                $this->load->model_quiz->delete_quiz_resource($id_quiz_resource);
            }
        }
    }

    function delete_course($id_course) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['deleted'] = 1;
            $this->load->model_quiz->update_quiz_course($id_course, $data);
            //$this->load->model_quiz->delete_course($id_course);
        }
    }

    function delete_course_group($id_course) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['deleted'] = 1;
            $this->load->model_quiz->update_quiz_course_group($id_course, $data);
            //$this->load->model_quiz->delete_course($id_course);
        }
    }

    function delete_group($id_group) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['deleted'] = 1;
            $this->load->model_quiz->update_group($id_group, $data);
        }
    }

    // proses menghapus kuis secara tidak permanen
    function delete_quiz($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            // ambil dulu soal
            $list_soal = $this->model_quiz->select_soal_by_quiz($id_quiz)->result();

            foreach ($list_soal as $soal) {
                // ambil jawaban tiap soal
                $list_choice = $this->model_quiz->select_choice_by_soal($soal->id_soal)->result();

                // hapus jawaban tiap soal
                foreach ($list_choice as $choice) {
                    $data['deleted'] = 0;
                    $this->load->model_quiz->update_choice($choice->id_choice, $data);
                }

                // hapus soal
                $data2['deleted'] = 0;
                $this->load->model_quiz->update_soal($soal->id_soal, $data2);

                unset($list_choice);
            }

            // hapus kuis
            $data3['deleted'] = 0;
            $this->load->model_quiz->update_quiz($id_quiz, $data3);
        }
    }

    // proses menghapus soal secara tidak permanen
    function delete_soal($id_soal) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $list_choice = $this->model_quiz->select_choice_by_soal($id_soal)->result();

            foreach ($list_choice as $choice) {
                $data['deleted'] = 0;
                $this->load->model_quiz->update_choice($choice->id_choice, $data);
            }

            $data2['deleted'] = 0;
            $this->load->model_quiz->update_soal($id_soal, $data2);
        }
    }

    // proses menghapus jawaban secara tidak permanen
    function delete_choice($id_choice) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $data['deleted'] = 0;
            $this->load->model_quiz->update_choice($id_choice, $data);
        }
    }

    /*
     *
     * fitur delete permanent ini dibuat jika suatu hari
     * ingin dibuat sebuah fitur penghapusan permanent bagi admin vabel
     */

    // delete permanent
    function delete_quiz_permanent($id_quiz) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            // ambil dulu soal
            $list_soal = $this->model_quiz->select_soal_by_quiz($id_quiz)->result();

            foreach ($list_soal as $soal) {
                // ambil jawaban tiap soal
                $list_choice = $this->model_quiz->select_choice_by_soal($soal->id_soal)->result();

                // hapus jawaban tiap soal
                foreach ($list_choice as $choice) {
                    $this->load->model_quiz->delete_choice($choice->id_choice);
                    echo "---------  bejo ganteng <br>";
                }

                // hapus soal
                $this->load->model_quiz->delete_soal($soal->id_soal);
                echo "x> bejo ganteng <br>";

                unset($list_choice);
            }

            // hapus kuis
            $this->load->model_quiz->delete_quiz($id_quiz);
        }
    }

    function delete_soal_permanent($id_soal) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $list_choice = $this->model_quiz->select_choice_by_soal($id_soal)->result();

            foreach ($list_choice as $choice) {
                $this->load->model_quiz->delete_choice($choice->id_choice);
                echo "bejo ganteng <br>";
            }

            $this->load->model_quiz->delete_soal($id_soal);
        }
    }

    function delete_choice_permanent($id_choice) {
        if (!$this->ion_auth->logged_in()) {
            redirect();
        } else {
            $this->load->model_quiz->delete_choice($id_choice);
        }
    }

}
