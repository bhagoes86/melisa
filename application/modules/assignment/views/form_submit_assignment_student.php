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
        <div class="page" id="topbar"></div>
        <!--Center Content-->
        <div class="page">

            <!--Main Content-->
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 12px;">
                            
                            <div id="assignment-section" class="span12">
                                <p>
                                <h2><?php echo $assignment_item->assignment_title?></h2>
                                <h4><?php echo $assignment_item->course.', '.$assignment_item->group_title?></h4>
                                <?php echo $assignment_item->description?>
                                <br />
                                <br />
                                Download file tugas disini :
                                <br />
                                <br />
                                <a class="button bg-color-blue fg-color-white" id="assignment-file" href="<?php echo base_url().'resource/'.$assignment_item->file_assignment?>"><i class="icon-download"></i>File Tugas <?php echo $assignment_item->assignment_title?></a>

                                </p>
                            </div>
                            <div id="check-submit-section" class="span12">
                                <br />
                                <hr/>
                                <form id="form-check-submition-assignment">
                                    <h4 style="margin-top: 0px;padding-top: 0px;">Sandi Masuk Pengumpulan Tugas : </h4>
                                            <div class="input-control text span2">
                                                <input name="password" id="password" type="text"  value=""/>
                                            </div>

                                            <br><br><br>
                                            

                                            <input type="hidden" name="id_course" id="id_course" value="<?php echo $id_course;?>"/>
                                            <input type="hidden" name="id_group" id="id_group" value="<?php echo $id_group;?>"/>
                                            <input type="hidden" name="id_assignment" id="id_assignment" value="<?php echo $id_assignment;?>"/>
                                            <input type="submit" value="Menuju kuis"/>
                                            <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
                                </form>
                                <hr>
                            </div>
                            <div id="submit-section" class="span12">
                                <?php echo $id_course.' - '.$id_assignment.' - '.$id_group?>
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
        <div class="page" id="footbar"></div>

    </body>
</html>
<script type="text/javascript">
        $('#topbar').load("<?php echo site_url('site/topbar_nomenu') ?>");
        $('#footbar').load("<?php echo site_url('site/footbar') ?>");
    
         //$('#submit-section').hide();

         $('#close-error-message').click(function(){
             $('#error-template').fadeOut('slow');
         });
         $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            close();
        });

        $('#form-check-submition-assignment').submit(function(){
            $('#message').html('Sedang membuka quiz ...');
            $('#loading-template').show();
            
            
            var id_course = $('#id_course').val();
            var id_quiz = $('#id_assignment').val();
            var id_group = $('#id_group').val();
            var password = $('#password').val();
            
            if(password == ''){
                $('#loading-template').hide();
                $('#message-error').html('<b>Anda belum mengisikan password !!!</b>');
                $('#loading-template').fadeOut("slow");
                $('#error-template').show()
                return false;
            }

            
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('assignment/check_submit_assignment') ?>",
                 dataType: 'json',
                 data : {id_course:id_course, id_quiz:id_quiz, id_group:id_group, password:password},
                 
                success:function (data, status) {
                    if (data.msg == 1){
                        $('#submit-section').load("<?php echo site_url('assignment/show_form_upload_assignment') ?>/<?php echo $id_assignment?>/<?php echo $id_group;?>/<?php echo $id_course;?>",function(){
                            $('#loading-template').fadeOut("slow");
                        });
                    }
                    else if (data.msg == 0){
                        $('#message-error').html('<b>Password Kuis yang Anda masukkan tidak cocok !!!</b>');
                        $('#loading-template').fadeOut("slow");
                        $('#error-template').show();
                        
                    }
                    else if (data.msg == 2){
                        //alert('[PERINGATAN] Anda tidak boleh menggunakan kode tryout milik peserta yang lain !!!');
                        $('#message-error').html('<b>Anda tidak boleh menggunakan kode tryout milik peserta yang lain !!!</b>');
                        $('#loading-template').fadeOut("slow");
                        $('#error-template').show()
                    }
                    else if (data.msg == 3){
                        //alert('[PERINGATAN] Anda tidak bisa mengikuti kuis lebih dari satu kali !!!');
                        $('#message-error').html('<b>Anda tidak bisa mengikuti kuis lebih dari satu kali !!!</b>');
                        $('#loading-template').fadeOut("slow");
                        $('#error-template').show()
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