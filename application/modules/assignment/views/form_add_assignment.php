<h2 style="margin-top: 0px; padding-top: 0px;">Upload Tugas Baru</h2>
<form id="do-upload-assignment" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control file">
        <label>Pilih file tugas Anda (file harus .pdf)</label><br/>
        <input type="file" name="userfile" id="assignment"/>
    </div>
    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="Judul Tugas"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
    </div>
    <input type="submit" value="Upload"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>
<!-- Script -->
<!-- Script -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
<script type="text/javascript">
        $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
        });

        //* upload dokumen
        $('#do-upload-assignment').submit(function(){
            $('#message').html('Upload Kuis....');
            $('#loading-template').show();
            //variabel
            var assignment = $('#assignment').val();
            var title = $('#title').val();
            var description = $('#description').val();

            if (assignment == '' || title == '' || description == ''){
                var message = '[PERINGATAN]<br><br>';
                
                if (assignment == ''){
                    message += '- Anda belum menyertakan file tugas <br>';
                }
                if (title == ''){
                    message += '- Anda belum mengisikan judul <br>';
                }
                if (description == ''){
                    message += '- Anda belum memberikan deskripsi <br>';
                }

                $('#message-error').html(message);
                $('#loading-template').fadeOut("slow");
                $('#error-template').show()

                return false;
            }
            

            $.ajaxFileUpload({
                url:"<?php echo site_url('assignment/add_assignment'); ?>",
                secureuri:false,
                fileElementId:'assignment',
                dataType:'json',
                data:{title:title,
                    description:description
                },
                success: function (data, status)
                {
                    if (data.msg == '1')
                    {
                        $('#message').html("Proses Berhasil");
                        $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
                            $('#loading-template').fadeOut("slow");
                        });
                        
                    } else {
                        $('#message').html("Proses Gagal");
                        $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
                            $('#loading-template').fadeOut("slow");
                        });
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