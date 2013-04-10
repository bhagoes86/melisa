<div class="span8">
    <h2>
        Formulir Integrasi Konten
        <?php
        if ($type == '2') {
            echo 'youtube.com';
        } elseif ($type == '3') {
            echo 'vimeo.com';
        } elseif ($type == '4') {
            echo 'scribd.com';
        } elseif ($type == '5') {
            echo 'slideshare.net';
        } elseif ($type == '6') {
            echo 'soundcloud.com';
        } elseif ($type == '7') {
            echo 'docstoc.com';
        }
        ?>
    </h2>
    <form id="submit-link" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="input-control">
            <input name="url" id="url" type="text" placeholder="Alamat URL Konten"/>
        </div>
        <div class="input-control text">
            <input name="title" id="title" type="text" placeholder="Judul Konten"/>
            <button class="helper"></button>
        </div>
        <div class="input-control textarea">
            <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
        </div>
        <input type="submit" value="Submit"/>
        <input class="bg-color-red" style="color:white" type="button" name="btn-cancel" id="btn-cancel" value="Cancel"/>
    
        <?php if ($type == '2') { ?>
            <input type="hidden" name="type" id="type" value="2">
        <?php } elseif ($type == '3') { ?>
            <input type="hidden" name="type" id="type" value="3">
        <?php } elseif ($type == '4') { ?>
            <input type="hidden" name="type" id="type" value="4">
        <?php } elseif ($type == '5') { ?>
            <input type="hidden" name="type" id="type" value="5">
        <?php } elseif ($type == '6') { ?>
            <input type="hidden" name="type" id="type" value="6">
        <?php } elseif ($type == '7') { ?>
            <input type="hidden" name="type" id="type" value="7">
        <?php } ?>
    </form>
</div>
<script type="text/javascript">
    $('#btn-cancel').click(function(){
        $('#message').html('Loading ... ');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });


    $('#submit-link').submit(function(){
        $('#message').html('Proses Input');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/add_quiz_embed_link') ?>",
            data:$(this).serialize(),
            success: function (data, status)
            {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Tautan Ditambahkan");
                $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>");

            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>");
            }
        });
        return false;
    });
</script>