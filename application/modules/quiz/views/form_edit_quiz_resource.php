<h3 style="margin-top: 0px;padding-top: 0px;">Edit Konten  </h3>
<form id="update-quiz-resource">
    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="title" value="<?php echo $title; ?>"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"><?php echo $description; ?></textarea>
    </div>
    <div class="input-control select span2">
        <select name="show" id="show">
            <?php
                if ($show == 0){
                    ?>
                    <option value="0">Tampilkan</option>
                    <option value="1">Sembunyikan</option>
                    <?php
                }
                else if($show == 1) {
                    ?>
                    <option value="0">Tampilkan</option>
                    <option value="1" selected>Sembunyikan</option>
                    <?php
                }
            ?>

        </select>
    </div><br /><br /><br/>
    <input type="hidden" name="id_quiz_resource" id="id_quiz_resource" value="<?php echo $id_quiz_resource?>"/>

    <input type="submit" value="Update"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>
<script type="text/javascript">
    $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            $('#list-quiz-resource-area').load("<?php echo site_url('quiz/list_all_quiz_resource') ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
        });

    $('#update-quiz-resource').submit(function(){
        $('#message').html('Proses Update ...');
        $('#loading-template').show();
        var id_quiz_resource = $('#id_quiz_resource').val();
        var title = $('#title').val();
        var description = $('#description').val();
        
        if (title == ''){
            $('#message-error').html('Anda belum mengisikan judul !!!');
            $('#loading-template').fadeOut("slow");
            $('#error-template').show()

            return false;
        }
        
        if (description == ''){
            $('#message-error').html('Anda belum memberikan deskripsi !!!');
            $('#loading-template').fadeOut("slow");
            $('#error-template').show()

            return false;
        }
        
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/update_quiz_resource') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#list-quiz-resource-area').load("<?php echo site_url('quiz/list_all_quiz_resource') ?>",function(){
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