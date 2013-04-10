<div class="grid" style="margin-bottom: 20px;">
    <div class="row">
        <div style="padding: 1px 1px 1px 10px;background-color: rgb(255,191,0);">
            <h3 class="fg-color-darken"><i class="icon-comments-4"></i>&nbsp;Ayo Belajar rame-rame, Rame-rame belajar.</h3>
        </div>
    </div>
</div>

<div class="grid">
    <div class="row">
        <div class="span4" style="text-align: center;">
            <div style="height: 220px">
                <img src="<?php echo base_url() ?>asset/css/images/learn_landing_new.png"/>
            </div>
            <div class="hero-unit">
                "Sukses Itu Cerdas Dan Berakhlaq Baik"
            </div>
        </div>
        <div class="span4" style="text-align: center;">
            <div style="height: 220px">
                <img src="<?php echo base_url() ?>asset/css/images/explore_pages_new.png"/>
            </div>
            <div class="hero-unit">
                "Berani Mempelajari Hal Baru"
            </div>
        </div>
        <div class="span4" style="text-align: center;">
            <div style="height: 220px">
                <img src="<?php echo base_url() ?>asset/css/images/teach_pages_new.png"/>
            </div>
            <div class="hero-unit">
                "Saling Asah, Asih Dan Asuh"
            </div>
        </div>
    </div>
</div>

<div class="grid">
    <div class="row" style="text-align: center;">
        <h2>~ ing ngarso sung tulodo, ing madyo mangun karso, tut wuri handayani ~</h2>
    </div>
</div>

<div style="margin-top: 27px;">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/carousel.js"></script>
    <div class="span7">
        <div class="hero-unit">
            <div id="carousel1" class="carousel" data-role="carousel" data-param-duration="300">
                <div class="slides">

                    <div class="slide" id="slide1">
                        <h2>Mudah, Elegan dan Modern</h2>
                        <a class="shortcut bg-color-blue" id="insert-video">
                            <span class="icon fg-color-white"><i class="icon-mouse"></i></span>
                            <span class="label fg-color-white">Click</span>
                        </a>
                        <a class="shortcut bg-color-orangeDark" id="insert-video">
                            <span class="icon fg-color-white"><i class="icon-share-2"></i></span>
                            <span class="label fg-color-white">Share</span>
                        </a>
                        <a class="shortcut bg-color-red" id="insert-video">
                            <span class="icon fg-color-white"><i class="icon-play-alt"></i></span>
                            <span class="label fg-color-white">Play</span>
                        </a>
                        <h3>Bergabunglah bersama komunitas sakola! 
                            <?php if (!$this->ion_auth->logged_in()) { ?>
                                <a class="bg-color-blue fg-color-white button" id="btn-registrasi-home">KLIK DISINI <i class="icon-enter"></i></a></h3>
                        <?php } else { ?>
                        <?php } ?>
                    </div>

                    <div class="slide" id="slide2">
                        <h2 class="fg-color-darken">Beragam Dukungan</h2>
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
                        <a class="shortcut bg-color-green" id="insert-document">
                            <span class="icon fg-color-white"><i class="icon-libreoffice"></i></span>
                            <span class="label fg-color-white">Document</span>
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
                        <a class="shortcut bg-color-orangeDark" id="insert-soundcloud">
                            <span class="icon fg-color-white"><i class="icon-soundcloud"></i></span>
                            <span class="label fg-color-white">Soundcloud</span>
                        </a>
                    </div>

                </div>
                <span class="control left"><i class="icon-arrow-left-3"></i></span>
                <span class="control right"><i class="icon-arrow-right-3"></i></span>
            </div>
        </div>
    </div>
    <div class="span5">
        <iframe style="width: 100%;height: 301px;" src="http://www.youtube.com/embed/eW3gMGqcZQc" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<script type="text/javascript">
    $('a#btn-registrasi-home').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('authz/register') ?>/",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>