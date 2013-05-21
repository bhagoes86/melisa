<a class="button bg-color-green fg-color-white" id="back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali</a>
<?php if ($type == 1) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Berita</h3>
    <?php 
}
?>
<?php if ($type == 2) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Beasiswa</h3>
<?php
}
?>
<?php if ($type == 3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Fitur</h3>
<?php
}
?>
    <?php if ($type == 1+3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Sakola</h3>
    <?php 
}
?>
<?php if ($type == 2+3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Karir</h3>
<?php
}
?>
<?php if ($type == 3+3) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Blog</h3>
<?php
}
?>
    <?php if ($type == 1+6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Pengembangan</h3>
    <?php 
}
?>
<?php if ($type == 2+6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Kerjasama</h3>
<?php
}
?>
<?php if ($type == 3+6) {
    ?>
    <h3 style="margin-top: 0px; padding-top: 0px;">Upload Header Sponsor dan Pendanaan</h3>
<?php
}
?>
<form id="do-upload-header" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control file">
        <label>Pilih Gambar JPEG/PNG Ukuran OptimalLebar 280px dan Tinggi 158px</label><br/>
        <input type="file" name="userfile" id="picture"/>
    </div>
    <input type="submit" value="Upload"/>

</form>
<!-- Script -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>
<script type="text/javascript">
    var id_news = <?php echo $id; ?>;
    var type = <?php echo $type?>;
    $('#do-upload-header').submit(function(){
        $('#message').html('Upload header');
        $('#loading-template').show();
        
        var picture = $('#picture').val();
        //validasi
        if(picture == ''){
            $('#loading-template').hide();
            alert('Pilih File Gambar');
            return false;    
        }
        
        $.ajaxFileUpload({
            
            url:"<?php echo site_url('news/upload_header'); ?>/"+id_news,
            secureuri:false,
            fileElementId:'picture',
            dataType:'json',
            data:{picture:picture
            },
            success: function (data, status)
            {
                $('#content-right').load("<?php echo site_url('news/home') ?>/"+type,function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                alert('Proses gagal!');
            }
        });
        return false; 
    });
    $('a#back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+type,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>