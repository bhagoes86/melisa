<h3 style="padding-top: 0px; margin-top: 0px;">Video & Suara</h3>
<div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
<a class="shortcut bg-color-blueDark" id="insert-video">
    <span class="icon fg-color-white"><i class="icon-film"></i></span>
    <span class="label fg-color-white">Video</span>
</a>
<a class="shortcut bg-color-red" id="insert-youtube">
    <span class="icon  fg-color-white"><i class="icon-youtube"></i></span>
    <span class="label  fg-color-white">Youtube</span>
</a>
<a class="shortcut bg-color-blue" id="insert-vimeo">
    <span class="icon fg-color-white"><i class="icon-vimeo"></i></span>
    <span class="label fg-color-white">Vimeo</span>
</a>
<a class="shortcut bg-color-orangeDark" id="insert-soundcloud">
    <span class="icon fg-color-white"><i class="icon-soundcloud"></i></span>
    <span class="label fg-color-white">Soundcloud</span>
</a>
<h3>Dokumen & Presentasi</h3>
<div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
<a class="shortcut bg-color-green" id="insert-document">
    <span class="icon fg-color-white"><i class="icon-libreoffice"></i></span>
    <span class="label fg-color-white">Dokumen</span>
</a>
<a class="shortcut bg-color-orange" id="insert-slideshare">
    <span class="icon fg-color-white"><i class="icon-file-powerpoint"></i></span>
    <span class="label fg-color-white">Slideshare</span>
</a>
<a class="shortcut bg-color-purple" id="insert-scribd">
    <span class="icon fg-color-white"><i class="icon-file-pdf"></i></span>
    <span class="label fg-color-white">Scribd</span>
</a>
<a class="shortcut bg-color-pink" id="insert-docstoc">
    <span class="icon fg-color-white"><i class="icon-file-word"></i></span>
    <span class="label fg-color-white">Docstoc</span>
</a>
<h3>Tata Tertib Umum</h3>
<div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
<p>
    1. Konten video yang dapat di proses sistem merupakan file dengan format .mp4/.mov<br/>
    2. Konten dokumen yang dapat di proses sistem merupakan file dengan format .pdf<br/>
    3. Konten tautan yang dapat di proses sitem terdapat dari URL konten viewer (cth: www.youtube.com/watch?v=t0krCDFLjdA)<br/>
    4. Tautan yang di dukung sistem (youtube.com, vimeo.com, slideshare.net, scribd.com, docstoc.com, soundcloud.com)<br/>
    5. Konten yang di tambahkan ke dalam sistem akan diverifikasi oleh administrator konten dalam waktu 24 jam.<br/>
    6. Konten yang di tambahkan dapat di hapus oleh administrator tidak dengan pemberitahuan.<br/>
    7. Konten yang di tambahkan dapat di hapus oleh administrator tanpa banding.<br/>
    8. Konten yang di tambahkan dapat di hapus oleh administrator jika mengandung informasi bersifat<br/>
    &nbsp;&nbsp;&nbsp;&nbsp;(SARA, Kekerasan dan Pornografi).<br/>
    9. Legalitas konten menjadi tanggung jawab pengguna.<br/>
    10. Peraturan dapat dirubah kapan saja oleh pengelola menyesuaikan dengan kondisi yang terjadi.
</p>
<script type="text/javascript">
    //insert video
    $('a#insert-video').click(function(){        
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_upload_video') ?>",function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert document
    $('a#insert-document').click(function(){        
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_upload_document') ?>",function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert youtube
    $('a#insert-youtube').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+2,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert vimeo
    $('a#insert-vimeo').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+3,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert scribd
    $('a#insert-scribd').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+4,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert slideshare
    $('a#insert-slideshare').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+5,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert soundcloud
    $('a#insert-soundcloud').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+6,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert docstoc
    $('a#insert-docstoc').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+7,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert proprofs
    $('a#insert-proprofs').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#row-main-content').load("<?php echo site_url('content/form_add_link') ?>/"+8,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
</script>