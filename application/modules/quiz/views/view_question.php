<?php echo "<h3>Anda dengan ID : <b>$username </b>sedang mengerjakan <b>".$quiz_title."</b> | Kode : <b>$tiket_quiz / $group_id</b></h3>";?>


<?php


    $today = getdate();
    $temp_now = date_create($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00');
    $now = date_format($temp_now, 'Y-m-d H:i:s');
    $waktu2 = date_parse($end_time);

    echo "<fieldset>Waktu pengerjaan kuis : ".$start_time."     sampai dengan   ".$end_time."</fieldset>";

?>

<hr>



<script type="text/javascript">
    setInterval(function(){
        $('#jam').load('<?php echo site_url('quiz/quiz_clock')."/".$tiket_quiz."/".$quiz_id."/".$group_id."/".$course_id; ?>')
    }, 1000);
    
    $('#content-quiz').load('<?php echo site_url('quiz/view_form_quiz')."/".$quiz_id."/".$tiket_quiz."/".$group_id."/".$course_id; ?>');
</script>