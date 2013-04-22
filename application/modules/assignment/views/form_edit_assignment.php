<?php
   $waktu1 = date_parse($start_time);
   $waktu2 = date_parse($end_time);
?>
<h3 style="margin-top: 0px;padding-top: 0px;">Edit Tugas <?php //echo $option; ?></h3>
<hr>
<form id="update-assignment">
    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="title" value="<?php echo $title; ?>"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"><?php echo $description; ?></textarea>
    </div>
    <hr>
    <br />
    <p><b>Catatan </b>: Untuk menonaktifkan tugas Anda. Samakan tanggal dan jam pada waktu mulai dan waktu selesai</p>
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

    <input type="hidden" name="id_assignment" id="id_assignment" value="<?php echo $id_assignment; ?>"/>
    <input type="submit" value="Update"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>

<script type="text/javascript">
   
    $('#btn-cancel').click(function(){
        $('#message').html('Loading ... ');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });


    $('#update-assignment').submit(function(){
        $('#message').html('Proses Update ...');
        $('#loading-template').show();
        
        var title = $('#title').val();
        var description = $('#description').val();
       
        if (title == '' || description == '' ){
            var message = '[PERINGATAN]<br><br>';
            if (title == ''){
                message += '- Anda belum menyertakan judul <br>';
            }
            
            if (description == ''){
                message += '- Anda belum memberikan deskripsi <br>';
            }
            
            
            $('#message-error').html(message);
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();

            return false;
        }
        
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('assignment/update_assignment') ?>",
            dataType:'json',
            data:$(this).serialize(),
            success:function (data, status) {
                if (data.msg == '1')
                {
                    $('#message').html("Proses Berhasil");
                    $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
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
                
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                alert('gagal');
            }
        });
        return false;
    });
</script>