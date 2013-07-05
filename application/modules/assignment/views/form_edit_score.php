<h2 style="margin-top: 0px; padding-top: 0px;">Edit Nilai Tugas</h2>

<br>
<form id="add-group" >

    <hr>
    Dikumpulkan oleh : <b><?php echo $user;?></b> <br />
    Kuliah : <?php echo $course_title;?> <br />
    Kelas : <?php echo $group_title;?> <br />
    Tugas : <?php echo $assignment_title; ?>
    <hr>
    <div class="input-control text">
        <a class="button bg-color-purple fg-color-white" id="quiz-file-sample" href="<?php echo base_url()."resource/".$file;?>"><i class="icon-download"></i><?php echo $file;?></a>
        <p></p>
    </div>
    <div class="input-control textarea">
        <p>Pesan : <br /> <?php echo $description;?></p>
    </div>
    
    <hr />
    <br />
    
    <fieldset>
    <h4 style="margin-top: 0px;padding-top: 0px;">Berikan komentar Anda mengenai tugas ini : </h4>
    <div class="input-control textarea">
        <textarea name="feedback" id="feedback" placeholder="Feedback"><?php echo $feedback;?></textarea>
    </div>
    
    <br />
    
    <h4 style="margin-top: 0px;padding-top: 0px;">Berikan nilai untuk tugas ini: </h4>
    <div class="input-control text span2">
        <input name="score" id="score" type="text"  value="<?php echo $score;?>"/>
    </div>
    </fieldset>
    
   
    <br><br><br>
    <input type="hidden" name="assignment_student_id" id="assignment_student_id" value="<?php echo $assignment_student_id ?>"/>
    <input type="submit" value="Submit"/>
    <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
</form>


<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>


<script type="text/javascript">

    
    $('#btn-cancel').click(function(){
            $('#message').html('Loading ... ');
            $('#loading-template').show();
            $('#content-right').load("<?php echo site_url('assignment/give_score') ?>/"+<?php echo $course_id; ?> + "/"+<?php echo $assignment_id; ?>+ "/"+<?php echo $group_id; ?>,function(){
                $('#loading-template').fadeOut("slow");
            });
     });

     $('#add-group').submit(function(){
        $('#message').html('Mohon Tunggu ...');
        $('#loading-template').show();
        var group_id = $('#id_group').val();
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
            url:"<?php echo site_url('assignment/update_result') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('assignment/give_score') ?>/"+<?php echo $course_id; ?> + "/"+<?php echo $assignment_id; ?>+ "/"+<?php echo $group_id; ?>,function(){
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