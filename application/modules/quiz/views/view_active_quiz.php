<?php
echo "Anda memilih quiz - ".$id_quiz."<br><br>";

$today = getdate();
$waktu1 = date_parse($start_time);
$waktu2 = date_parse($end_time);
?>



<?php


$temp_interval1 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu1['year'].'-'.$waktu1['month'].'-'.$waktu1['day'].' '.$waktu1['hour'].':'.$waktu1['minute'].':00');
$temp_interval2 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu2['year'].'-'.$waktu2['month'].'-'.$waktu2['day'].' '.$waktu2['hour'].':'.$waktu2['minute'].':00');

//echo $temp_interval1." -----  ".$temp_interval2."<br><br>";

if ($temp_interval1 > 0 && $temp_interval2 < 0){
    echo "<h1>kuis berlaku</h1>";

    if ($password == ''){
        echo "<br>Silahkan coba kuis langsung !!";
 ?>
 <form action="<?php echo site_url('quiz/do_quiz'); ?>" method="POST" id="check-active-quiz">
    <input type="hidden" name="id_quiz" id="id_quiz" value="<?php echo $id_quiz;?>"/>
    <input type="submit" value="Menuju kuis"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>

 <?php
    }
    else if ($password != ''){
        echo "<br>Anda memerlukan password untuk mengikuti kuis ini...";
    
?>
        
<form action="<?php echo site_url('quiz/do_quiz'); ?>" method="POST" id="check-active-quiz">
    <h4 style="margin-top: 0px;padding-top: 0px;">Sandi Masuk Ujian : </h4>
    <div class="input-control text span2">
        <input name="password" id="password" type="text"  value=""/>
    </div>

    <br><br><br>
    <hr>

    <input type="hidden" name="id_quiz" id="id_quiz" value="<?php echo $id_quiz;?>"/>
    <input type="submit" value="Menuju kuis"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>

<?php
    
    }
}
else {
    echo "<h1>Kuis tidak berlaku</h1>";
}

?>



