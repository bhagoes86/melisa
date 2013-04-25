<h2 style="margin-top: 0px; padding-top: 0px;">Upload Tugas Baru</h2>
<form id="do-upload-assignment" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control file">
        <label>Pilih file tugas Anda (file harus .pdf)</label><br/>
        <input type="file" name="userfile" id="assignment"/>
    </div>
    
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
    </div>
    <input type="text" name="id_course" id="id_course" value="<?php echo $id_course;?>"/>
    <input type="text" name="id_group" id="id_group" value="<?php echo $id_group;?>"/>
    <input type="text" name="id_assignment" id="id_assignment" value="<?php echo $id_assignment;?>"/>
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
            $('#loading-template').fadeOut("slow");
            
            close();
        });

        //* upload dokumen
        $('#do-upload-assignment').submit(function(){
            $('#message').html('Upload Kuis....');
            $('#loading-template').show();
            //variabel
            var assignment = $('#assignment').val();
            var description = $('#description').val();

            if (assignment == '' || description == ''){
                var message = '[PERINGATAN]<br><br>';
                
                if (assignment == ''){
                    message += '- Anda belum menyertakan file tugas <br>';
                }
                if (description == ''){
                    message += '- Anda belum memberikan deskripsi <br>';
                }

                $('#message-error').html(message);
                $('#loading-template').fadeOut("slow");
                $('#error-template').show()

                return false;
            }
            
            var id_course = $('#id_course').val();
            var id_assignment = $('#id_assignment').val();
            var id_group = $('#id_group').val();
            var description = $('#description').val();

            $.ajaxFileUpload({
                url:"<?php echo site_url('assignment/submit_assignment_student'); ?>",
                secureuri:false,
                fileElementId:'assignment',
                dataType:'json',
                data:{id_course:id_course, id_assignment:id_assignment, id_group:id_group, description:description},
                success: function (data, status)
                {
                    if (data.msg == '1')
                    {
                        $('#message').html("Proses Berhasil");
                        $('#submit-section').load("<?php echo site_url('assignment/success_upload_assignment') ?>",function(){
                            $('#loading-template').fadeOut("slow");
                        });
                        
                    } else {
                        $('#message').html("Proses Gagal");
                        $('#submit-section').load("<?php echo site_url('assignment/show_form_upload_assignment') ?>",function(){
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