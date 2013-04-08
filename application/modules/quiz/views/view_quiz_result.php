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

<p>
    catatan : silahkan lihat detail hasil kuis Anda di dasboard kelola kuis dengan
    menekan tombol <b>Nilai Saya</b>.
</p>