<a class="button bg-color-orange fg-color-white" id="quiz-my-quiz-result"><i class="icon-arrow-left-2"></i> Kembali ke Nilai Saya</a>
<input class="bg-color-blue" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Kembali ke Daftar Kuis "/>

<hr/>

<div class="span9">
<h1>Daftar Hasil Kuis </h1>
<h2><?php echo $quiz_title; ?></h2>
<h2><?php echo $course_title.'-'.$group_title; ?></h2>
<br/>
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
                    <div class="notice-header"> Jawaban Anda <b>benar</b>.</div>
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
                    <div class="notice-header"> Jawaban Anda <b>salah</b>. Jawaban yang benar adalah <?php  echo "<b>".$soal['kunci_jawaban']->option_text."</b>";?> </div>
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
                    <div class="notice-header"> Anda <b>tidak memilih</b>  opsi manapun ... </div>
                    <div class="notice-text ">
                    </div>
                </div>
            <?php
        }
        
    ?>
    </div>
    <br /> <br/>
 </td></tr>

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
    $('#quiz-my-quiz-result').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();

        $('#content-right').load("<?php echo site_url('quiz/show_my_quiz_result') ?>",function(){
            $('#loading-template').fadeOut("slow");

        });
    });
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