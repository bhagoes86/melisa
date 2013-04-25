<h2 style="margin-top: 0px; padding-top: 0px;">Edit Grup</h2>

<hr />
<br />
<br />

<h3>Edit data grups</h3>
<form id="add-group" >

    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="Judul Grup" value="<?php echo $title;?>"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"><?php echo $description;?></textarea>
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
    <hr>
    
    <br />
    
    
    <br />
    <div id="ujian-biasa">
        <fieldset>
        <h4 style="margin-top: 0px;padding-top: 0px;">Sandi Masuk Ujian : </h4>
        <div class="input-control text span2">
            <input name="password" id="password" type="text"  value="<?php echo $password;?>"/>
        </div>
        </fieldset>
    </div>
   

    

    <br><br><br>
    <input type="hidden" name="id_group" id="id_group" value="<?php echo $group_id ?>"/>
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
            $('#content-right').load("<?php echo site_url('assignment/list_group') ?>/"+<?php echo $assignment_id; ?>,function(){
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
            url:"<?php echo site_url('assignment/update_group') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('assignment/list_group') ?>/"+<?php echo $assignment_id;?>,function(){
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