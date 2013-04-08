<div class="span8">
    <h2>Form Upload Video</h2>
    <form id="do-upload-video" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="input-control">
            <input name="userfile" type="file" id="userfile"/>
        </div>
        <div class="input-control text">
            <input name="title" id="title" type="text" placeholder="Judul Video"/>
            <button class="helper"></button>
        </div>
        <div class="input-control textarea">
            <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
        </div>
        <input type="submit" value="Upload"/>
        <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
    </form>
    <!-- Script -->
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
    <script type="text/javascript">
        
        $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
        });
        
        //* upload dokumen
        $('#do-upload-video').submit(function(){
            $('#message').html('Upload Konten ...');
            $('#loading-template').show();
            //variabel
            var title = $('#title').val();
            var description = $('#description').val();
            //validasi
            if(title == ''){
                $('#loading-template').hide();
                alert('Berikan Judul Video!');
                return false;    
            }
            if(description == ''){
                $('#loading-template').hide();
                alert('Berikan Informasi/Deskripsi Video!');
                return false;    
            }
            $.ajaxFileUpload({
                url:"<?php echo site_url('quiz/upload_video'); ?>",
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
                        $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>");
                    } else {
                        $('#loading-template').hide();
                        $('#error-template').show();
                        $('#message-error').html("Upload Gagal, Konten Tidak Sesuai");
                        $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>");
                    }
                },
                error: function (data, status, e)
                {
                    $('#loading-template').hide();
                    $('#error-template').show();
                    $('#message-error').html("Koneksi / Sistem Error");
                    $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>");
                }
            });
            return false; 
        });
    </script>
</div>