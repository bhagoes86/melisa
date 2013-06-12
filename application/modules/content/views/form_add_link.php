<div class="span8">
    <h2>
        Formulir Tautan Konten / Aplikasi
        <?php
        if ($type == '2') {
            echo '<a href="http://youtube.com" target="_blank">http://youtube.com</a>';
        } elseif ($type == '3') {
            echo '<a href="http://vimeo.com" target="_blank">http://vimeo.com</a>';
        } elseif ($type == '4') {
            echo '<a href="http://scribd.com" target="_blank">http://scribd.com</a>';
        } elseif ($type == '5') {
            echo '<a href="http://slideshare.net" target="_blank">http://slideshare.net</a>';
        } elseif ($type == '6') {
            echo '<a href="http://soundcloud.com" target="_blank">http://soundcloud.com</a>';
        } elseif ($type == '7') {
            echo '<a href="http://docstoc.com" target="_blank">http://docstoc.com</a>';
        } elseif ($type == '8') {
            echo '<a href="http://proprofs.com" target="_blank">http://proprofs.com</a>';
        }
        ?>
    </h2>
    <form id="submit-link" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <h3 style="margin-top: 0px; padding-top: 0px;">Alamat URL Konten</h3>
        <div class="input-control">
            <input name="url" id="url" type="text" placeholder="Alamat URL Konten / Aplikasi"/>
        </div>
        <div class="clearfix"></div>
        <h3 style="margin-top: 0px; padding-top: 0px;">Judul</h3>
        <div class="input-control text">
            <input name="title" id="title" type="text" placeholder="Judul Konten / Aplikasi"/>
            
        </div>
        <div class="clearfix"></div>
        <h3 style="margin-top: 0px; padding-top: 0px;">Deskripsi</h3>
        <div class="input-control textarea">
            <textarea name="description" id="description" placeholder="Deskripsi"></textarea>
        </div>
        <input type="submit" value="Submit"/>
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
        <?php } elseif ($type == '8') { ?>
            <input type="hidden" name="type" id="type" value="8">
        <?php } ?>
    </form>
</div>
<script type="text/javascript">
    $('#submit-link').submit(function(){
        $('#message').html('Proses Input');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/add_content_link') ?>",
            data:$(this).serialize(),
            success: function (data, status)
            {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Tautan Ditambahkan");
                $('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
                
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
            }
        });
        return false;
    });
</script>