<h3 style="margin-top: 0px;padding-top: 0px;">Tambah Soal </h3>
<form id="add-quiz-soal">
    <div class="input-control textarea">
        <textarea name="soal" id="soal" placeholder="Soal"></textarea>
    </div>
    <div class="input-control select span2">
        <select name="status" id="status">
             <option value="1">Tampilkan</option>
             <option value="0">Sembunyikan</option>
        </select>
    </div><br /><br /><br/>
    <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>"/>
    <input type="submit" value="Tambah"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>

<script type="text/javascript">
    $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            var id_quiz = $('#quiz_id').val();
            $('#content-right').load("<?php echo site_url('quiz/list_all_soal') ?>/"+id_quiz,function(){
                $('#loading-template').fadeOut("slow");
            });
        });

    $('#add-quiz-soal').submit(function(){
        $('#message').html('Mohon tunggu ...');
        $('#loading-template').show();
        var quiz_id = $('#quiz_id').val();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/add_soal') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('quiz/list_all_soal') ?>/"+quiz_id,function(){
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