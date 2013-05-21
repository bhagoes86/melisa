
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url(); ?>asset/colorpicker/css/colorpicker.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/colorpicker/js/colorpicker.js"></script>


<form id="do-edit-header" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Topbar</h3>
    <div class="input-control text span6">
        <input name="topbar" id="topbar" type="text" placeholder="topbar" value="<?php echo $content->header; ?>" style="margin-bottom: 10px"/>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>
<form id="do-edit-footer" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Footbar</h3>
    <div class="input-control textarea span6">
        <textarea name="footbar" id="footbar" placeholder="footbar"resize: vertical style="margin-bottom: 10px"><?php echo $content->footer; ?></textarea>
        <input type="submit" value="Submit"/>
    </div>   
</form>
<div class="clearfix"></div>
<div class="colorpickerHolder" id="colorpickerHolder" style="display: block; position: relative;">
</div>
<div class="clearfix"></div>
<form id="do-edit-bheader" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Background Topbar</h3>
    <div class="input-control text span6">
        <input name="bgheader"  maxlength="6" size="6" id="bgheader" type="text" placeholder="Backgroung topbar" value="<?php echo $content->bgheader; ?>" style="margin-bottom: 10px"/>
        <input type="submit" value="Submit"/>
    </div>
</form>

<div class="clearfix"></div>
<form id="do-edit-bfooter" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Background Footbar</h3>
    <div class="input-control text span6">
        <input name="bgfooter" maxlength="6" size="6" id="bgfooter" type="text" placeholder="Background footbar" value="<?php echo $content->bgfooter; ?>" style="margin-bottom: 10px"/>
        <input type="submit" value="Submit"/>
    </div>
</form>
<div class="clearfix"></div>
<form id="do-edit-caption" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Caption</h3>
    <div class="input-control textarea span6">
        <textarea name="caption" id="caption" placeholder="Caption"resize: vertical style="margin-bottom: 10px"><?php echo $content->caption; ?></textarea>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>
<form id="do-edit-menu1" method="POST" accept-charset="utf-8" enctype="multipart/form-data"> 
    <h3 style="margin-top: 0px; padding-top: 0px;">Menu 1</h3>
    <div class="input-control text span3">
        <input name="menu1" id="menu1" type="text" placeholder="Menu 1" value="<?php echo $content->menu1; ?>" style="margin-bottom: 10px"/>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>
<form id="do-edit-menu2" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Menu 2</h3>
    <div class="input-control text span3">
        <input name="menu2" id="menu2" type="text" placeholder="Menu 2" value="<?php echo $content->menu2; ?>" style="margin-bottom: 10px"/>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>
<form id="do-edit-menu3" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Menu 3</h3>
    <div class="input-control text span3">
        <input name="menu3" id="menu3" type="text" placeholder="Menu 3" value="<?php echo $content->menu3; ?>" style="margin-bottom: 10px"/>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>
<form id="do-upload-smpicture1" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Small picture 1</h3>
    <div class="input-control file">
        <input type="file" name="userfile" id="picture1"/>
        <input type="submit" value="Upload"/>
    </div>
</form>
<div class="clearfix"></div>
<form id="do-edit-tgpicture1" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Tag picture 1</h3>
    <div class="input-control textarea span6">
        <textarea name="tgpicture1" id="tgpicture1" placeholder="Tag picture 1"resize: vertical style="margin-bottom: 10px"><?php echo $content->tgpicture1; ?></textarea>
        <input type="submit" value="Submit"/>
    </div>
</form>
<div class="clearfix"></div>
<form id="do-upload-smpicture2" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Small picture 2</h3>
    <div class="input-control file">
        <input type="file" name="userfile" id="picture2"/>
        <input type="submit" value="Upload"/>
    </div>
</form>
<div class="clearfix"></div>
<form id="do-edit-tgpicture2" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Tag picture 2</h3>
    <div class="input-control textarea span6">
        <textarea name="tgpicture2" id="tgpicture2" placeholder="Tag picture 2"resize: vertical style="margin-bottom: 10px"><?php echo $content->tgpicture2; ?></textarea>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>
<form id="do-upload-smpicture3" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Small picture 3</h3>
    <div class="input-control file">
        <input type="file" name="userfile" id="picture3"/>
        <input type="submit" value="Upload"/>
    </div>
</form>
<div class="clearfix"></div>
<form id="do-edit-tgpicture3" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h3 style="margin-top: 0px; padding-top: 0px;">Tag picture 3</h3>
    <div class="input-control textarea span6">
        <textarea name="tgpicture3" id="tgpicture3" placeholder="Tag picture 3"resize: vertical style="margin-bottom: 10px"><?php echo $content->tgpicture3; ?></textarea>
        <input type="submit" value="Submit"/>
    </div>

</form>
<div class="clearfix"></div>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>

<script type="text/javascript">
    
    $('#colorpickerHolder').ColorPicker({flat: true});
    
    $('#do-edit-header').submit(function(){        
        
        $('#message').html("Loading Data");
        $('#loading-template').show();                
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_header'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Topbar berhasil diperbaharui");
                
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    $('#do-edit-bheader').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_bgheader'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Background topbar berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    $('#do-edit-footer').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_footer'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Footbar berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    $('#do-edit-bfooter').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_bgfooter'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Background footbar berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-caption').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_caption'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Caption berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-menu1').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_menu1'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Menu 1 berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-menu2').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_menu2'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Menu 2 berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-menu3').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_menu3'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Menu 3 berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-tgpicture1').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_tgpicture1'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Tag picture 1 berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-tgpicture2').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_tgpicture2'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Tag picture 2 berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-edit-tgpicture3').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('site/update_tgpicture3'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Tag picture 3 berhasil diperbaharui");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('#do-upload-smpicture1').submit(function(){
        $('#message').html('Upload header');
        $('#loading-template').show();
        var picture = $('#picture1').val();
        //validasi
        if(picture == ''){
            $('#loading-template').hide();
            alert('Pilih File Gambar');
            return false;    
        }
        $.ajaxFileUpload({
            
            url:"<?php echo site_url('site/upload_smpicture'); ?>/"+1,
            secureuri:false,
            fileElementId:'picture1',
            dataType:'json',
            data:{picture:picture
            },
            success: function (data, status)
            {
                if (data.msg == '1')
                {                    
                    $('#loading-template').fadeOut("slow");
                    $('#info-template').show();
                    $('#message-info').html("Small picture 1 berhasil diperbaharui");
                } else {
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Koneksi / Sistem Error");
                }
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                alert('Proses gagal!');
            }
        });
        return false; 
    });
    $('#do-upload-smpicture2').submit(function(){
        $('#message').html('Upload header');
        $('#loading-template').show();
        var picture = $('#picture2').val();
        //validasi
        if(picture == ''){
            $('#loading-template').hide();
            alert('Pilih File Gambar');
            return false;    
        }
        $.ajaxFileUpload({
            
            url:"<?php echo site_url('site/upload_smpicture'); ?>/"+2,
            secureuri:false,
            fileElementId:'picture2',
            dataType:'json',
            data:{picture:picture
            },
            success: function (data, status)
            {
                 if (data.msg == '1')
                {                    
                    $('#loading-template').fadeOut("slow");
                    $('#info-template').show();
                    $('#message-info').html("Small picture 2 berhasil diperbaharui");
                } else {
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Koneksi / Sistem Error");
                }
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                alert('Proses gagal!');
            }
        });
        return false; 
    });
    $('#do-upload-smpicture3').submit(function(){
        $('#message').html('Upload header');
        $('#loading-template').show();
        var picture = $('#picture3').val();
        //validasi
        if(picture == ''){
            $('#loading-template').hide();
            alert('Pilih File Gambar');
            return false;    
        }
        $.ajaxFileUpload({
            
            url:"<?php echo site_url('site/upload_smpicture'); ?>/"+3,
            secureuri:false,
            fileElementId:'picture3',
            dataType:'json',
            data:{picture:picture
            },
            success: function (data, status)
            {
                 if (data.msg == '1')
                {                    
                    $('#loading-template').fadeOut("slow");
                    $('#info-template').show();
                    $('#message-info').html("Small picture 3 berhasil diperbaharui");
                } else {
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Koneksi / Sistem Error");
                }
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                alert('Proses gagal!');
            }
        });
        return false; 
    });
    //Hide Error Message
    $('#close-error-message').click(function(){
        $('#error-template').fadeOut("slow");
        return false;
    });
        
    //Hide Info Message
    $('#close-info-message').click(function(){
        $('#info-template').fadeOut("slow");
        return false;
    });
</script>