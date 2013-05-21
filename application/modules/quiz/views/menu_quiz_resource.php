<a class="button bg-color-green fg-color-white" id="quiz-back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali ke Kuis</a>
<a class="button bg-color-yellow" id="quiz-add-form"><i class="icon-plus"></i>Tambah Konten</a>
<a class="button bg-color-blue fg-color-white" id="quiz-browse-quiz-resource"><i class="icon-plus"></i>Lihat Konten</a>

<hr />

<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/pagecontrol.js"></script>

<br>

<div class="span8">
    <div id="list-quiz-resource-area"></div>
    
    <div id="menu-quiz-resource-area">
    <div class="page-control" data-role="page-control">
        <ul>
            <li class="active"><a href="#menu-resource">Menu Konten</a></li>
            <li><a href="#tata-tertib">Tata Tertib Umum</a></li>
            
        </ul>

        <div class="frames">
            <div class="frame " id="tata-tertib">
                <h2>Tata Tertib Umum</h2>
                <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>

                <p>
                    1. Konten video yang dapat di proses sistem merupakan file dengan format .mp4/.mov<br/>
                    2. Konten dokumen yang dapat di proses sistem merupakan file dengan format .pdf<br/>
                    3. Konten tautan yang dapat di proses sitem terdapat dari URL konten viewer (cth: www.youtube.com/watch?v=t0krCDFLjdA)<br/>
                    4. Tautan yang di dukung sistem (youtube.com, vimeo.com, slideshare.net, scribd.com, docstoc.com, soundcloud.com)<br/>
                    5. Konten yang di tambahkan ke dalam sistem akan diverifikasi oleh administrator konten dalam waktu 24 jam.<br/>
                    6. Konten yang di tambahkan dapat di hapus oleh administrator tidak dengan pemberitahuan.<br/>
                    7. Konten yang di tambahkan dapat di hapus oleh administrator tanpa banding.<br/>
                    8. Konten yang di tambahkan dapat di jika mengandung informasi bersifat (SARA, Kekerasan dan Pornografi).<br/>
                    9. Legalitas konten menjadi tanggung jawab pengguna.<br/>
                    10. Peraturan dapat dirubah kapan saja oleh pengelola menyesuaikan dengan kondisi yang terjadi.
                </p>
            </div>
            <div class="frame active" id="menu-resource">
                <h4 style="margin-top: 0px; padding-top: 0px;">File Anda</h4>
                <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                <a class="shortcut bg-color-blueDark" id="insert-video">
                    <span class="icon fg-color-white"><i class="icon-film"></i></span>
                    <span class="label fg-color-white">Video</span>
                </a>
                <a class="shortcut bg-color-darken" id="insert-mic">
                    <span class="icon fg-color-white"><i class="icon-mic"></i></span>
                    <span class="label fg-color-white">Suara</span>
                </a>
                <a class="shortcut bg-color-green" id="insert-document">
                    <span class="icon fg-color-white"><i class="icon-libreoffice"></i></span>
                    <span class="label fg-color-white">Dokumen</span>
                </a>
                <a class="shortcut bg-color-yellow" id="insert-picture">
                    <span class="icon fg-color-white"><i class="icon-pictures"></i></span>
                    <span class="label fg-color-white">Gambar</span>
                </a>
                
                <h4 style="margin-top: 0px; padding-top: 0px;">Online Media</h4>
                <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>

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
                
                <h4 style="margin-top: 0px; padding-top: 0px;">Online Document</h4>
                <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>

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
                
                
            </div>

        </div>
    </div>
    </div>
</div>


<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

<script type="text/javascript">

    $('#list-quiz-resource-area').load("<?php echo site_url('quiz/list_all_quiz_resource') ?>",function(){
        $('#list-quiz-resource-area').hide();
    });

    //insert video
    $('a#insert-video').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_upload_quiz_video') ?>",function(){
            $('#loading-template').fadeOut('slow');
        });
        
        return false;
    });

    $('a#insert-picture').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_upload_quiz_picture') ?>",function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    
    //insert document
    $('a#insert-document').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_upload_quiz_document') ?>",function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });

    //insert document
    $('a#insert-mic').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_upload_quiz_voice') ?>",function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });

    
    //insert youtube
    $('a#insert-youtube').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_quiz_embed_link') ?>/"+2,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert vimeo
    $('a#insert-vimeo').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_quiz_embed_link') ?>/"+3,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert scribd
    $('a#insert-scribd').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_quiz_embed_link') ?>/"+4,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert slideshare
    $('a#insert-slideshare').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_quiz_embed_link') ?>/"+5,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert soundcloud
    $('a#insert-soundcloud').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_quiz_embed_link') ?>/"+6,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });
    //insert docstoc
    $('a#insert-docstoc').click(function(){
        $('#loading-template').show();
        $('#message').html("Memuat Halaman");
        $('#content-right').load("<?php echo site_url('quiz/show_form_quiz_embed_link') ?>/"+7,function(){
            $('#loading-template').fadeOut('slow');
        });
        return false;
    });

    $('#cancel-confirm-message').click(function(){
            $('#confirm-template').fadeOut("medium");
    });


    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda yakin akan menghapus kuis ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });

    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#quiz-browse-quiz-resource').click(function(){
        $('#menu-quiz-resource-area').slideUp();
        $('#list-quiz-resource-area').slideDown();
    });

    $('a#quiz-add-form').click(function(){
        $('#list-quiz-resource-area').slideUp();
        $('#menu-quiz-resource-area').slideDown();
        
    });
</script>