<h3 style="margin-top: 0px; padding-top: 0px;">Pasang Sampul</h3>
<form id="do-upload-profic" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control file">
        <label>Pilih Gambar JPEG/PNG Ukuran OptimalLebar 280px dan Tinggi 158px</label><br/>
        <input type="file" name="userfile" id="picture"/>
    </div>
    <input type="submit" value="Upload"/>
</form>
<!-- Script -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
<script type="text/javascript">
    
    $('#do-upload-profic').submit(function(){
        $('#message').html('Upload Sampul');
        $('#loading-template').show();
        
        var picture = $('#picture').val();
       
        //validasi
        if(picture == ''){
            $('#loading-template').hide();
            alert('Pilih File Gambar');
            return false;    
        }
        $.ajaxFileUpload({
            url:"<?php echo site_url('portofolio/upload_profic'); ?>",
            secureuri:false,
            fileElementId:'picture',
            dataType:'json',
            data:{picture:picture
            },
            success: function (data, status)
            {
                if (data.msg == '1')
                {                    
                    $('#loading-template').hide();
                    alert('Proses berhasil!');
                } else {
                    $('#loading-template').hide();
                    alert('Proses gagal!');
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
</script>