<h3 style="margin-top: 0px;padding-top: 0px;">Tambah Jawaban</h3>
<form id="add-quiz-choice">
    <div class="input-control textarea">
        <textarea name="answer" id="answer" placeholder="Jawaban"></textarea>
    </div>
    <div class="input-control select span2">
        <select name="status" id="status">
             <option value="1">Tampilkan</option>
             <option value="0">Sembunyikan</option>
        </select>
    </div><br /><br /><br/>
    <input type="hidden" name="soal_id" id="soal_id" value="<?php echo $soal_id ?>"/>
    <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>"/>
    <input type="submit" value="Tambah"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>

<input type="hidden" name="soal_id" id="soal_id" value="<?php //echo $soal_id ?>"/>
<script type="text/javascript">
    $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#confirm-template').show();
            var soal_id = $('#soal_id').val();
            $('#content-right').load("<?php echo site_url('quiz/list_all_choice') ?>/"+soal_id,function(){
                $('#loading-template').fadeOut("slow");
            });
        });

    $('#add-quiz-choice').submit(function(){
        $('#message').html('Mohon Tunggu ...');
        $('#loading-template').show();
        var soal_id = $('#soal_id').val();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/add_choice') ?>",
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