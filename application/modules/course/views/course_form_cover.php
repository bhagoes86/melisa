<h3 style="margin-top: 0px; padding-top: 0px;">Pasang Sampul</h3>
<form id="do-upload-cover" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control file">
        <label>Pilih Gambar JPEG/PNG Ukuran OptimalLebar 280px dan Tinggi 158px</label><br/>
        <input type="file" name="userfile" id="picture"/>
    </div>
    <input type="hidden" value="<?php echo $content->id_course ?>" id="id_course"/>
    <input type="submit" value="Upload"/>
</form>
<!-- Script -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
<script type="text/javascript">
    //* upload dokumen
    $('#do-upload-cover').submit(function(){
        $('#message').html('Upload Sampul');
        $('#loading-template').show();
        //variabel
        var picture = $('#picture').val();
        var id_course = $('#id_course').val();
        //validasi
        if(picture == ''){
            $('#loading-template').hide();
            alert('Pilih File Gambar');
            return false;    
        }
        $.ajaxFileUpload({
            url:"<?php echo site_url('course/upload_cover'); ?>",
            secureuri:false,
            fileElementId:'picture',
            dataType:'json',
            data:{picture:picture, 
                id_course:id_course
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