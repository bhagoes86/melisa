<div class="span8">
    <h2>Formulir Upload Dokumen</h2>
    <form id="do-upload-document" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <h3 style="margin-top: 0px; padding-top: 0px;">Judul Dokumen</h3>
        <div class="input-control text">
            <input name="title" id="title" type="text" placeholder="Judul Dokumen"/>
            
        </div>
        <div class="clearfix"></div>
        <div class="input-control">
            <label>Format PDF</label>
            <input name="userfile" type="file" id="userfile"/>
        </div>
        <div class="clearfix"></div>
        <h3 style="margin-top: 0px; padding-top: 0px;">Deskripsi</h3>
        <div class="input-control textarea">
            <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
        </div>
        <input type="submit" value="Upload"/>
    </form>
    <!-- Script -->
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
    <script type="text/javascript">
        //* upload dokumen
        $('#do-upload-document').submit(function(){
            $('#message').html('Upload Konten');
            $('#loading-template').show();
            //variabel
            var title = $('#title').val();
            var description = $('#description').val();
            //validasi
            if(title == ''){
                $('#loading-template').hide();
                alert('Berikan Judul Dokumen!');
                return false;    
            }
            if(description == ''){
                $('#loading-template').hide();
                alert('Berikan Informasi/Deskripsi Dokumen!');
                return false;    
            }
            $.ajaxFileUpload({
                url:"<?php echo site_url('content/upload_document'); ?>",
                secureuri:false,
                fileElementId:'userfile',
                dataType:'json',
                data:{title:title, 
                    description:description
                },
                success: function (data, status)
                {
                    if (data.msg == '1')
                    {                    
                        $('#loading-template').fadeOut("slow");
                        $('#info-template').show();
                        $('#message-info').html("Upload Konten Berhasil");
                        $('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
                    } else {
                        $('#loading-template').hide();
                        $('#error-template').show();
                        $('#message-error').html("Upload Gagal, Konten Tidak Sesuai");
                        $('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
                    }
                },
                error: function (data, status, e)
                {
                    $('#loading-template').hide();
                    $('#error-template').show();
                    $('#message-error').html("Koneksi / Sistem Error");
                    $('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
                }
            });
            return false; 
        });
    </script>
</div>