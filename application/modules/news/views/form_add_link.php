<a class="button bg-color-green fg-color-white" id="back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali</a>
<div class="span8">
    <h2>
        Formulir Integrasi Konten
    </h2>
    <form id="submit-link" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="input-control">
            <input name="url" id="url" type="text" placeholder="Alamat URL Konten"/>
        </div>
        <input type="submit" value="Submit"/>
   </form>
</div>
<script type="text/javascript">
    var id_news = <?php echo $id; ?>;
    var type = <?php echo $type?>;
    var att_type = <?php echo $att_type?>;
    $('#submit-link').submit(function(){
        $('#message').html('Proses Input');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('news/add_content_link') ?>/"+id_news+"/"+att_type,
            data:$(this).serialize(),
            success: function (data, status)
            {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Tautan Ditambahkan");
                $('#content-right').load("<?php echo site_url('news/home') ?>/"+type);
                
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').load("<?php echo site_url('news/shortcut') ?>/"+id_news+"/"+type);
            }
        });
        return false;
    });
    $('a#back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/shortcut') ?>/"+id_news+"/"+type,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>