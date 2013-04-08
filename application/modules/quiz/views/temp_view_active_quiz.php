<?php
echo "Anda memilih quiz - ".$id_quiz."<br><br>";

$today = getdate();
$waktu1 = date_parse($start_time);
$waktu2 = date_parse($end_time);
?>

Hari Ini : <br>
<pre>
<?php print_r($today);?>
</pre>


<?php

/*
$temp_date1 = date_create($waktu1['year'].'-'.$waktu1['month'].'-'.$waktu1['day']);
$temp_date2 = date_create($today['year'].'-'.$today['mon'].'-'.$today['mday']);
$temp_date3 = date_create($waktu2['year'].'-'.$waktu2['month'].'-'.$waktu2['day']);

$interval1 = date_diff($temp_date1, $temp_date2);
$interval2 = date_diff($temp_date3, $temp_date2);

$temp_interval1 = $interval1->format('%R%d');
$temp_interval2 = $interval2->format('%R%d');
*/

$temp_interval1 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu1['year'].'-'.$waktu1['month'].'-'.$waktu1['day'].' '.$waktu1['hour'].':'.$waktu1['minute'].':00');
$temp_interval2 = strtotime($today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':00') - strtotime($waktu2['year'].'-'.$waktu2['month'].'-'.$waktu2['day'].' '.$waktu2['hour'].':'.$waktu2['minute'].':00');


echo 'interval - 1 : '.$temp_interval1."<br>";
echo 'interval - 2 : '.$temp_interval2."<br>";


if ($temp_interval1 > 0 && $temp_interval2 < 0){
    echo "kuis berlaku";
}
else {
    echo "kuis tidak berlaku";
}



/*
$datetime1 = date_create('07:50:00');
$datetime2 = date_create('08:50:00');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%h hours');
*/


?>



<hr />



Waktu Mulai : <br>
<pre>
<?php print_r($waktu1);?>
</pre>

Waktu Selesai : <br>
<pre>
<?php print_r($waktu2);?>
</pre>
