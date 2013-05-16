<h3 style="margin-top: 0px;padding-top: 0px;">Edit Jawaban <?php echo $option_idx; ?></h3>
<form id="update-quiz-choice">
    <div class="input-control textarea">
        <textarea name="answer" id="answer" placeholder="Jawaban"><?php echo $option_text;?></textarea>
    </div>
    <div class="input-control select span2">
        <select name="status" id="status">
            <?php
                if ($status == 1){
                    ?>
                    <option value="1">Tampilkan</option>
                    <option value="0">Sembunyikan</option>
                    <?php
                }
                else {
                    ?>
                    <option value="1">Tampilkan</option>
                    <option value="0" selected>Sembunyikan</option>
                    <?php
                }
            ?>
            
        </select>
    </div><br /><br /><br/>
    <input type="hidden" name="id_choice" id="id_choice" value="<?php echo $id_choice ?>"/>
    
    <input type="submit" value="Update"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>
<input type="hidden" name="soal_id" id="soal_id" value="<?php echo $soal_id ?>"/>
<script type="text/javascript">
    $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            var soal_id = $('#soal_id').val();
            $('#content-right').load("<?php echo site_url('quiz/list_all_choice') ?>/"+soal_id,function(){
                $('#loading-template').fadeOut("slow");
            });
        });

    $('#update-quiz-choice').submit(function(){
        $('#message').html('Proses Update ...');
        $('#loading-template').show();
        
        var answer = $('#answer').val();
        
        if (answer == ''){
            var message = '[PERINGATAN]<br><br>';
            if (answer == ''){
                message += '- Anda belum mengisikan opsi jawaban <br>';
            }
            
            $('#message-error').html(message);
            $('#loading-template').fadeOut("slow");
            $('#error-template').show()

            return false;
        }
        
        var soal_id = $('#soal_id').val();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/update_quiz_choice') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('quiz/list_all_choice') ?>/"+soal_id,function(){
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