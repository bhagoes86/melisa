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
    
   
    <script src="http://connect.soundcloud.com/sdk.js"></script>
    <script>
        SC.initialize({
            client_id: "938418853596f90572983f377348dc57"
        });
    </script>
   <!--  -->
    
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
                            <div id="section-body" class="span9">
                               
                                    <h2>Detail Hasil Kuis </h2>
                                    <h3><?php echo $quiz_title; ?></h3>
                                    <h3><?php echo $course_title.'-'.$group_title; ?></h3>
                                    <br/>
                                    <h4>Dikerjakan oleh  : <b><?php echo $participant->username; ?></b></h4>
                                    <h4>Waktu pengerjaan : <?php echo $start_time." s/d ".$end_time; ?></h4>
                                    <br/>
                                    <hr>
                                    <form id="quiz-form">
                                        <table id="my-table">


                                    <?php
                                    $i = 1;
                                    //shuffle($list_soal);
                                    
                                        ?>
                                             <tr><td>
                                           <br />        
                                           <h3><b>Soal - <?php echo $idx_soal?> : </b></h3>
                                           <br />
                                           <div id="resource-view">

                                             <?php

                                                    if ($soal['resource_id'] != 0){
                                                    ?>
                                                        <?php

                                                        if ($soal['resource']->type == 8){
                                                            ?>
                                                            <img src="<?php echo base_url()."resource/".$soal['resource']->file?>" />
                                                            <?php
                                                        }
                                                        else if ($soal['resource']->type == 5){
                                                            echo modules::run('quiz/show_slideshare', $soal['resource']->file);
                                                        }
                                                        else if ($soal['resource']->type == 0){
                                                            echo modules::run('quiz/show_video', $soal['resource']);
                                                       }
                                                       else if ($soal['resource']->type == 9){
                                                           echo modules::run('quiz/show_audio', $soal['resource']->id_quiz_resource);

                                                       }
                                                       else if ($soal['resource']->type == 1){
                                                        ?>
                                                            <div style="background-color: whiteSmoke;
                                                                             z-index: 1;
                                                                             position: absolute;
                                                                             height: 30px;
                                                                             width: 30px;
                                                                             float: right;
                                                                             margin-top: 2px;
                                                                             right: 0px;"></div>
                                                             <iframe style="width: 100%;height: 480px;border: 0px;" src="http://docs.google.com/viewer?url=<?php echo base_url() . 'resource/' . $soal['resource']->file . '&embedded=true' ?>"></iframe>


                                                        <?php

                                                        }
                                                        else if ($soal['resource']->type == 6){
                                                            ?>

                                                            <div id="putTheWidgetHere-<?php echo $soal['id_soal']?>"></div>
                                                            <script type="text/JavaScript">
                                                                SC.oEmbed("<?php echo $soal['resource']->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere-<?php echo $soal['id_soal'] ?>"));
                                                            </script>

                                                            <?php
                                                        }
                                                        else {
                                                            ?>

                                                            <div style="background-color: #000;height: 394px;">
                                                                <?php
                                                                $media = analyze_media($soal['resource']->file);
                                                                $trace = explode('^^^', $media);
                                                                switch ($trace[0]) {
                                                                    case 'image' :
                                                                        echo "<a href='" . $trace[3] . "' target='_blank'><img src='" . $trace[3] . "' width='100%' /></a>";
                                                                        break;
                                                                    case 'youtube' :
                                                                        echo youtube($trace[1]);
                                                                        break;
                                                                    case 'vimeo' :
                                                                        echo vimeoLarge($trace[1]);
                                                                        break;
                                                                    case 'scribd' :
                                                                        echo scribdLarge($trace[1]);
                                                                        break;
                                                                    case 'docstoc' :
                                                                        echo docstocLarge($trace[1]);
                                                                        break;
                                                                    case 'link' :
                                                                        break;
                                                                    default :
                                                                        die;
                                                                }
                                                                ?>
                                                            </div>

                                                            <?php
                                                        }


                                                    }
                                                    ?>
                                        </div>          

                                                <br /><br/>
                                                <div class="body-text">
                                                    <p><?php echo $i.". ".$soal['soal']; ?></p>
                                                </div>
                                          <?php
                                        //shuffle ($soal['jawaban']);
                                        foreach($soal['jawaban'] as $jawaban){

                                            ?>
                                                <label class="input-control radio">
                                                    <input type="radio" value="<?php echo trim($jawaban['option_idx']); ?>" name="answer[<?php echo $soal['id_soal'];?>]" disabled
                                                        <?php
                                                        if ($soal['jawaban_user'] != null) {
                                                            if ($jawaban['option_idx'] == $soal['jawaban_user']->answer) {
                                                                echo "checked";
                                                            }
                                                        }
                                                        else {

                                                        }

                                                        ?>

                                                    />
                                                    <span class="helper"><?php echo $jawaban['option_text']?></span>

                                                    <?php
                                                        if ($soal['jawaban_user'] != null) {
                                                            if ($jawaban['option_idx'] == $soal['jawaban_user']->answer) {
                                                              if($soal['jawaban_user']->answer == $soal['answer']){
                                                                    ?>
                                                                    <a title="Jawaban benar ..." href="#" id="btn-correct" data-id=""><i class="icon-checkmark fg-color-green"></i></a>

                                                                    <?php
                                                                }

                                                                else {
                                                                    ?>
                                                                    <a title="Jawaban salah ..." href="#" id="btn-correct" data-id=""><i class="icon-cancel-2 fg-color-red"></i></a>

                                                                    <?php
                                                                }
                                                            }
                                                            else if ($jawaban['option_idx'] == $soal['answer']) {
                                                                ?>
                                                                <a title="Jawaban benar ..." href="#" id="btn-correct" data-id=""><i class="icon-checkmark fg-color-green"></i></a>

                                                                <?php
                                                            }
                                                        }
                                                        else {
                                                            if ($jawaban['option_idx'] == $soal['answer']) {
                                                                ?>
                                                                <a title="Jawaban benar ..." href="#" id="btn-correct" data-id=""><i class="icon-checkmark fg-color-green"></i></a>

                                                                <?php
                                                            }

                                                        }

                                                        ?>
                                                </label>
                                                <br />
                                            <?php
                                        }
                                        echo "<br><br>";

                                        ?>

                                         <div class="notices">


                                        <?php
                                            if ($soal['jawaban_user'] != null) {
                                                if($soal['jawaban_user']->answer == $soal['answer']){
                                                    ?>

                                                    <div class="bg-color-green fg-color-white" height="50px">
                                                        <div class="notice-icon"> </div>
                                                        <div class="notice-image"><i class="icon-checkmark fg-color-black" style="font-size:22px;"></i></div>
                                                        <div class="notice-header"> Jawaban <?php echo $participant->username; ?> <b>benar</b>.</div>
                                                        <div class="notice-text ">
                                                        <?php


                                                //echo "Dijawab pada : ".$soal['jawaban_user']->date_modified;
                                                ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                     <div class="bg-color-red fg-color-white" height="50px">
                                                        <div class="notice-icon"> </div>
                                                        <div class="notice-image"><i class="icon-cancel-2 fg-color-black"></i></div>
                                                        <div class="notice-header"> Jawaban <?php echo $participant->username; ?> <b>salah</b>. Jawaban yang benar adalah <?php  echo "<b>".$soal['kunci_jawaban']->option_text."</b>";?> </div>
                                                        <div class="notice-text ">


                                                    <?php

                                                }
                                                //echo "Dijawab pada : ".$soal['jawaban_user']->date_modified;
                                                ?>
                                                 </div>
                                                    </div>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                     <div class="bg-color-blue fg-color-white">
                                                        <div class="notice-icon"> </div>
                                                        <div class="notice-image"><i class="icon-blocked fg-color-black" style="font-size:20px"></i></div>
                                                        <div class="notice-header"> <?php echo $participant->username; ?> <b>tidak memilih</b>  opsi manapun ... </div>
                                                        <div class="notice-text ">
                                                        </div>
                                                    </div>
                                                <?php
                                            }

                                        ?>
                                        </div>
                                        <br />
                                        <h3><b>Pembahasan : </b></h3>
                                        <br/>

                                        <div id="summary-view">

                                             <?php

                                                    if ($soal['summary_id'] != 0){
                                                    ?>
                                                        <?php

                                                        if ($soal['summary']->type == 8){
                                                            ?>
                                                            <img width="60%" height="40%" src="<?php echo base_url()."resource/".$soal['summary']->file?>" />
                                                            <?php
                                                        }
                                                        else if ($soal['summary']->type == 5){
                                                            echo modules::run('quiz/show_slideshare', $soal['summary']->file);
                                                        }
                                                        else if ($soal['summary']->type == 0){
                                                            echo modules::run('quiz/show_video', $soal['summary']);
                                                       }
                                                       else if ($soal['summary']->type == 9){
                                                           echo modules::run('quiz/show_audio', $soal['summary']->id_quiz_resource);

                                                       }
                                                       else if ($soal['summary']->type == 1){
                                                        ?>
                                                            <div style="background-color: whiteSmoke;
                                                                             z-index: 1;
                                                                             position: absolute;
                                                                             height: 30px;
                                                                             width: 30px;
                                                                             float: right;
                                                                             margin-top: 2px;
                                                                             right: 0px;"></div>
                                                             <iframe style="width: 100%;height: 480px;border: 0px;" src="http://docs.google.com/viewer?url=<?php echo base_url() . 'resource/' . $soal['summary']->file . '&embedded=true' ?>"></iframe>


                                                        <?php

                                                        }
                                                        else if ($soal['summary']->type == 6){
                                                            ?>

                                                            <div id="putTheWidgetSummaryHere-<?php echo $soal['id_soal']?>"></div>
                                                            <script type="text/JavaScript">
                                                                SC.oEmbed("<?php echo $soal['summary']->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetSummaryHere-<?php echo $soal['id_soal'] ?>"));
                                                            </script>

                                                            <?php
                                                        }
                                                        else {
                                                            ?>

                                                            <div style="background-color: #000;height: 394px;">
                                                                <?php
                                                                $media = analyze_media($soal['summary']->file);
                                                                $trace = explode('^^^', $media);
                                                                switch ($trace[0]) {
                                                                    case 'image' :
                                                                        echo "<a href='" . $trace[3] . "' target='_blank'><img src='" . $trace[3] . "' width='100%' /></a>";
                                                                        break;
                                                                    case 'youtube' :
                                                                        echo youtube($trace[1]);
                                                                        break;
                                                                    case 'vimeo' :
                                                                        echo vimeoLarge($trace[1]);
                                                                        break;
                                                                    case 'scribd' :
                                                                        echo scribdLarge($trace[1]);
                                                                        break;
                                                                    case 'docstoc' :
                                                                        echo docstocLarge($trace[1]);
                                                                        break;
                                                                    case 'link' :
                                                                        break;
                                                                    default :
                                                                        die;
                                                                }
                                                                ?>
                                                            </div>

                                                            <?php
                                                        }


                                                    }
                                                    ?>
                                        </div>          

                                        <br /><br /><br />

                                       
                                     </td>


                                       </tr>

                                        
                                        <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>"/>
                                        <input type="hidden" name="tiket_quiz" id="tiket_quiz" value="<?php //echo $tiket_quiz?>" />


                                        </table>

                                    </form>

                                    
                            </div>
                            
                            <div id="section-discussion" class="span9">
                               
                                
                            
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
    

         $('#close-error-message').click(function(){
             $('#error-template').fadeOut('slow');
         });
         
         $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            close();
        });

        
</script>