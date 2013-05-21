<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<?php if ($type == 1) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Berita</h3>
    <?php 
}
?>
<?php if ($type == 2) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Beasiswa</h3>
<?php
}
?>
<?php if ($type == 3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Fitur</h3>
<?php
}
?>
<?php if ($type == 1+3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Sakola</h3>
    <?php 
}
?>
<?php if ($type == 2+3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Karir</h3>
<?php
}
?>
<?php if ($type == 3+3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Blog</h3>
<?php
}
?>
    <?php if ($type == 1+6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Pengembangan</h3>
    <?php 
}
?>
<?php if ($type == 2+6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Kerjasama</h3>
<?php
}
?>
<?php if ($type == 3+6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Formulir Tambah Sponsor dan Pendanaan</h3>
<?php
}
?>

<form id="do-input-course" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control text span6">
        <input name="title" id="title" type="text" placeholder="Judul Berita"/>
        <button class="helper"></button>
    </div>
    <div class="input-control textarea span6">
        <textarea name="news" id="news" placeholder="Berita" style="resize: vertical;"></textarea>
    </div>
    
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var type = <?php echo $type;?>;
    $('#do-input-course').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('news/insert_berita'); ?>/"+type,
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