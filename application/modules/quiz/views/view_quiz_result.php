<h2>Hasil Kuis Anda</h2>
<hr />
<br/>
<table  border="1" class="striped">
    <thead>
    <tr>
    <th style="text-align:center"><b>Benar</b></th>
    <th style="text-align:center"><b>Salah</b></th>
    <th style="text-align:center"><b>Kosong</b></th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center"><?php echo $result->right_answer; ?></td>
            <td align="center"><?php echo $result->wrong_answer; ?></td>
            <td align="center"><?php
               echo $count_quiz_soal - ($result->right_answer+$result->wrong_answer);
            ?></td>

        </tr>
    </tbody>
</table>

<div id="hasil-ujian-detail"></div>
<script type="text/javascript">
    $('#hasil-ujian-detail').load("<?php echo site_url('quiz/detail_participant_quiz_result') ?>/"+<?php echo $result->id_result?>+"/"+3);
    
</script>