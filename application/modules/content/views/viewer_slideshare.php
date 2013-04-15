<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="<?php echo $content->description; ?>">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="title" content="<?php echo $content->title; ?>">
        <meta name="keywords" content="<?php echo $content->title; ?>">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <title><?php echo $content->title; ?></title>
    </head>
    <?php $this->load->view('home/js'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#topbar').load("<?php echo site_url('site/topbar_nomenu') ?>");
            $('#footbar').load("<?php echo site_url('site/footbar') ?>");
        });
    </script>    
    <script type="text/javascript" src="<?php echo base_url() ?>asset/slideshare/swfobject.js"></script>    
    <script type="text/javascript">    
        var flashMovie;

        //Load the flash player. Properties for the player can be changed here.
        function loadPlayer() {
            //allowScriptAccess from other domains
            var params = { allowScriptAccess: "always" };
            var atts = { id: "player" };

            //doc: The path of the file to be used
            //startSlide: The number of the slide to start from
            //rel: Whether to show a screen with related slideshows at the end or not. 0 means false and 1 is true..
            var flashvars = { doc : "<?php print_r($presentation['3']) ?>", startSlide : 1, rel : 0 };

            //Generate the embed SWF file
            swfobject.embedSWF("http://static.slidesharecdn.com/swf/ssplayer2.swf", "player", "100%", "560", "8", null, flashvars, params, atts);

            //Get a reference to the player
            flashMovie = document.getElementById("player");
        }

        //Jump to the appropriate slide
        function jumpTo(){
            flashMovie.jumpTo(parseInt(document.getElementById("slidenumber").value));
        }

        //Update the slide number in the field for the same
        function updateSlideNumber(){
            document.getElementById("slidenumber").value = flashMovie.getCurrentSlide();
        }
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
    <body class="modern-ui" onload="prettyPrint();loadPlayer();">
        <!--Top Navbar-->
        <div class="page" id="topbar"></div>
        <!--Center Content-->
        <div class="page">

            <!--Main Content-->
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 12px;">
                            <div class="span9">
                                <?php if ($content->show == 0) { ?>
                                    <?php if (!$this->ion_auth->logged_in()) { ?>
                                        <div class="bg-color-red" style="height: 38px;text-align: center;"><h2 class="fg-color-white">Konten Menunggu Proses Verifikasi</h2></div>
                                    <?php } else { ?>
                                        <?php if (!$this->ion_auth->is_admin()) { ?>
                                            <div class="bg-color-red" style="height: 38px;text-align: center;"><h2 class="fg-color-white">Konten Menunggu Proses Verifikasi</h2></div>
                                        <?php } else { ?>
                                            <div id="player" style="background: #e5e5e5;">You need Flash player 8+ and JavaScript enabled to view this video.</div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } elseif ($content->show == 1) { ?>
                                    <div id="player" style="background: #e5e5e5; height:38px">You need Flash player 8+ and JavaScript enabled to view this video.</div>
                                <?php } ?>
                                <div id="action">
                                    <?php if (!$this->ion_auth->logged_in()) { ?>
                                    <?php } else { ?>
                                        <?php echo modules::run('content/btn_content_bookmark', $content->id_content, 2) ?>
                                    <?php } ?>
                                    <a href="<?php echo $content->file ?>" class="button bg-color-darken fg-color-white"><i class="icon-link"></i> Buka Tautan</a>
                                </div>
                                <h2><?php echo $content->title; ?></h2>
                                <p id="info-content"><?php echo nl2br($content->description); ?></p>
                                <div id="disqus_thread"></div>
                                <script type="text/javascript">
                                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                    var disqus_shortname = 'sakoladotnet'; // required: replace example with your forum shortname

                                    /* * * DON'T EDIT BELOW THIS LINE * * */
                                    (function() {
                                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                                <?php //echo modules::run('content/btn_share', site_url('content/slideshare' . '/' . $content->id_content)) ?>
                            </div>
                            <div class="span3">
                                <div class="image-container bg-color-darken place-right" style="margin-right: 0px;">
                                    <?php if ($content->type == 0) { ?><!--Video-->
                                        <a href="<?php echo site_url('content/video' . '/' . $content->id_content) ?>"  target="_blank" >
                                            <img src="<?php echo base_url() . 'resource/' . $content->id_content . '.jpg' ?>" style="height: 118px;"/>
                                        </a>
                                    <?php } elseif ($content->type == 2) { ?><!--Youtube-->
                                        <?php
                                        $media = analyze_media($content->file);
                                        $extract_id = explode('^^^', $media);
                                        ?>
                                        <a href="<?php echo site_url('content/youtube' . '/' . $content->id_content) ?>"  target="_blank" >
                                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="height: 118px">
                                        </a>
                                    <?php } elseif ($content->type == 3) { ?><!--Vimeo-->
                                        ;)
                                    <?php } ?>
                                    <div class="overlay" target="_blank" style="font-size: 16px;line-height: 23px;">
                                        Sedang diputar
                                        <a class="fg-color-white" href="<?php echo site_url('content/video' . '/' . $content->id_content) ?>">
                                            <?php echo $content->title; ?>
                                        </a>
                                    </div>
                                </div>
                                <div id="list-video"></div>
                            </div>       
                        </div>
                    </div>
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
        <!--Footer Content-->
        <div class="page" id="footbar"></div>
    </body>
</html>