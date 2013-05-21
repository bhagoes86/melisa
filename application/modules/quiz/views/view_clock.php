<?php

$jam = date("H:i:s");

echo  "<hr>Sekarang : ".$jam." WIB";
?>
<script type="text/javascript">
       $('#selesai').load('<?php echo site_url('quiz/quiz_end')."/".$tiket_quiz."/".$quiz_id."/".$group_id."/".$course_id; ?>');
</script>