<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <?php $this->load->view('home/head'); ?>    
    <link href="<?php echo base_url(); ?>asset/metro/css/feed.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.flexipage.min.js"></script>
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
                                        <li><a id=""><i class="icon-film"></i> Podcast</a></li>
                                        <li><a id=""><i class="icon-file-pdf"></i> Document</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Konten-->
                            <div class="span7" id="content-right">
                                <?php echo $this->load->view('forum/wall_form') ?>
                                <ul class="listview list-long image" id="wall_container"></ul>
                            </div>
                            <!-- Rightbar -->
                            <div class="span3 rightbar">
                                <div id="fixed"></div>
                            </div>
                        </div>

                        <div class="row" id="row-main-other">
                            <div class="grid">
                                <div class="span12 bg-color-gray"></div>                                    
                                <div class="row" style="color: #6d6e71;text-decoration: none;font-family: 'sofiapro',Arial,sans-serif;font-size: 14px;margin-right: 15px;">                                    
                                    <a id="sakola_news"  style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/4') ?>">Tentang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="karir_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/5') ?>">Karir</a>&nbsp;&nbsp;&nbsp;
                                    <a id="blog_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/6') ?>">Blog</a>&nbsp;&nbsp;&nbsp;
                                    <a id="pengembangan_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/7') ?>">Pengembang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="kerjasama_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/8') ?>">Kerjasama</a>&nbsp;&nbsp;&nbsp;
                                    <a id="sponsor_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/9') ?>">Sponsor & Pendanaan</a>&nbsp;&nbsp;&nbsp;
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
        $('#topbar').load("<?php echo site_url('site/topbar') ?>");
        $('#footbar').load("<?php echo site_url('site/footbar') ?>");
        
        $('#wall_container').load("<?php echo site_url('content/wall_podcast') ?>");
        
        $('#row-top-content').load("<?php echo site_url('home/top') ?>");
        
        $('.hide-link').live('click', function(){
            $this = $(this);
            $this.html('tutup detail.').removeClass('hide-link').addClass('show-link');
            $this.siblings('.hide').removeClass('hide').addClass('show');
        });
        $('.show-link').live('click', function(){
            $this = $(this);
            $this.html('selengkapnya..').removeClass('show-link').addClass('hide-link');
            $this.siblings('.show').removeClass('show').addClass('hide');
        });
        $('#feedtext').live('click', function(){
            $(this).parent().addClass('hide');
            $('#feedpost').parent().removeClass('hide');
            $('#feedpost').focus();
        });
        $('#cancelpost').live('click', function(){
            $('#feedtext').parent().removeClass('hide');
            $('#feedpost').parent().addClass('hide');
            $('#postimage, #posturl').addClass('hide').val('');
        });
        $('.btn-shortcut').live('click', function(){
            $this = $(this);
            if($this.attr('id') == 'image'){
                $('#postimage').removeClass('hide').val('');
                $('#posturl').addClass('hide').val('');
            } else {
                $('#postimage').addClass('hide').val('');
                $('#posturl').removeClass('hide').val('').attr('placeholder', 'Tautan alamat ' + $this.attr('id'));
            }
            return false;
        });
        $('.comments li').live('mouseover', function(){
            $(this).children().children('.delete-comment').removeClass('hide');
        });
        $('.comments li').live('mouseout', function(){
            $(this).children().children('.delete-comment').addClass('hide');
        });

        //Load page welcome
        $('a#btn-welcome').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-center-content').load("<?php echo site_url('home/welcome'); ?>",function(){
                $('#loading-template').fadeOut("slow");
            });
            return false;
        });

        //Show Login Form
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
    
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=240447809341438";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
 
    $(window).bind("load resize", function(){    
        var container_width = $('#container').width();    
        $('#container').html('<div class="fb-like-box" ' + 
            'data-href="https://www.facebook.com/npaperbox"' +
            ' data-width="' + container_width + '" data-height="300" data-show-faces="true" ' +
            'data-stream="false" data-header="false"></div>');
        FB.XFBML.parse( );    
    }); 
</script>