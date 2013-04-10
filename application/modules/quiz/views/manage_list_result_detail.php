<a class="button bg-color-blue fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kelola Kuis</a>
<a target='_blank' href="<?php echo site_url('quiz/print_participant_quiz_result_pdf').'/'.$course_id.'/'.$quiz_id.'/'.$group_id ?>" class="button bg-color-orange fg-color-white" id="print-report" data-id="" ><i class="icon-printer" ></i>Cetak Laporan (PDF)</a>
<a target='_blank' href="<?php echo site_url('quiz/print_participant_quiz_result_excel').'/'.$course_id.'/'.$quiz_id.'/'.$group_id ?>" class="button bg-color-green fg-color-white" id="print-report" data-id="" ><i class="icon-printer" ></i>Cetak Laporan (Excel)</a>


<div id="print-area"></div>
<hr />

<h1>Daftar Hasil Kuis </h1>
<h2><?php echo $quiz_title; ?></h2>
<h3><?php echo $course_title.'-'.$group_title; ?></h3>

<hr />
<table id="my-table" class="striped">
    <thead>
        <tr>
            <td>Peserta</td>
            <td>Mulai</td>
            <td>Selesai</td>
            <td>Benar</td>
            <td>Salah</td>
            <td>Kosong</td>

            <?php
                // header table
            $i = 1;
                foreach ($quiz_soal as $qs){
                    ?>
            <td><?php echo $i; ?></td>
                    <?php
                   $i++;
                }
            ?>
            
            
        </tr>
    </thead>
    <tbody>
        
        

            <?php
                // content table
                foreach ($list_quiz_result as $res){
                   ?>
        <tr>
            <td><?php echo $res->username ?></td>
            <td><?php echo $res->start_time ?></td>
            <td><?php echo $res->finish_time ?></td>
            <td><?php echo $res->right_answer ?></td>
            <td><?php echo $res->wrong_answer ?></td>
            <td><?php
                $num_soal = count($quiz_soal);
                echo $num_soal-($res->right_answer+$res->wrong_answer);
            ?></td>

            <?php
                // menampilkan jawaban peserta
                foreach ($res->check_answer as $key){
                  ?><td>

                    <?php
                  if ($key == '1'){
                      ?>
                      <a title="Jawaban benar ..." href="#" id="btn-correct" data-id=""><i class="icon-checkmark fg-color-green"></i></a>

                      <?php
                  }
                  else if ($key == '2'){
                      ?>
                      <a title="Jawaban salah ..." href="#" id="btn-correct" data-id=""><i class="icon-cancel-2 fg-color-red"></i></a>
                      <?php
                  }
                  else {
                      ?>
                      <a title="Tidak terjawab ..." href="#" id="btn-correct" data-id=""><i class="icon-blocked fg-color-black"></i></a>
                      <?php
                  }
                  ?>
                  </td>
                  <?php
                }
            ?>
        </tr>

                    <?php
                }
            ?>
        
    </tbody>
</table>

<hr/>

<h2>indeks soal :</h2>

<hr />
<table class="striped" id="my-table">
    <thead>
        <tr>
            <td>No</td>
            <td>Soal</td>
        </tr>
    </thead>
    <tbody>
        <?php
        // header table
        $i = 1;
            foreach ($quiz_soal as $qs){
                ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $qs->soal?></td>
        </tr>
                <?php
               $i++;
            }
        ?>
    </tbody>
</table>

<script type="text/javascript">
   
    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
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