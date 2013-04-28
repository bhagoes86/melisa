<h3>Konfigurasi Materi</h3>

<div class="span8">
    <h4>Topik Materi</h4>
    <form id="insert-to-topic">
        <div class="input-control select span6">
            <select name="topic_id" id="topic_id">
                <?php foreach ($topic as $row_topic): ?>
                    <option value="<?php echo $row_topic->id_topic; ?>"><?php echo $row_topic->topic; ?></option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>"/>
        <input type="submit" value="Tambahkan"/>
    </form>
    <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Topik Materi</td>
                    <td style="width: 50px;text-align: center;">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($course_topic as $row_topic): ?>
                    <tr>
                        <td><?php echo $row_topic->topic ?></td>
                        <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                            <a title="Hapus" href="javascript:void(0)" id="btn-delete-topic" data-id-topic="<?php echo $row_topic->id_topic; ?>"><i class="icon-remove fg-color-red"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="span8" >
    <h4>Kampus</h4>
    <form id="insert-to-faculty">
        <div class="input-control select span6">
            <select name="faculty_id" id="faculty_id">
                <?php foreach ($faculty as $row_faculty): ?>
                    <option value="<?php echo $row_faculty->id_faculty; ?>"><?php echo $row_faculty->faculty; ?></option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>"/>
        <input type="submit" value="Tambahkan"/>
    </form>
    <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Fakultas</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($course_faculty as $row_faculty): ?>
                    <tr>
                        <td><?php echo $row_faculty->faculty ?></td>
                        <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                            <a title="Hapus" href="javascript:void(0)" id="btn-delete-faculty" data-id-faculty="<?php echo $row_faculty->id_faculty; ?>"><i class="icon-remove fg-color-red"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="span8">
    <h4>Bimbel</h4>
    <form id="insert-to-bimbel">
        <div class="input-control select span6">
            <select id="topic_id" name="topic_id">
                <?php foreach ($bimbel as $row_bimbel): ?>
                    <option value="<?php echo $row_bimbel->id_topic; ?>">
                        <?php
                        if ($row_bimbel->status == 4) {
                            echo 'SMK - ';
                        } elseif ($row_bimbel->status == 3) {
                            echo 'SMA - ';
                        } elseif ($row_bimbel->status == 2) {
                            echo 'SMP - ';
                        }
                        ?>
                        <?php echo $row_bimbel->topic; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>"/>
        <input type="submit" value="Tambahkan"/>
    </form>
    <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Bimbel</td>
                    <td style="width: 50px;text-align: center;">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($course_bimbel as $row_bimbel): ?>
                    <tr>
                        <td>
                            <?php
                            if ($row_bimbel->status == 4) {
                                echo 'SMK - ';
                            } elseif ($row_bimbel->status == 3) {
                                echo 'SMA - ';
                            } elseif ($row_bimbel->status == 2) {
                                echo 'SMP - ';
                            }
                            ?>
                            <?php echo $row_bimbel->topic ?>
                        </td>
                        <td style="width: 50px;text-align: center;"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $('form#insert-to-faculty').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var content_id = $(this).attr('content_id');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/course_faculty_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('course/course_config' . '/' . $course_id) ?>");
                    $('#loading-template').fadeOut("slow");
                    $('#content-right').fadeIn("fast");
                }
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').fadeIn("fast");
            }
        });
        return false;
    });
    $('form#insert-to-topic').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var content_id = $(this).attr('content_id');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/course_topic_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('course/course_config' . '/' . $course_id) ?>");
                    $('#loading-template').fadeOut("slow");
                    $('#content-right').fadeIn("fast");
                }
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').fadeIn("fast");
            }
        });
        return false;
    });
    $('form#insert-to-bimbel').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var content_id = $(this).attr('content_id');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/course_topic_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('course/course_config' . '/' . $course_id) ?>");
                    $('#loading-template').fadeOut("slow");
                    $('#content-right').fadeIn("fast");
                }
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').fadeIn("fast");
            }
        });
        return false;
    });
    
    $('a#btn-delete-topic').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_topic = $(this).attr('data-id-topic');
        var id_course = <?php echo $course_id; ?>;
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/delete_course_topic') ?>/"+id_topic+"/"+id_course,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/course_config' . '/' . $course_id) ?>",function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#message-error').html('Proses Gagal');
                $('#error-template').show();
            }
        });
        return false; 
    });
    
    $('a#btn-delete-faculty').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_faculty = $(this).attr('data-id-faculty');
        var id_course = <?php echo $course_id; ?>;
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/delete_course_faculty') ?>/"+id_faculty+"/"+id_course,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/course_config' . '/' . $course_id) ?>",function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#message-error').html('Proses Gagal');
                $('#error-template').show();
            }
        });
        return false; 
    });
</script>
