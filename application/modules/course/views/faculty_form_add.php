<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Penambahan Fakultas</h3>
<form id="do-input-faculty" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h4 style="margin-top: 0px; padding-top: 0px;">Fakultas</h4>
    <div class="input-control text span4 clearfix">
        <input name="faculty" id="faculty" type="text" placeholder="Fakultas"/>
        <button class="helper"></button>
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Singkatan</h4>
    <div class="input-control text span2">
        <input name="short" id="short" type="text" placeholder="Singkatan"/>
        <button class="helper"></button>
    </div>
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    $('#do-input-faculty').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/faculty_add'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/all_faculty') ?>");
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