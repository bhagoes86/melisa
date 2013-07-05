<a class="button bg-color-green fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kelola Kuis</a>
<a target="_blank" href="<?php echo site_url('quiz/print_my_quiz_result') ?>" class="button bg-color-orange fg-color-white" id="print-report" data-id="" ><i class="icon-printer" ></i>Cetak Laporan (PDF)</a>

<hr />

<div class="span9">
<h2>Daftar Hasil Kuis </h2>


<hr>
<?php if ($list_avail_my_quiz_result > 0) {?>

<table id="my-table">
    <thead>
        <tr>
            <td><b>Kuis</b></td>
            <td><b>Score</b></td>
            <td><b>Waktu</b></td>
            <td><b>Detail</b></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_my_quiz_result as $result): ?>
            <tr>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"> <?php echo $result->quiz_title?></a>
                    <p><?php echo $result->group_title?> <br/> <?php echo $result->course_title?></p>
                   
                    Dibuat oleh :  <b><?php echo $result->owner_quiz?></b>
                </td>
               
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <p>
                         Nilai : <?php echo $result->score;?> <br />
                         Benar : <?php echo $result->right_answer;?> <br />
                         Salah : <?php echo $result->wrong_answer;?> <br />
                         Kosong : <?php echo ($result->num_soal - ($result->right_answer + $result->wrong_answer))?> <br />
                         Jumlah Soal : <?php echo $result->num_soal; ?>
                    </p>
                </td>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <h4>
                        mulai ujian   : <br/> <?php echo $result->start_time ?> <br /><br />
                        selesai ujian : <br/> <?php echo $result->finish_time ?> <br />
                    </h4>
                </td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Lihat jawaban saya" href="javascript:void(0)" id="btn-next" data-id="<?php echo $result->id_result; ?>"><i class="icon-arrow-right-3 fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?>
    <tr>
        <td><h2>Anda tidak mengikuti kuis manapun ....</h2></td>
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
        
        $('#content-right').load("<?php echo site_url('quiz/detail_participant_quiz_result') ?>/"+id_result+"/"+2,function(){
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