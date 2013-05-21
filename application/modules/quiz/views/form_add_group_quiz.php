<h3 style="margin-top: 0px; padding-top: 0px;">Tambah Grup Baru</h3>
<form id="add-group" >
    
    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="Judul Grup"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
    </div>

    <input type="hidden" name="id_choice" id="id_choice" value="<?php echo $quiz_id ?>"/>
    <input type="submit" value="Submit"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>
<script type="text/javascript">
    $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#confirm-template').show();
            var quiz_id = $('#id_choice').val();
            $('#content-right').load("<?php echo site_url('quiz/group_quiz') ?>/"+quiz_id,function(){
                $('#loading-template').fadeOut("slow");
            });
        });

    $('#add-group').submit(function(){
        $('#message').html('Mohon Tunggu ...');
        $('#loading-template').show();
        var quiz_id = $('#id_choice').val();
        var title = $('#title').val();
        var description = $('#description').val();
        
        if (title == '' || description == ''){
            var message = '[PERINGATAN]<br><br>';
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
        
       
        
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/add_group') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('quiz/group_quiz') ?>/"+quiz_id,function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                alert('gagal');
            }
        });
        return false;
    });
</script>