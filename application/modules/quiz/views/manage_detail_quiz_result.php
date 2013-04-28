 <script src="http://connect.soundcloud.com/sdk.js"></script>
    <script>
        SC.initialize({
            client_id: "938418853596f90572983f377348dc57"
        });
    </script>
    

<script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
    


<?php if ($status != 3){?>

<a class="button bg-color-orange fg-color-white" id="quiz-my-quiz-result"><i class="icon-arrow-left-2"></i> Kembali ke Nilai Saya</a>
<input class="bg-color-blue" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Kembali ke Daftar Kuis "/>
<?php } ?>
<hr/>

<div class="span9">
<h1>Daftar Hasil Kuis </h1>
<h2><?php echo $quiz_title; ?></h2>
<h2><?php echo $course_title.'-'.$group_title; ?></h2>
<br/>
<h3>Dikerjakan oleh  : <b><?php echo $participant->username; ?></b></h3>
<h4>Waktu pengerjaan : <?php echo $start_time." s/d ".$end_time; ?></h4>
<br/>
<hr>
<form id="quiz-form">
    <table id="my-table">


<?php
$i = 1;
//shuffle($list_soal);
foreach ($list_soal as $soal){
    ?>
         <tr><td>
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

                <div class="bg-color-green fg-color-white">
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
                 <div class="bg-color-red fg-color-white">
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
    <br /> <br/>
    
    <div id="summary-resource">
         <?php echo $soal['resource_id']?>
    
         <?php

                if ($soal['resource_id'] != 0){
                ?>
                    <?php
                   
                    if ($soal['resource']->type == 8){
                        ?>
                        <img width="60%" height="40%" src="<?php echo base_url()."resource/".$soal['resource']->file?>" />
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
    <div id="summary-forum"></div>
 </td>
    

   </tr>

    <?php

    $i++;
}
?>
    <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>"/>
    <input type="hidden" name="tiket_quiz" id="tiket_quiz" value="<?php //echo $tiket_quiz?>" />


    </table>

</form>

</div>

<script type="text/javascript">
    <?php if ($status == 1){
        ?>
        $('#quiz-my-quiz-result').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();

            $('#content-right').load("<?php echo site_url('quiz/show_manage_course_result')."/".$course_id."/".$quiz_id."/".$group_id ?>",function(){
                $('#loading-template').fadeOut("slow");

            });
        });
            
        <?php
    }
    else if ($status == 2){
    
        ?>
        $('#quiz-my-quiz-result').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();

            $('#content-right').load("<?php echo site_url('quiz/show_my_quiz_result') ?>",function(){
                $('#loading-template').fadeOut("slow");

            });
        });
            
        <?php
    }
    ?>
    
    $('#btn-cancel').click(function(){
        $('#message').html('Loading ... ');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = 5;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="toolbar"></div>');
        var $pagers = $('<div class="toolbar"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');

            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pagers).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
        $pagers.insertAfter($table).find('span.page-number:first').addClass('active');

    });


</script>