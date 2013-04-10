<div id="answer-bar">
</div>

<br>

<form id="quiz-form">
<table class="striped" id="my-table">
<?php
$i = 1;
if ($random_soal == 1){
    shuffle($list_soal);
}

foreach ($list_soal as $soal){
    ?>
        <tr><td>
            <div class="body-text">
                <h1></h1>
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

                    ?>
                    
                <div>
                    <p><?php echo $i.". ".$soal['soal']; ?></p>
                </div>
                    <?php
                }
                else {
                    ?>
                <div> <p><?php echo $i.". ".$soal['soal']; ?></p> </div>
                    <?php
                }

                ?>
                
            </div>
            
      <?php
    if ($random_jawaban == 1) {
        shuffle ($soal['jawaban']);
    }
    foreach($soal['jawaban'] as $jawaban){
    	
        ?>
            <label class="input-control radio">
                <input type="radio" value="<?php echo trim($jawaban['option_idx']); ?>"
                 answer_id="<?php echo $soal['id_soal'];?>"
                 name="answer[<?php echo $soal['id_soal'];?>]"
                 <?php
                    if ($this->session->userdata('data_quiz') != ''){
                        if (trim($jawaban['option_idx']) == $soal['temp_jawaban']){
                            echo "checked";
                        }
                        else if (trim($jawaban['option_idx']) != $soal['temp_jawaban']){
                        
                            echo "";
                        }
                    }

                 ?>

                 />
                <span class="helper"><?php echo $jawaban['option_text']?></span>
            </label>
            <br />
        <?php
    }
    echo "<br><br>";


    
    $i++;?>
    </td></tr>
    <?php
}
?>
</table>
    <input type="hidden" name="group_id" id="group_id" value="<?php echo $group_id ?>"/>
    <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>"/>
    <input type="hidden" name="tiket_quiz" id="tiket_quiz" value="<?php echo $tiket_quiz?>" />
    <input type="submit" value="Submit Kuis"/>
    
</form>

<script type="text/javascript">
    $('input:radio').click(function(){
        var answer_id = $(this).attr('answer_id');
        var answer_value = $(this).val();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/save_quiz_answer_temp') ?>/",
            data:$('#quiz-form').serialize(),
            success:function (data) {
            },
            error:function (data){
                alert('gagal');
            }
        });
    });

    
    $('#quiz-form').submit(function(){
        $('#message').html('Mohon Tunggu ...');
        $('#loading-template').show();
        $('#end-quiz').load('<?php echo site_url('quiz/quiz_submit_wtro')."/".$tiket_quiz."/".$quiz_id."/".$group_id; ?>', function(){
            $('#loading-template').fadeOut();
        });
        $('#content-quiz').hide();
        return false;
    });

    $('#quiz-formx').submit(function(){
        $('#message').html('Mohon Tunggu ...');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/save_quiz_result') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-quiz').load("<?php echo site_url('quiz/quiz_result') ?>/"+<?php echo $quiz_id?>+"/"+<?php echo $user_id;?>+"/"+<?php echo $tiket_quiz;?>+"/"+<?php echo $group_id;?>,function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                alert('gagal');
            }
        });
        return false;
    });


    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = <?php if (isset($num_per_page)) { echo $num_per_page; } else { echo '5'; }?>;
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