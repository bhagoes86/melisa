<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<?php if ($type == 1) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Berita</h3>
    <?php
}
?>
<?php if ($type == 2) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Beasiswa</h3>
    <?php
}
?>
<?php if ($type == 3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Fitur</h3>
    <?php
}
?>
<?php if ($type == 1 + 3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Sakola</h3>
    <?php
}
?>
<?php if ($type == 2 + 3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Karir</h3>
    <?php
}
?>
<?php if ($type == 3 + 3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Blog</h3>
    <?php
}
?>
<?php if ($type == 1 + 6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Pengembangan</h3>
    <?php
}
?>
<?php if ($type == 2 + 6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Kerjasama</h3>
    <?php
}
?>
<?php if ($type == 3 + 6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Sponsor dan Pendanaan</h3>
    <?php
}
?>
<form id="do-input-course" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h4 style="margin-top: 0px; padding-top: 0px;">Judul Berita</h4>
    <div class="input-control text span6">
        <input name="title" id="title" type="text" placeholder="Judul Berita" value ="<?php echo $news->title; ?>"/>
        <input name="id" id="id" type="hidden"  value ="<?php echo $news->id_news; ?>"/>

    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Berita</h4>
    <div class="input-control textarea span6">
        <textarea name="news" id="news" placeholder="Berita" style="resize: vertical;"><?php echo $news->news; ?></textarea>
    </div>

    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var type = <?php echo $type; ?>;
    $('#do-input-course').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('news/update_berita'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('news/home') ?>/"+type);
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
</script>