<form id="update-quiz-result">
    <input type="hidden" name="tiket_quiz" id="tiket_quiz" value="<?php echo $tiket_quiz; ?>"/>
    <input type="hidden" name="id_quiz" id="id_quiz" value="<?php echo $quiz_id; ?>"/>
    <input type="hidden" name="id_group" id="id_group" value="<?php echo $group_id; ?>"/>
    <input type="submit" value="Kumpulkan kuis ini dan saya yakin dengan jawaban yang telah saya pilih ..."/>
</form>

<br>
<hr>
<script type="text/javascript">
    $('#update-quiz-result').submit(function(){
        $('#message').html('Mohon Tunggu ...');
        $('#loading-template').show();
        $('#end-quiz').hide();
        var quiz_id = $('#id_quiz').val();
        var tiket_quiz = $('#tiket_quiz').val();
        
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/save_quiz_result'); ?>",
            data:$('#quiz-form').serialize(),
            success:function (data) {
                $('#content-result').load("<?php echo site_url('quiz/quiz_result')."/".$quiz_id."/".$user_id."/".$tiket_quiz."/".$group_id; ?>",function(){
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