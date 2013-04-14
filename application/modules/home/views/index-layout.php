<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <?php $this->load->view('home/head'); ?>
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
                        <div class="row" id="row-main-other"></div>

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
        <div class="page" id="footbar"></div>
    </body>
<div id="fb-root"></div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#topbar').load("<?php echo site_url('site/topbar') ?>");
        $('#footbar').load("<?php echo site_url('site/footbar') ?>");
        
        $('#row-top-content').load("<?php echo site_url('home/top') ?>");
        
        // ini diambil dari template set 'main_content' di controller
        $('#row-main-content').load("<?php echo site_url($main_content); ?>");

        <?php if(isset($main_other) && $main_other): ?>
        // set 'main_other' di controller kalo mau menyisipkan konten di elemen #row-main-other
        //$('#row-main-other').load("<?php echo site_url($main_other); ?>");
        <?php endif; ?>

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
</html>