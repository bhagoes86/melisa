<?php
   $waktu1 = date_parse($start_time);
   $waktu2 = date_parse($end_time);
?>
<h3 style="margin-top: 0px;padding-top: 0px;">Edit Kuis <?php //echo $option; ?></h3>
<hr>
<form id="update-quiz">
    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="title" value="<?php echo $title; ?>"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"><?php echo $description; ?></textarea>
    </div>
    <hr>
    <br />
    <p><b>Catatan </b>: Untuk menonaktifkan kuis Anda. Samakan tanggal dan jam pada waktu mulai dan waktu selesai</p>
    <div id="info-quiz-active"></div>
    <br />
    <h4 style="margin-top: 0px;padding-top: 0px;">Waktu Mulai : </h4>
     <div class="input-control text span3" style="margin-top: 0px;padding-left: 10px;padding-top:5px">
        (hari / bulan / tahun ) :
      </div>
     <div class="input-control select span1">
        <select name="hari1" id="hari1">
            <?php
                for ($i = 1; $i < 32; $i++){
                    
                    if ($waktu1['day'] == $i){
                        if ($i < 10){
                            echo "<option selected='true' value='$i'>0".$i."</option>";
                        }
                        else{
                            echo "<option selected='true' value='$i'>$i</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$i'>0".$i."</option>";
                        }
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }

                }
            ?>
        </select>

      </div>
      <div class="input-control select span2">
        <select name="bulan1" id="bulan1">
            <?php
                for ($i = 0; $i < 12; $i++){
                    $txt = $arr_bulan[$i];
                    $curr = $i + 1;
                    if ($waktu1['month'] == $curr){
                        if ($i < 10){
                            echo "<option selected='true' value='$curr'>$txt</option>";
                        }
                        else{
                            echo "<option selected='true' value='$curr'>$txt</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$curr'>$txt</option>";
                        }
                        else {
                            echo "<option value='$curr'>$txt</option>";
                        }
                    }
                }
            ?>
        </select>

      </div>
      <div class="input-control select span2">
        <select name="tahun1" id="tahun1">
            <?php
                $this_year = date("Y");
                $past_ten_year = $this_year - 10;
              
                for ($i = 0; $i < 10; $i++){
                    if ($waktu1['year'] == $past_ten_year){
                        echo "<option selected='true' value='$past_ten_year'>$past_tean_year</option>";
                    }
                    else {
                        echo "<option value='$past_ten_year'>$past_ten_year</option>";
                    }
                    $past_ten_year++;
                }
                
                for ($i = 0; $i <= 10; $i++){
                    if ($waktu1['year'] == $this_year){
                        echo "<option selected='true' value='$this_year'>$this_year</option>";
                    }
                    else {
                        echo "<option value='$this_year'>$this_year</option>";
                    }
                    $this_year++;
                }
            ?>
        </select>

      </div>
    <div class="input-control text span3" style="margin-top: 0px;padding-left: 10px;padding-top:5px">
        (jam / menit) :
    </div>
      <div class="input-control select span1">
        <select name="jam1" id="jam1">
            <?php

                for ($i = 0; $i< 24; $i++){
                     if ($waktu1['hour'] == $i){
                        if ($i < 10){
                            echo "<option selected='true' value='$i'>0".$i."</option>";
                        }
                        else{
                            echo "<option selected='true' value='$i'>$i</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$i'>0".$i."</option>";
                        }
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }

                }

            ?>
        </select>
      </div>

      <div class="input-control select span1">
        <select name="menit1" id="menit1">
            <?php

                for ($i = 0; $i< 60; $i+=5){
                    if ($waktu1['minute'] == $i){
                        if ($i < 10){
                            echo "<option selected='true' value='$i'>0".$i."</option>";
                        }
                        else{
                            echo "<option selected='true' value='$i'>$i</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$i'>0".$i."</option>";
                        }
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }

                }

            ?>
        </select>

      </div>

    <br><br><br><br><br>
    
    <h4 style="margin-top: 0px;padding-top: 0px;">Waktu Selesai : </h4>
     <div class="input-control text span3" style="margin-top: 0px;padding-left: 10px;padding-top:5px">
        (hari / bulan / tahun ) :
      </div>
     <div class="input-control select span1">
        <select name="hari2" id="hari2">
            <?php
                for ($i = 1; $i < 32; $i++){

                    if ($waktu2['day'] == $i){
                        if ($i < 10){
                            echo "<option selected='true' value='$i'>0".$i."</option>";
                        }
                        else{
                            echo "<option selected='true' value='$i'>$i</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$i'>0".$i."</option>";
                        }
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }

                }
            ?>
        </select>

      </div>
      <div class="input-control select span2">
        <select name="bulan2" id="bulan2">
            <?php
                for ($i = 0; $i < 12; $i++){
                    $txt = $arr_bulan[$i];
                    $curr = $i + 1;
                    if ($waktu2['month'] == $curr){
                        if ($i < 10){
                            echo "<option selected='true' value='$curr'>$txt</option>";
                        }
                        else{
                            echo "<option selected='true' value='$curr'>$txt</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$curr'>$txt</option>";
                        }
                        else {
                            echo "<option value='$curr'>$txt</option>";
                        }
                    }
                }
            ?>
        </select>

      </div>
      <div class="input-control select span2">
        <select name="tahun2" id="tahun2">
            <?php
                $this_year = date("Y");
                $past_ten_year = $this_year - 10;

                for ($i = 0; $i < 10; $i++){
                    if ($waktu2['year'] == $past_ten_year){
                        echo "<option selected='true' value='$past_ten_year'>$past_tean_year</option>";
                    }
                    else {
                        echo "<option value='$past_ten_year'>$past_ten_year</option>";
                    }
                    $past_ten_year++;
                }

                for ($i = 0; $i <= 10; $i++){
                    if ($waktu2['year'] == $this_year){
                        echo "<option selected='true' value='$this_year'>$this_year</option>";
                    }
                    else {
                        echo "<option value='$this_year'>$this_year</option>";
                    }
                    $this_year++;
                }
            ?>
        </select>

      </div>
    <div class="input-control text span3" style="margin-top: 0px;padding-left: 10px;padding-top:5px">
        (jam / menit) :
    </div>
      <div class="input-control select span1">
        <select name="jam2" id="jam2">
            <?php

                for ($i = 0; $i< 24; $i++){
                     if ($waktu2['hour'] == $i){
                        if ($i < 10){
                            echo "<option selected='true' value='$i'>0".$i."</option>";
                        }
                        else{
                            echo "<option selected='true' value='$i'>$i</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$i'>0".$i."</option>";
                        }
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }

                }

            ?>
        </select>
      </div>

      <div class="input-control select span1">
        <select name="menit2" id="menit2">
            <?php

                for ($i = 0; $i< 60; $i+=5){
                    if ($waktu2['minute'] == $i){
                        if ($i < 10){
                            echo "<option selected='true' value='$i'>0".$i."</option>";
                        }
                        else{
                            echo "<option selected='true' value='$i'>$i</option>";
                        }
                    }
                    else {
                        if ($i < 10){
                            echo "<option value='$i'>0".$i."</option>";
                        }
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }

                }

            ?>
        </select>

      </div>

    <br><br><br><br><br>
    <hr>

    <h4 style="margin-top: 0px;padding-top: 0px;">Acak Soal dan Jawaban : </h4>
    <div class="input-control text span3" style="margin-top: 0px;padding-left: 10px;padding-top:5px">
        acak soal :
    </div>
      <div class="input-control select span2">
        <select name="random-soal" id="random-soal">
            <?php
                if ($random_soal == 0){
                    ?>
                    <option value="1">acak</option>
                    <option value="0" selected>tidak diacak</option>
                    <?php
                }
                else {
                    ?>
                    <option value="1">acak</option>
                    <option value="0">tidak diacak</option>
                    <?php
                }
            ?>
            
        </select>
      </div>

    <br /><br /><br />
    
    <div class="input-control text span3" style="margin-top: 0px;padding-left: 10px;padding-top:5px">
        acak jawaban :
    </div>
      <div class="input-control select span2">
        <select name="random-jawaban" id="random-jawaban">
            <?php
                if ($random_jawaban == 0){
                    ?>
                    <option value="1">acak</option>
                    <option value="0" selected>tidak diacak</option>
                    <?php
                }
                else {
                    ?>
                    <option value="1">acak</option>
                    <option value="0">tidak diacak</option>
                    <?php
                }
            ?>
        </select>
      </div>
    
    <br><br><br><br><br>
    <hr>

    <h4 style="margin-top: 0px;padding-top: 0px;">Jumlah Soal Per Halaman : </h4>
    <div class="input-control text span2">
        <input name="num_per_page" id="num_per_page" type="text"  value="<?php echo $num_per_page; ?>"/>
    </div>


    <br><br><br>

    <h4 style="margin-top: 0px;padding-top: 0px;">Lamanya Ujian ( menit ) : </h4>
    <div class="input-control text span2">
        <input name="length_time" id="length_time" type="text"  value="<?php echo $length_time; ?>"/>
    </div>
    

    <br><br><br>
    <hr>

    <input type="hidden" name="id_quiz" id="id_quiz" value="<?php echo $id_quiz; ?>"/>
    <input type="submit" value="Update"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>

<script type="text/javascript">
   
    $('#btn-cancel').click(function(){
        $('#message').html('Loading ... ');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });


    $('#update-quiz').submit(function(){
        $('#message').html('Proses Update ...');
        $('#loading-template').show();
        
        var title = $('#title').val();
        var description = $('#description').val();
        var num_per_page = $('#num_per_page').val();
        var length_time = $('#length_time').val();
        
        if (title == '' || description == '' || num_per_page == '' || length_time == ''){
            var message = '[PERINGATAN]<br><br>';
            if (title == ''){
                message += '- Anda belum menyertakan judul <br>';
            }
            
            if (description == ''){
                message += '- Anda belum memberikan deskripsi <br>';
            }
            
            if (parseInt(num_per_page) <= 0){
                message += '- Jumlah soal per halaman tidak boleh 0 <br>';
            }
            
            if(parseInt(length_time) <= 10){
                
                message += '- Lamanya waktu ujian tidak boleh 0 !!!';
            }
            
            $('#message-error').html(message);
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();

            return false;
        }
        
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/update_quiz') ?>",
            dataType:'json',
            data:$(this).serialize(),
            success:function (data, status) {
                if (data.msg == '1')
                {
                    $('#message').html("Proses Berhasil");
                    $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });

                }
                else if (data.msg == '2')
                {
                    var message = '[PERINGATAN]<br><br>';
                    message += '- Waktu yang selesai salah';
                    $('#message-error').html(message);
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                }
                else if (data.msg == '3')
                {
                    var message = '[PERINGATAN]<br><br>';
                    message += '- Lamanya ujian tidak boleh kurang dari 10 <br />';
                    message += '- Jumlah soal per halaman tidak boleh kurang dari 1';
                    $('#message-error').html(message);
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                }
                
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                alert('gagal');
            }
        });
        return false;
    });
</script>