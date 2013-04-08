<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Faculty</h3>
<form id="do-input-faculty" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control text span4 clearfix">
        <input name="faculty" id="faculty" type="text" placeholder="faculty" value="<?php echo $faculty->faculty;?>"/>
        <button class="helper"></button>
    </div>
    <div class="clearfix"></div>
     <div class="input-control text span4 clearfix">
        <input name="singkatan" id="singkatan" type="text" placeholder="singkatan" value="<?php echo $faculty->short;?>"/>
        <button class="helper"></button>
    </div>
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var id=<?php echo $id ;?>;
    $('#do-input-faculty').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/faculty_update');?>/"+id,
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