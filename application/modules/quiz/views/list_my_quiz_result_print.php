<hr />

<div class="span9">
<h1>Daftar Hasil Kuis : <?php echo $username;?></h1>


<hr>
<?php if ($list_avail_my_quiz_result > 0) {?>

<table border="1">
    <thead>
        <tr>
            <td><b>No</b></td>
            <td><b>Kuis</b></td>
            <td><b>Pembuat</b></td>
            <td><b>Jumlah Soal</b></td>
            <td><b>Benar</b></td>
            <td><b>Salah</b></td>
            <td><b>Kosong</b></td>
            <td><b>Waktu</b></td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($list_my_quiz_result as $result): ?>
            <tr>
                <td><?php echo $i;?></td>
                <td >
                    <?php echo $result->quiz_title?>
                    <?php echo $result->group_title?> <br/> <?php echo $result->course_title?>
                </td>
                <td> <b><?php echo $result->owner_quiz?></b>
                </td>
               
                <td align="center" valign="middle">
                          <?php echo $result->num_soal; ?>

                </td>
                <td  align="center" valign="middle">
                        <?php echo $result->right_answer;?> <br />
                    
                </td>
                <td  align="center" valign="middle">
                        <?php echo $result->wrong_answer;?> <br />
                </td>
                <td  align="center" valign="middle">
                        <?php echo ($result->num_soal - ($result->right_answer + $result->wrong_answer))?> <br />
                </td>
                

                <td>
                    
                        mulai ujian   : <br/> <?php echo $result->start_time ?> <br/><br />
                        selesai ujian : <br/> <?php echo $result->finish_time ?>
                </td>
             

            </tr>
        <?php $i ++; endforeach; ?>
    </tbody>
</table>
<?php } else { ?>
    <tr>
        <td><h2>Anda tidak mengikuti kuis manapun ....</h2></td>
    </tr>
<?php }?>
</div>



