<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/html">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="<?php //echo $content->description; ?>">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="title" content="<?php //echo $content->title; ?>">
        <meta name="keywords" content="<?php //echo $content->title; ?>">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <title>Virtual Learning</title>
    </head>
    <?php $this->load->view('home/js'); ?>
    
    <script src="//connect.soundcloud.com/sdk.js"></script>
    <script>
        SC.initialize({
            client_id: "938418853596f90572983f377348dc57"
        });
    </script>
    <script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
    
    <body class="modern-ui" onload="prettyPrint();">
        <!--Top Navbar-->
        <div class="page">
            <?php $this->load->view('content/viewer_navbar'); ?>
        </div>
        <!--Center Content-->
        <div class="page">

            <!--Main Content-->
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 12px;"><div id="section-body" class="span9">
                                <div id="head-quiz"></div>
                                <div id="end-quiz"></div>
                                <div id="content-result"></div>
                                <div id="content-quiz">
                                <?php

                                if ($check_course_quiz_group_avail != 0){

                                    if ($has_participated > 0){
                                        echo "<h1>Anda sudah pernah mengikuti test ini...</h1>";
                                        
                                    }
                                    else {
                                    echo "Anda memilih quiz - $id_quiz / $id_group <br><br>";

                                    $today = getdate();
                                    $waktu1 = date_parse($start_time);
                                    $waktu2 = date_parse($end_time);
                                    ?>



                                        <?php

                                        $temp_interval1 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu1['year'].'-'.$waktu1['month'].'-'.$waktu1['day'].' '.$waktu1['hour'].':'.$waktu1['minute'].':00');
                                        $temp_interval2 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu2['year'].'-'.$waktu2['month'].'-'.$waktu2['day'].' '.$waktu2['hour'].':'.$waktu2['minute'].':00');

                                        //echo $temp_interval1." -----  ".$temp_interval2."<br><br>";

                                        if ($temp_interval1 > 0 && $temp_interval2 < 0){
                                            echo "<h1>kuis berlaku</h1>";

                                            if ($password == ''){
                                                echo "<br>Silahkan coba kuis langsung !!";
                                         ?>
                                         <form id="check-active-quiz">
                                            <input type="hidden" name="id_group" id="id_group" value="<?php echo $id_group;?>"/>
                                            <input type="hidden" name="id_quiz_check" id="id_quiz_check" value="<?php echo $id_quiz;?>"/>
                                            <input type="submit" value="Menuju kuis"/>
                                            <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
                                        </form>

                                         <?php
                                            }
                                            else if ($password != ''){
                                                echo "<br>Anda memerlukan password untuk mengikuti kuis ini...";

                                        ?>

                                        <form  id="check-active-quiz">
                                            <h4 style="margin-top: 0px;padding-top: 0px;">Sandi Masuk Ujian : </h4>
                                            <div class="input-control text span2">
                                                <input name="password" id="password" type="text"  value=""/>
                                            </div>

                                            <br><br><br>
                                            <hr>

                                            <input type="hidden" name="id_course" id="id_course" value="<?php echo $course_id;?>"/>
                                            <input type="hidden" name="id_group" id="id_group" value="<?php echo $id_group;?>"/>
                                            <input type="hidden" name="id_quiz_check" id="id_quiz_check" value="<?php echo $id_quiz;?>"/>
                                            <input type="submit" value="Menuju kuis"/>
                                            <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
                                        </form>

                                        <?php

                                            }
                                        }
                                        else {
                                            echo "<h1>Kuis tidak berlaku</h1>";
                                        }
                                    }
                                }
                                else {
                                    echo "<h1>Kuis tidak tersedia....</h1>";
                                }
                                ?>
                                </div>
                               
                            </div>
                            <div class="span3">
                                <div id="jam"></div>
                                <div id="selesai"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Loading Template-->
                <div class="message-dialog bg-color-green fg-color-white"  style="display: none;" id="loading-template">
                    <img style="float: left;margin-top: 10px;" src="<?php echo base_url() ?>asset/metro/images/preloader-w8-cycle-black.gif">
                    <p style="float: left;margin-left: 20px;margin-top: 30px;" id="message">Content for message dialog</p>
                </div>
                <div class="message-dialog bg-color-red fg-color-white" style="display: none;" id="error-template">
                    <p id="message-error">Content for message dialog</p>
                    <button class="place-right" id="close-error-message">Tutup Pesan</button>
                </div>
                <div class="message-dialog bg-color-blue fg-color-white" style="display: none;" id="info-template">
                    <p id="message-info">Content for message dialog</p>
                    <button class="place-right" id="close-info-message">Tutup Pesan</button>
                </div>
            </div>
        </div>

        <!--Footer Content-->
        <div class="page">
            <div class="nav-bar">
                <div class="nav-bar-inner padding10">
                    <span class="element">
                        <?php echo date('Y'); ?>, VABEL UPT Elearning UNPAD &copy; by <a class="fg-color-white" href="mailto:taufiksu@gmail.com">Taufik Sulaeman P</a>
                    </span>
                </div>
            </div>
        </div>

    </body>
</html>
<script type="text/javascript">

         $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            close();
        });

        $('#check-active-quiz').submit(function(){
            $('#message').html('Sedang membuka quiz ...');
            $('#loading-template').show();

            var id_course = $('#id_course').val();
            var id_quiz = $('#id_quiz_check').val();
            var id_group = $('#id_group').val();
            var password = $('#password').val();
            
            if(password == ''){
                $('#loading-template').hide();
                alert('Anda belum mengisikan password !!!');
                return false;
            }

            
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('quiz/check_quiz_password') ?>",
                 dataType: 'json',
                 data : {id_course:id_course, id_quiz:id_quiz, id_group:id_group, password:password},
                 
                success:function (data, status) {
                    if (data.msg == 1){
                        $('#head-quiz').load("<?php echo site_url('quiz/do_quiz') ?>/<?php echo $id_quiz?>/<?php echo $id_group;?>/<?php echo $course_id;?>",function(){
                            $('#loading-template').fadeOut("slow");
                        });
                    }
                    else if (data.msg == 0){
                        alert('[PERINGATAN] Password Kuis yang Anda masukkan tidak cocok !!!');
                        $('#loading-template').fadeOut("slow");
                    }
                    else if (data.msg == 2){
                        alert('[PERINGATAN] Anda tidak boleh menggunakan kode tryout milik peserta yang lain !!!');
                        $('#loading-template').fadeOut("slow");
                    }
                    else if (data.msg == 3){
                        alert('[PERINGATAN] Anda tidak bisa mengikuti kuis lebih dari satu kali !!!');
                        $('#loading-template').fadeOut("slow");
                    }
                    

                },
                error:function (data, status, e){
                    $('#loading-template').fadeOut("slow");
                    alert("error occured. Status:" + data.status
                            + ' --Status Text:' + data.statusText
                            + " --Error Result:" + data.responseText);
                }
            });
            return false;
        });
</script>