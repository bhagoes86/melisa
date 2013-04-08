<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="Universitas Padjadjaran MOOC">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="keywords" content="Film Ajar, Media Pembelajaran, Elearning, Video Ajar, MOOC, LMS">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="<?php echo base_url() ?>asset/css/images/logo-vabel.png"/>
        <title><?php echo $katakunci; ?></title>
    </head>
    <?php $this->load->view('home/js'); ?>
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top-->
        <div class="page">
            <?php $this->load->view('search/search_navbar'); ?>
        </div>
        <!--Center-->
        <div class="page" id="page-index">
            <!--Content-->
            <div class="page-region">
                <!--Main Content-->
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" id="row-top-content" style="margin-top: 20px;margin-bottom: 20px;"></div>
                        <div class="row" id="row-main-content">
                            <!--Sidebar Manager-->
                            <div class="span3">
                                <div class="page-sidebar bg-color-red" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;">
                                    <ul>
                                        <li><a id="btn-search-course"><i class="icon-address-book"></i> Kuliah - <?php echo $total_course; ?></a></li>
                                        <li><a id="btn-search-video"><i class="icon-film"></i> Video - <?php echo $total_video; ?></a></li>
                                        <li><a id="btn-search-document"><i class="icon-file"></i> Dokumen - <?php echo $total_document; ?></a></li>
                                        <li><a id="btn-search-presentation"><i class="icon-file-powerpoint"></i> Presentasi - <?php echo $total_presentation; ?></a></li>
                                        <li><a id="btn-search-sound"><i class="icon-playlist"></i> Suara - <?php echo $total_sound; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Konten-->
                            <div class="span9" id="result">
                                <div id="result-course"><?php echo modules::run('search/search_course', $katakunci) ?></div>
                                <div id="result-video" style="display: none;"><?php echo modules::run('search/search_video', $katakunci) ?></div>
                                <div id="result-document" style="display: none;"><?php echo modules::run('search/search_document', $katakunci) ?></div>
                                <div id="result-presentation" style="display: none;"><?php echo modules::run('search/search_presentation', $katakunci) ?></div>
                                <div id="result-sound" style="display: none;"><?php echo modules::run('search/search_sound', $katakunci) ?></div>
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
<script>
    $(document).ready(function(){
        //Home Screen
        $('#row-top-content').load("<?php echo site_url('home/top_noother') ?>");
        
        //filter Search course
        $('#btn-search-course').click(function(){
            $('#result-document').hide('fast');
            $('#result-sound').hide('fast');
            $('#result-presentation').hide('fast');
            $('#result-video').hide('fast');
            $('#result-course').show('fast');
            return false;
        });
        
        //filter Search video
        $('#btn-search-video').click(function(){
            $('#result-course').hide('fast');
            $('#result-document').hide('fast');
            $('#result-sound').hide('fast');
            $('#result-presentation').hide('fast');
            $('#result-video').show('fast');
            return false;
        });
        
        //filter Search Document
        $('#btn-search-document').click(function(){
            $('#result-course').hide('fast');
            $('#result-video').hide('fast');
            $('#result-presentation').hide('fast');
            $('#result-sound').hide('fast');
            $('#result-document').show('fast');
            return false;
        });
        
        //filter Search Presentation
        $('#btn-search-presentation').click(function(){
            $('#result-course').hide('fast');
            $('#result-video').hide('fast');
            $('#result-document').hide('fast');
            $('#result-sound').hide('fast');
            $('#result-presentation').show('fast');
            return false;
        });
        
        //filter Search Presentation
        $('#btn-search-sound').click(function(){
            $('#result-course').hide('fast');
            $('#result-video').hide('fast');
            $('#result-document').hide('fast');
            $('#result-presentation').hide('fast');
            $('#result-sound').show('fast');
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