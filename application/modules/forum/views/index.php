<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <?php echo $this->load->view('forum/head'); ?>
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
                                <div class="page-sidebar bg-color-red" style="margin:0px; padding-bottom: 0px;width:100%;">
                                    <ul>
                                        <li><a id="wall-broadcast"><i class="icon-newspaper"></i> Broadcast</a></li>
                                        <li><a id="wall-content-activity"><i class="icon-clock"></i> Readcast</a></li>                                        
                                    </ul>
                                    <ul>
                                        <li><a id="wall-content-course"><i class="icon-list"></i> Courses</a></li>
                                    </ul>
                                    <ul>
                                        <li><a id="wall-content-podcast"><i class="icon-film"></i> Podcast</a></li>
                                        <li><a id="wall-content-document"><i class="icon-file-pdf"></i> Document</a></li>
                                        <li><a id="wall-content-presentation"><i class="icon-monitor"></i> Presentation</a></li>
                                    </ul>
                                    <ul>
                                        <li><a id="btn-logout"><i class="icon-key"></i> Sign Out</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Konten-->
                            <div class="span7" id="content-right">
                                <?php echo modules::run('forum/wall_form', $user_id) ?>
                                <ul class="listview list-long image" id="wall_container_first"></ul>
                                <ul class="listview list-long image" id="wall_container"></ul>
                                <div class="span7"></div>
                            </div>
                            <!-- Rightbar -->
                            <div class="span3 rightbar">
                                <div id="fixed"><?php echo modules::run('forum/widget_profile') ?></div>
                                <div id="fixed" class="category_time" style="display: none;"></div>
                                <div id="fixed" class="category_faculty" style="display: none;"></div>
                                <div id="fixed"><?php echo modules::run('forum/widget_trending_tag') ?></div>
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
                        <div class="message-dialog bg-color-blueDark fg-color-white"  style="text-align: center;display: none;position: fixed;top: 50%;" id="loading-template">
                            <img style="margin-top: 10px;" src="<?php echo base_url() ?>asset/metro/images/ajax-loader.gif">
                            <p style="margin-top: 10px;" id="message">Loading Data</p>
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
        $('#row-top-content').load("<?php echo site_url('home/top') ?>");
        $('#footbar').load("<?php echo site_url('site/footbar') ?>");
        
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_broadcast_first') ?>",function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        
        $('#wall-broadcast').click(function(){
            $('#after-post').hide();                
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_broadcast_first') ?>",function(){                
                $('#loading-template').fadeOut("slow");
                $('.category_time').hide();
                $('.category_faculty').hide();
            });
        });
        
        $('#wall-content-activity').click(function(){
            $('#after-post').hide();
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('#wall_container').load("<?php echo site_url('forum/wall_content_activity') ?>",function(){                
                $('#loading-template').fadeOut("slow");
                $('.category_time').hide();
                $('.category_faculty').hide();
            });
        });
        
        $('#wall-content-podcast').click(function(){
            $('#after-post').hide();
            $('div.pager').remove();
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('.category_time').load("<?php echo site_url('forum/widget_podcast_meta_time') ?>",function(){$('.category_time').slideDown('slow');});
            $('.category_faculty').load("<?php echo site_url('forum/widget_podcast_meta_faculty') ?>",function(){$('.category_faculty').slideDown('slow');});
            $('#wall_container').load("<?php echo site_url('forum/wall_content_podcast') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-document').click(function(){
            $('#after-post').hide();
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('.category_time').load("<?php echo site_url('forum/widget_document_meta_time') ?>",function(){$('.category_time').slideDown('slow');});
            $('.category_faculty').load("<?php echo site_url('forum/widget_document_meta_faculty') ?>",function(){$('.category_faculty').slideDown('slow');});
            $('#wall_container').load("<?php echo site_url('forum/wall_content_document') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-presentation').click(function(){
            $('#after-post').hide();
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('.category_time').load("<?php echo site_url('forum/widget_presentation_meta_time') ?>",function(){$('.category_time').slideDown('slow');});
            $('.category_faculty').load("<?php echo site_url('forum/widget_presentation_meta_faculty') ?>",function(){$('.category_faculty').slideDown('slow');});
            $('#wall_container').load("<?php echo site_url('forum/wall_content_presentation') ?>",function(){                
                $('#loading-template').fadeOut("slow");
            });
        });
        
        $('#wall-content-course').click(function(){
            $('#after-post').hide();
            $('div.pager').remove();                
            $('#message').html("Loading Data");
            $('#loading-template').show();                
            $('#wall_container').empty();                
            $('.category_time').hide();
            $('.category_faculty').hide();
            $('#wall_container').load("<?php echo site_url('forum/wall_course_limit') ?>",function(){                
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