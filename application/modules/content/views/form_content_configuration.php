<h3>Konfigurasi Konten</h3>

<div class="span8" >
    <h4>Pelajaran</h4>
    <form id="insert-to-course">
        <div class="input-control select span6">
            <select name="course_id" id="course_id">
                <?php foreach ($course as $row_course): ?>
                    <option value="<?php echo $row_course->id_course; ?>"><?php echo $row_course->course; ?></option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <input type="hidden" name="content_id" id="content_id" value="<?php echo $content_id; ?>"/>
        <input type="submit" value="Tambahkan"/>
    </form>
    <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Pelajaran</td>
                    <td style="width: 50px;text-align: center;">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($content_course as $row_course): ?>
                    <tr>
                        <td><?php echo $row_course->course ?></td>
                        <td style="width: 50px;text-align: center;">
                            <a id="btn-delete-content-course" href="javascript:void(0)" style="cursor: pointer;" data-url="<?php echo site_url('content/delete_content_course' . '/' . $row_course->id_course . '/' . $content_id) ?>"><i class="icon-remove fg-color-red"></i></a>
                            <a id="btn-add-content-silabus" href="javascript:void(0)" style="cursor: pointer;" data-id-course="<?php echo $row_course->id_course ?>"><i class="icon-list fg-color-blue"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

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
        <input type="hidden" name="content_id" id="content_id" value="<?php echo $content_id; ?>"/>
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
                <?php foreach ($content_topic as $row_topic): ?>
                    <tr>
                        <td><?php echo $row_topic->topic ?></td>
                        <td style="width: 50px;text-align: center;">
                            <a id="btn-delete-content-topic" href="javascript:void(0)" style="cursor: pointer;" data-url="<?php echo site_url('content/delete_content_topic' . '/' . $row_topic->id_topic . '/' . $content_id) ?>"><i class="icon-remove fg-color-red"></i></a>
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
        <input type="hidden" name="content_id" id="content_id" value="<?php echo $content_id; ?>"/>
        <input type="submit" value="Tambahkan"/>
    </form>
    <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Fakultas</td>
                    <td style="width: 50px;text-align: center;">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($content_faculty as $row_faculty): ?>
                    <tr>
                        <td><?php echo $row_faculty->faculty ?></td>
                        <td style="width: 50px;text-align: center;"></td>
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
        <input type="hidden" name="content_id" id="content_id" value="<?php echo $content_id; ?>"/>
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
                <?php foreach ($content_bimbel as $row_bimbel): ?>
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

<div class="span8">
    <h4>Kategori</h4>
    <form id="insert-to-category">
        <div class="input-control select span6">
            <select name="category_id" id="category_id">
                <?php foreach ($category as $row_category): ?>
                    <option value="<?php echo $row_category->id_category; ?>"><?php echo $row_category->category; ?></option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <input type="hidden" name="content_id" id="content_id" value="<?php echo $content_id; ?>"/>
        <input type="submit" value="Tambahkan"/>
    </form>
    <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Kategori</td>
                    <td style="width: 50px;text-align: center;">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($content_category as $row_category): ?>
                    <tr>
                        <td><?php echo $row_category->category ?></td>
                        <td style="width: 50px;text-align: center;">
                            <a id="btn-delete-content-category" href="javascript:void(0)" style="cursor: pointer;" data-url="<?php echo site_url('content/delete_content_category' . '/' . $row_category->id_category . '/' . $content_id) ?>"><i class="icon-remove fg-color-red"></i></a>
                        </td>
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
            url:"<?php echo site_url('content/content_faculty_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
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
            url:"<?php echo site_url('content/content_topic_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
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
            url:"<?php echo site_url('content/content_topic_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
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
    $('form#insert-to-category').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var content_id = $(this).attr('content_id');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/content_category_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
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
    $('form#insert-to-course').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var content_id = $(this).attr('content_id');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/content_course_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
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
    $('a#btn-delete-content-course').click(function(){
        $('#loading-template').show();
        $('#message').html("Loading");
        var urlcontent = $(this).attr('data-url');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:urlcontent,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
                $('#loading-template').fadeOut("slow");
                $('#content-right').fadeIn("fast");
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
    $('a#btn-delete-content-topic').click(function(){
        $('#loading-template').show();
        $('#message').html("Loading");
        var urlcontent = $(this).attr('data-url');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:urlcontent,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
                $('#loading-template').fadeOut("slow");
                $('#content-right').fadeIn("fast");
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
    
    $('a#btn-delete-content-category').click(function(){
        $('#loading-template').show();
        $('#message').html("Loading");
        var urlcontent = $(this).attr('data-url');
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:urlcontent,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/content_config' . '/' . $content_id) ?>");
                $('#loading-template').fadeOut("slow");
                $('#content-right').fadeIn("fast");
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
   
    $('a#btn-add-content-silabus').click(function(){
        var id_course = $(this).attr('data-id-course');
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/content_silabus' . '/' . $content_id) ?>/"+id_course,function(){
            $('#loading-template').fadeOut("slow");                
        });
    });
</script>