<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="title" content="">
        <meta name="keywords" content="">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <title>Virtual Learning</title>
    </head>
    <?php $this->load->view('home/js'); ?>
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top Navbar-->
        <div class="page">
            <?php $this->load->view('course/navbar_course'); ?>
        </div>
        <div class="page">
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 10px;">
                            <!--Course Info-->
                            <div class="span3">
                                <div class="page-sidebar bg-color-red" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;">
                                    <ul>
                                        <li><a id="btn-news"><i class="icon-screen"></i> Berita Terkini</a></li>
                                        <li><a id="btn-beasiswa"><i class="icon-book"></i> Info Beasiswa</a></li>
                                        <li><a id="btn-fitur"><i class="icon-gift"></i> Fitur Terbaru</a></li>
                                        <li><a id="btn-kami"><i class="icon-home"></i> Sakola</a></li>
                                        <li><a id="btn-karir"><i class="icon-user-3"></i> Karir</a></li>
                                        <li><a id="btn-blog"><i class="icon-file"></i> Blog</a></li>
                                        <li><a id="btn-pengembangan"><i class="icon-accessibility"></i> Pengembangan</a></li>
                                        <li><a id="btn-kerjasama"><i class="icon-lab"></i> Kerjasama</a></li>
                                        <li><a id="btn-sponsor"><i class="icon-broadcast"></i> Sponsor & Pendanaan</a></li>
                                    </ul>
                                </div>                           
                            </div>
                            <div class="span9 fright" id="content-right">
                                <div class="span6">
                                    <?php if ($news == NULL) { ?>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() . 'attachment/' . $news->header ?>" style="width: 100%;">
                                    <?php } ?>
                                    <?php if ($news == NULL) { ?>

                                    <?php } else { ?>
                                        <div  style="margin-bottom: 10px;">
                                            <h3><?php echo $news->title ?></h3>
                                        </div>

                                    <?php } ?>

                                    <?php if ($news == NULL) { ?>

                                    <?php } else { ?>
                                        <div  style="margin-bottom: 10px;">
                                            <p><?php echo $news->news ?></p>
                                        </div>


                                    <?php } ?>
                                    <?php
                                    if (($news->attachment_type == 2) || ($news->attachment_type == 3) || ($news->attachment_type == 4) || ($news->attachment_type == 7)) {
                                        echo modules::run('news/youtube_view', $news->attachment);
                                    }

                                    if ($news->attachment_type == 1) {
                                        echo modules::run('news/document_view', $news->attachment);
                                    }

                                    if ($news->attachment_type == 0) {
                                        echo modules::run('news/video_view', $news->attachment, $news->ext);
                                    }

                                    if ($news->attachment_type == 6) {
                                        echo modules::run('news/soundcloud_view', $news->attachment);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--Loading Template-->
                    <div class="message-dialog bg-color-green fg-color-white"  style="display: none;" id="loading-template">
                        <img style="float: left;margin-top: 10px;" src="<?php echo base_url() ?>asset/metro/images/preloader-w8-cycle-black.gif">
                        <p style="float: left;margin-left: 20px;margin-top: 30px;" id="message">Content for message dialog</p>
                    </div>
                    <div class="message-dialog bg-color-red fg-color-white" style="display: none;" id="error-template">
                        <p id="message-error">Content for message dialog</p>
                        <button class="place-right" id="close-error-message">Tutup Pesan</button>
                    </div>
                    <div class="message-dialog bg-color-blue fg-color-white" style="display: none;" id="info-template">
                        <p id="message-info">Content for message dialog</p>
                        <button class="place-right" id="close-info-message">Tutup Pesan</button>
                    </div>
                </div>
            </div>
            <div class="page">
                <div class="nav-bar">
                    <div class="nav-bar-inner padding10">
                        <span class="element">
                            <?php echo date('Y'); ?> <a class="fg-color-white" href="http://github.com/taufiksu/vabel">&copy; MELISA for Universitas Padjadjaran</a>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $('a#btn-news').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+1,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-beasiswa').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+2,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-fitur').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+3,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-kami').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+4,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-karir').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+5,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-blog').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+6,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-pengembangan').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+7,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-kerjasama').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+8,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-sponsor').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/news_management') ?>/"+9,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>