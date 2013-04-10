<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <?php $this->load->view('home/head'); ?>
    <?php $this->load->view('home/js'); ?>
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
                        <div class="row" id="row-main-content"></div>
                        <div class="row" id="row-main-other">

                            <div class="grid">
                                <div class="row" style="text-align: center;margin-bottom: 22px;">
                                    <h2>~ Kuliah ~</h2>
                                </div>
                            </div>

                            <div class="grid" style="margin-bottom: 20px;">
                                <div class="row" id="course-home"></div>
                            </div>

                            <div class="grid" style="margin-bottom: 30px;">
                                <div class="row" style="text-align: center;">
                                    <a class="button bg-color-grayDark fg-color-white" id="semua-kuliah">Daftar Seluruh Kuliah <i class="icon-list"></i></a>
                                    <script type="text/javascript">
                                        $('#semua-kuliah').click(function(){               
                                            $('#row-main-other').hide();
                                            $('#row-button-other').hide();
                                            $('#message').html("Loading Data");
                                            $('#loading-template').show();
                                            $('#row-main-content').load("<?php echo site_url('course/all_course') ?>",function(){
                                                $('#loading-template').fadeOut("slow");
                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="grid">
                                <div class="row">
                                    <div id="berita" class="span3"></div>
                                    <div id="beasiswa" class="span3"></div>
                                    <div id="fitur" class="span3"></div>
                                    <div id="facebook" class="span3">
                                        <div class="bg-color-blue fg-color-white" style="padding: 1px 1px 1px 10px;margin-bottom: 10px;"><h3><a class="fg-color-white"><i class="icon-thumbs-up"></i> Like Us</a></h3></div>
                                        <div class="row" id="container" style="width:100%;margin-bottom: 10px;margin-top: 10px;">
                                            <div class="span6 fb-like-box" data-width="100%" data-href="http://www.facebook.com/npaperbox" data-height="300" data-show-faces="true" data-stream="false" data-header="false"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid">
                                <div class="span12 bg-color-gray"></div>                                    
                                <div class="row" style="color: #6d6e71;text-decoration: none;font-family: 'sofiapro',Arial,sans-serif;font-size: 14px;margin-right: 15px;">                                    
                                    <a id="sakola_news"  style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/4') ?>">Sakola</a>&nbsp;&nbsp;&nbsp;
                                    <a id="karir_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/5') ?>">Karir</a>&nbsp;&nbsp;&nbsp;
                                    <a id="blog_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/6') ?>">Blog</a>&nbsp;&nbsp;&nbsp;
                                    <a id="pengembangan_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/7') ?>">Pengembang</a>&nbsp;&nbsp;&nbsp;
                                    <a id="kerjasama_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/8') ?>">Kerjasama</a>&nbsp;&nbsp;&nbsp;
                                    <a id="sponsor_news" style="cursor: pointer; text-decoration: none;" href="<?php echo site_url('news' . '/selected_type/9') ?>">Sponsor & Pendanaan</a>&nbsp;&nbsp;&nbsp;
                                </div>

                            </div>
                        </div>

                        <div class="row" id="row-message">
                            <div class="message-dialog bg-color-green fg-color-white" style="display: none;" id="loading-template">
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
                </div>
            </div>
        </div>
        <!--Footer-->
        <div class="page">
            <div class="nav-bar">
                <div class="nav-bar-inner padding10" style="background: rgb(0,64,128);">
                    <span class="element">
                        <a class="fg-color-white" href="<?php echo site_url(); ?>">&copy; <?php echo date('Y'); ?> Sakola.net</a>, Styled with <a class="fg-color-white" href="http://metroui.org.ua">Metro UI CSS</a>
                    </span>
                </div>
            </div>
        </div>
    </body>
</html>
<div id="fb-root"></div>

<script type="text/javascript">
   
                            
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
    
    $(document).ready(function(){
        $('#topbar').load("<?php echo site_url('site/topbar') ?>");
        //Home Screen
        $('#row-top-content').load("<?php echo site_url('home/top') ?>");
        $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
        
        $('#berita').load("<?php echo site_url('news/home_berita') ?>");
        $('#beasiswa').load("<?php echo site_url('news/home_beasiswa') ?>");
        $('#fitur').load("<?php echo site_url('news/home_fitur') ?>");
        
        
        $('#video').load("<?php echo site_url('content/random_video_limit/3') ?>");
        
        $('#course-home').load("<?php echo site_url('course/home_course') ?>");
        
        //Load faculty list
        //$('#menu_bimbel').load("<?php echo site_url('course/menu_bimbel') ?>");
        
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
        
        //Hide Error Messaga
        $('#close-error-message').click(function(){
            $('#error-template').fadeOut("slow");
            return false;
        });
        
        //Hide Info Messaga
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