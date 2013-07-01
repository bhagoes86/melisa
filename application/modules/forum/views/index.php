<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title><?php echo $themes->header . " " . $themes->caption ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content=" First Indonesian Massive Online Open Course. Be open minded and share.">
        <meta name="author" content="Taufik Sulaeman, Ridwan Fajar, Imam">
        <meta name="keywords" content="Film Ajar, Media Pembelajaran, Elearning, Video Ajar, MOOC, LMS">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/css/feed.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="<?php echo base_url() ?>asset/css/images/logo-vabel.png"/>
        <!--js Plugin-->
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/assets/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/assets/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/dropdown.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/accordion.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/buttonset.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/carousel.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/pagecontrol.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/rating.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/slider.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/assets/google-analytics.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/datatable/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.paginatetable.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.flexipage.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/sharrre/jquery.sharrre-1.3.4.min.js"></script>
        <script type="text/javascript" src="http://connect.soundcloud.com/sdk.js"></script>
        <script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
        <style type="text/css">
            /* custom player skin */
/*            .flowplayer { background-color: #222; background-size: cover; }
            .flowplayer .fp-controls { background-color: rgba(0, 0, 0, 0.4)}
            .flowplayer .fp-timeline { background-color: rgba(0, 0, 0, 0.5)}
            .flowplayer .fp-progress { background-color: rgba(219, 0, 0, 1)}
            .flowplayer .fp-buffer { background-color: rgba(249, 249, 249, 1)}*/
            /* custom player skin */
            .flowplayer { width: 80%; background-color: #222; background-size: cover; max-width: 800px; }
            .flowplayer .fp-controls { background-color: rgba(0, 0, 0, 0.4)}
            .flowplayer .fp-timeline { background-color: rgba(0, 0, 0, 0.5)}
            .flowplayer .fp-progress { background-color: rgba(219, 0, 0, 1)}
            .flowplayer .fp-buffer { background-color: rgba(249, 249, 249, 1)}
        </style>
    </head>    
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top-->
        <div class="page" id="topbar"></div>
        <!--Center-->
        <div class="page" id="page-index">
            <!--Content-->
            <div class="page-region">
                <!--Main Content-->
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" id="row-top-content" style="margin-top: 20px;margin-bottom: 20px;"></div>
                        <div class="row" id="row-main-content" style="margin-top: 0px;padding-top: 0px;">
                            <!--Sidebar -->
                            <div class="span2 leftbar">
                                <?php if ($content->profic == '') { ?>
                                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="" style="padding: 0px;margin-top: 0px;width: 100%;"/>
                                <?php } else { ?>
                                    <?php
                                    $profpic = 'resource/' . $content->profic;
                                    if (file_exists($profpic)) {
                                        ?>
                                        <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding: 0px;margin-top: 0px;width: 100%;"/>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="" style="padding: 0px;margin-top: 0px;width: 100%;"/>
                                    <?php } ?>
                                <?php } ?>
                                <div class="page-sidebar bg-color-red" style="margin:0px; padding-bottom: 0px;width:140px;">
                                    <ul>
                                        <li><a id="wall-broadcast"><i class="icon-broadcast"></i> Broadcast</a></li>
                                        <li><a id="wall-content-activity"><i class="icon-clock"></i> Aktivitas</a></li>                                        
                                    </ul>
                                    <ul>
                                        <li><a id="wall-content-podcast"><i class="icon-film"></i> Podcast</a></li>
                                        <li><a id="wall-content-document"><i class="icon-file-pdf"></i> Document</a></li>
                                        <li><a id="wall-content-presentation"><i class="icon-monitor"></i> Presentasi</a></li>
                                    </ul>
                                    <ul>
                                        <li><a id="wall-content-bookmark"><i class="icon-bookmark-4"></i> Lihat Nanti</a></li>
                                        <li><a id="wall-content-log"><i class="icon-history"></i> Penelusuran</a></li>
                                        <li><a id="wall-content-search"><i class="icon-search"></i> Pencarian</a></li>
                                    </ul>
                                    <ul>
                                        <li><a id="btn-logout"><i class="icon-key"></i> Keluar</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Konten-->
                            <div class="span7" id="content-right">
                                <?php echo modules::run('forum/wall_form', $user_id) ?>
                                <ul class="listview list-long image" id="wall_container_first"></ul>
                                <ul class="listview list-long image" id="wall_container"></ul>
                                <div class="span7">

                                </div>
                            </div>
                            <!-- Rightbar -->
                            <div class="span3 rightbar">
                                <div id="fixed">
                                    <?php echo modules::run('forum/widget_profile') ?>
                                    <?php echo modules::run('forum/widget_trending_tag') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="row-main-other">
                            <div class="grid">
                                <div class="span12 bg-color-gray"></div>                                    
                                <div class="row" style="color: #004444;text-decoration: none;font-family: 'sofiapro',Arial,sans-serif;font-size: 14px;margin-right: 15px;">                                    
                                    <a id="sakola_news"  style="color: #004444;cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/4') ?>">Tentang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="karir_news" style="color: #004444;cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/5') ?>">Karir</a>&nbsp;&nbsp;&nbsp;
                                    <a id="blog_news" style="color: #004444;cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/6') ?>">Blog</a>&nbsp;&nbsp;&nbsp;
                                    <a id="pengembangan_news" style="color: #004444;cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/7') ?>">Pengembang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="kerjasama_news" style="color: #004444;cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/8') ?>">Kerjasama</a>&nbsp;&nbsp;&nbsp;
                                    <a id="sponsor_news" style="color: #004444;cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/9') ?>">Sponsor & Pendanaan</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>


                        <!--Loading Template-->
                        <div class="message-dialog bg-color-green fg-color-white"  style="display: none;position: fixed;top: 50%;" id="loading-template">
                            <img style="float: left;margin-top: 10px;" src="<?php echo base_url() ?>asset/metro/images/preloader-w8-cycle-black.gif">
                            <p style="float: left;margin-left: 20px;margin-top: 30px;" id="message">Content for message dialog</p>
                        </div>
                        <div class="message-dialog bg-color-red fg-color-white" style="display: none;position: fixed;top: 50%;" id="error-template">
                            <p id="message-error">Content for message dialog</p>
                            <button class="place-right" id="close-error-message">Tutup Pesan</button>
                        </div>
                        <div class="message-dialog bg-color-blue fg-color-white" style="display: none;position: fixed;top: 50%;" id="info-template">
                            <p id="message-info">Content for message dialog</p>
                            <button class="place-right" id="close-info-message">Tutup Pesan</button>
                        </div>
                        <!--EOF Loading Template-->
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->
        <div class="page" id="footbar"></div>
    </body>
</html>
<div id="fb-root"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#wall_container').load("<?php echo site_url('forum/wall_broadcast_first') ?>");
        
        $('#topbar').load("<?php echo site_url('site/topbar') ?>");
        $('#footbar').load("<?php echo site_url('site/footbar') ?>");
        $('#row-top-content').load("<?php echo site_url('home/top') ?>");
        
        $('#wall-broadcast').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_broadcast_first') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-activity').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_activity') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-podcast').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_podcast') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-document').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_document') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-presentation').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_presentation') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-log').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_log') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-bookmark').click(function(){
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_bookmark') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#btn-logout').click(function(){        
            $('#message').html("Keluar Dari Sistem");
            $('#loading-template').show();
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('authz/logout') ?>",
                data:$(this).serialize(),
                success:function (data) {
                    $('#row-top-content').load("<?php echo site_url('home/top') ?>");
                    $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
                    $('#row-main-other').show();
                    $('#loading-template').fadeOut("slow");
                },
                error:function (data){
                    $('#row-top-content').load("<?php echo site_url('home/top') ?>");
                    $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
                    $('#row-main-other').show();
                    $('#loading-template').fadeOut("slow");
                }
            });
            return false;
        });
                
        $('.comments li').live('mouseover', function(){
            $(this).children().children('.delete-comment').removeClass('hide');
        });
        $('.comments li').live('mouseout', function(){
            $(this).children().children('.delete-comment').addClass('hide');
        });

        $('a#btn-welcome').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-center-content').load("<?php echo site_url('home/welcome'); ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
            return false;
        });

        $('#btn-login').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();            
            $('#row-center-content').load("<?php echo site_url('authz/login'); ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
            return false;
        });
        
        //Hide Error Message
        $('#close-error-message').click(function(){
            $('#error-template').fadeOut("slow");
            return false;
        });
        
        //Hide Info Message
        $('#close-info-message').click(function(){
            $('#info-template').fadeOut("slow");
            return false;
        });
        
    });
    
    //Google Analytic
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31205461-3']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();    
</script>