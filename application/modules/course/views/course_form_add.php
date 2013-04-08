<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Input Kuliah / Playlist</h3>
<form id="do-input-course" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control text span6">
        <input name="course" id="course" type="text" placeholder="Kuliah / Playlist"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea span6">
        <textarea name="description" id="description" placeholder="Informasi / Deskripsi" style="resize: vertical;"></textarea>
    </div>
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    $('#do-input-course').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/course_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/my_course') ?>");
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
</script>