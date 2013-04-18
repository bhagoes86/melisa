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
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top Navbar-->
        <div class="page" id="topbar"></div>

        <!--Center Content-->
        <div class="page">

            <!--Main Content-->
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 12px;">
                            <div class="row" id="row-top-content" style="margin-top: 20px;margin-bottom: 20px;"></div>
                            <div class="row" id="row-main-content">
                                <div class="span12">
                                    <?php if ($content->show == 0) { ?>
                                        <?php if (!$this->ion_auth->logged_in()) { ?>
                                            <div class="bg-color-red" style="height: 38px;text-align: center;"><h2 class="fg-color-white">Konten Menunggu Proses Verifikasi</h2></div>
                                        <?php } else { ?>
                                            <script src="//connect.soundcloud.com/sdk.js"></script>
                                            <script>
                                                SC.initialize({
                                                    client_id: "938418853596f90572983f377348dc57"
                                                });
                                            </script>
                                            <div id="putTheWidgetHere"></div>
                                            <script type="text/JavaScript">
                                                SC.oEmbed("<?php echo $content->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere"));
                                            </script>
                                        <?php } ?>
                                    <?php } elseif ($content->show == 1) { ?>
                                        <script src="//connect.soundcloud.com/sdk.js"></script>
                                        <script>
                                            SC.initialize({
                                                client_id: "938418853596f90572983f377348dc57"
                                            });
                                        </script>
                                        <div id="putTheWidgetHere"></div>
                                        <script type="text/JavaScript">
                                            SC.oEmbed("<?php echo $content->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere"));
                                        </script>
                                    <?php } ?>
                                    <div id="other-left" class="span6">
                                        <!-- AddThis Button BEGIN -->
                                        <div style="margin-top: 15px;padding:10px 10px 0px 10px;" class="hero-unit">
                                            <div class="addthis_toolbox addthis_default_style">
                                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                                <a class="addthis_button_tweet"></a>
                                                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                                <a class="addthis_button_linkedin_counter"></a>
                                            </div>
                                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                                        </div>
                                        <!-- AddThis Button END -->

                                        <div id="action">
                                            <?php if (!$this->ion_auth->logged_in()) { ?>
                                            <?php } else { ?>
                                                <?php echo modules::run('content/btn_content_bookmark', $content->id_content, 2) ?>
                                            <?php } ?>
                                            <a href="<?php echo $content->file ?>" class="button bg-color-darken fg-color-white"><i class="icon-download"></i> Download</a>
                                        </div>

                                        <h3 style="font-weight: bold;"><?php echo $content->title; ?></h3>
                                        <p id="info-content"><?php echo nl2br($content->description); ?></p>

                                        <div class="span6">
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
                                        </div>
                                    </div>
                                </div>

                                <div id="other-right" class="span6" style="padding-top: 10px;">
                                    <h3 style="padding-top: 0px;margin-top: 0px;font-weight: bold;">Konten Lainnya</h3>
                                    <table id="table-scribd" class="striped bordered">
                                        <?php foreach ($other_content as $row): ?>
                                            <tr>
                                                <td>
                                                    <a style="color: #095b97;font-size: 18px;" href="<?php echo site_url('content/soundcloud' . '/' . $row->id_content) ?>">
                                                        <?php echo $row->title ?>
                                                    </a><br/>
                                                    <p style="color: rgb(94,94,94);font-size: 13px;">
                                                        <?php echo cut_text($row->description, 10) ?>
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>                                 
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
            </div>
            <!--Footer Content-->
            <div class="page" id="footbar"></div>
    </body>
</html>
<script type="text/javascript">        
    $('#topbar').load("<?php echo site_url('site/topbar') ?>");    
    $('#row-top-content').load("<?php echo site_url('home/top') ?>");
    $('#footbar').load("<?php echo site_url('site/footbar') ?>");
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
    $('#show-info-content').click(function(){
        $('#info-content').slideToggle("medium");
        return false;
    });
    $('table#table-soundcloud-other').each(function() {
        var currentPage = 0;
        var numPerPage = 5;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="toolbar"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
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