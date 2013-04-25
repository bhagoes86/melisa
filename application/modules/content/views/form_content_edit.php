<h3 style="margin-top: 0px;padding-top: 0px;">Edit Informasi Video</h3>
<form id="update-content-info">
    <h4 style="margin-top: 0px; padding-top: 0px;">Judul Video</h4>
    <div class="input-control text">
        <input name="title" id="title" type="text" placeholder="Judul Video" value="<?php echo $content->title ?>"/>
        <button class="helper"></button>
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Deskripsi</h4>
    <div class="input-control textarea">
        <textarea name="description" id="description" placeholder="Deskripsi"><?php echo $content->description ?></textarea>
    </div>
    <input type="hidden" name="id_content" id="id_content" value="<?php echo $content->id_content ?>"/>
    <input type="submit" value="Update"/>
</form>
<script type="text/javascript">
    $('#update-content-info').submit(function(){
        $('#message').html('Proses Input');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/content_info_update') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/list_my_video') ?>",function(){
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