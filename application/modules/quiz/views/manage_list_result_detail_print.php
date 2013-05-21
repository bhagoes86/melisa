
    
<div id="print-area"></div>
<hr />

<h1>Daftar Hasil Kuis </h1>
<?php echo $quiz_title; ?>, 
<?php echo $course_title.'-'.$group_title; ?>

<hr />
Keterangan  <b style="color:green"> 1</b> : jawaban benar, <b style="color:red"> 0</b> : jawaban salah, <b style="color:blue"> x</b> : tak terjawab, <b>-</b> : soal tidak ada
<hr/>
        
            <?php
                // content table
            $no_data = 1;
                foreach ($list_quiz_result as $res){
            ?>
<table>
    <tr><td>No</td> <td> : </td> <td><?php echo $no_data ?></td></tr>
    <tr><td>Nama</td> <td> : </td> <td><?php echo $res->username ?></td></tr>
    <tr><td>Mulai</td> <td> : </td> <td><?php echo $res->start_time ?></td></tr>
    <tr><td>Selesai</td> <td> : </td> <td><?php echo $res->finish_time ?></td></tr>
</table>

<br />
<table border="1">
    <tr><td colspan="3" align="center">Hasil Jawaban</td></tr>
    <tr><td>Benar</td><td>Salah</td><td>Kosong</td></tr>
    <tr><td align="center"><?php echo $res->right_answer ?></td>
        <td align="center"><?php echo $res->wrong_answer ?></td>
        <td align="center">
                <?php
                $num_soal = count($quiz_soal);
                echo $num_soal-($res->right_answer+$res->wrong_answer);
            ?>
        </td>
    </tr>
</table>
    

            
            
            
            
<br>
<b> Jawaban Peserta : </b>
<br>
<br>

<?php
$list_num = array();
$list_num = $res->check_answer;
/*
for ($i = 0; $i < 100; $i ++){
	$list_num[$i] = rand(0, 2);
}
*/

$length_num = count($list_num);
$space_num = strlen($length_num);
$table_num = ceil($length_num / 20);

?>


<?php
$count = 0;
$idx = 1;

// banyak baris
for ($i = 0; $i < $table_num; $i++){
?>

<table border="1">
<?php
	for ($j = 0; $j < 2; $j++){
		echo "<tr>";

		if ($j == 0){
			echo "<td>No</td>";
		}
		else if ($j == 1){
			echo "<td>Jawaban</td>";
		}

		// banyak data per baris
		for ($k = 0; $k < 20; $k++) {
				if ($j == 0){
					echo "<td align='center'>";


					if (strlen($idx) < $space_num){
					$temp_length = $space_num - strlen($idx);
						for ($p = 0; $p < $temp_length; $p++){
							echo "&nbsp;&nbsp;";
						}
					}

					echo $idx;
					echo "</td>";
					$idx++;
				}
				else if ($j == 1){
					if (array_key_exists($count, $list_num)){

						echo "<td align='center'>";
						//echo $list_num[$count];

                                                if ($list_num[$count] == 1){
                                                ?>

    <b style="color:green"> 1</b>
                                                <?php
                                                }
                                                else if ($list_num[$count] == 2){
                                                ?>

                                                <b style="color:red"> 0</b>
                                                <?php
                                                }
                                                else {
                                                ?>

                                                <b style="color:blue"> x</b>
                                                <?php
                                                }

                                               
						echo "</td>";

						$count++;
					}
					else if (!array_key_exists($count, $list_num)){
						echo "<td align='center'>-</td>";
					}
				}

		}
		echo "</tr>";
	}
	
?>
</table>
<br/> <br/>
<?php
}
?>



             <br /><br /><br />

            <?php
                    $no_data++;
                }
            ?>

             <br /> <br />
<hr/>

<h2>indeks soal :</h2>

<hr />
<table  cellpadding="10">
    <thead>
        <tr>
            <td><b>No</b></td>
            <td><b>Soal</b></td>
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

