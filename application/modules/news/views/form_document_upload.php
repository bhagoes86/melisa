<a class="button bg-color-green fg-color-white" id="back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali</a>
<div class="span8">
    <h2>Formulir Upload Dokumen</h2>
    <form id="do-upload-document" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="input-control">
            <label>Format PDF</label>
            <input name="userfile" type="file" id="userfile"/>
        </div>
        <input type="submit" value="Upload"/>
    </form>
    <div/>
    <!-- Script -->
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
    <script type="text/javascript">
        //* upload dokumen
        var id_news = <?php echo $id; ?>;
        var type = <?php echo $type ?>;
        var att_type = <?php echo $att_type ?>;
        $('#do-upload-doc').submit(function(){
            $('#message').html('Upload attachment');
            $('#loading-template').show();
            $.ajaxFileUpload({
                url:"<?php echo site_url('news/upload_document'); ?>/"+id_news+"/"+att_type,
                secureuri:false,
                fileElementId:'userfile',
                dataType:'json',
                data:{
                },
                success: function (data, status)
                {
                    if (data.msg == '1')
                    {                    
                        $('#loading-template').fadeOut("slow");
                        $('#info-template').show();
                        $('#message-info').html("Upload Konten Berhasil");
                        $('#content-right').load("<?php echo site_url('news/home') ?>/"+type);
                    } else {
                        $('#loading-template').hide();
                        $('#error-template').show();
                        $('#message-error').html("Upload Gagal, Konten Tidak Sesuai");
                        $('#content-right').load("<?php echo site_url('news/shortcut') ?>/"+id_news+"/"+type);
                    }
                },
                error: function (data, status, e)
                {
                    $('#loading-template').hide();
                    $('#error-template').show();
                    $('#message-error').html("Koneksi / Sistem Error");
                    $('#content-right').load("<?php echo site_url('news/shortcut') ?>/"+id_news+"/"+type);
                }
            });
            return false; 
        });
        $('a#back-btn').click(function(){
            $('#message').html('Loading Informasi');
            $('#loading-template').show();
            $('#content-right').load("<?php echo site_url('news/shortcut') ?>/"+id_news+"/"+type,function(){
                $('#loading-template').fadeOut("slow");
            });
        });
    </script>
