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
                <input type="radio" value="<?php echo trim($jawaban['option_idx']); ?>" name="answer[<?php echo $soal['id_soal'];?>]" />
                <span class="helper"><?php echo $jawaban['option_text']?></span>
            </label>
            <br />
        <?php
    }
    echo "<br><br>";

    ?>
 </td></tr>

    <?php

    $i++;
}
?>
    <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>"/>
    <input type="hidden" name="tiket_quiz" id="tiket_quiz" value="<?php //echo $tiket_quiz?>" />
   
       
    </table>

</form>
 <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Kembali ke Daftar Kuis "/>



<script type="text/javascript">

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