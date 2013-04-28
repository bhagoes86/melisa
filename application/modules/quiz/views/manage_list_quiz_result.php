<a class="button bg-color-green fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kelola Kuis</a>
<a class="button bg-color-blue fg-color-white" id="quiz-result-detail" data-id="" ><i class="icon-search" ></i>Detail Hasil</a>

<hr />

<div class="span9">
<h1>Daftar Hasil Kuis </h1>
<h2><?php echo $quiz_title; ?></h2>
<h3><?php echo $course_title.'-'.$group_title; ?></h3>

<hr>
<?php if ($list_avail_quiz_result > 0) {?>

<table id="my-table">
    <tbody>
        <?php foreach ($list_quiz_result as $result): ?>
            <tr>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"> <?php echo $result->username?></a><br/>
                    <?php echo $result->email?> <br />
                    <?php echo $result->first_name?>  <?php echo $result->phone?> <br />
                    
                </td>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <h4>
                         Nilai : <?php echo $result->score;?> <br />
                         Benar : <?php echo $result->right_answer;?> <br />
                         Salah : <?php echo $result->wrong_answer;?> <br />
                    </h4>
                </td>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <h4>
                        Waktu mulai ujian   : <?php echo $result->start_time ?> <br />
                        Waktu selesai ujian : <?php echo $result->finish_time ?> <br />
                    </h4>
                </td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Lihat jawaban peserta" href="javascript:void(0)" id="btn-next" data-id="<?php echo $result->id_result; ?>"><i class="icon-arrow-right-2 fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?>
    <tr>
        <td><h2>Tidak ada  peserta yang mengikuti kuis yang Anda buat....</h2></td>
    </tr>
<?php }?>
</div>

<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

<script type="text/javascript">

    $('a#quiz-result-detail').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/detail_quiz_result').'/'.$course_id.'/'.$quiz_id.'/'.$group_id ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#btn-next').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_result= $(this).attr('data-id');

        $('#content-right').load("<?php echo site_url('quiz/detail_participant_quiz_result') ?>/"+id_result+"/"+1,function(){
            $('#loading-template').fadeOut("slow");
        });
    });


    $('a#btn-next').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz= $(this).attr('data-id');
        $('#content-right').load("<?php //echo site_url('quiz/show_manage_course_group') ?>/"+id_quiz,function(){
            $('#loading-template').fadeOut("slow");
        });
    });


    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = 10;
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