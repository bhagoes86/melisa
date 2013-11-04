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
                            <div class="span12">
                                <?php if ($content->show == 0) { ?>
                                    <?php if (!$this->ion_auth->logged_in()) { ?>
                                        <div class="bg-color-red" style="height: 38px;text-align: center;"><h2 class="fg-color-white">Konten Sedang Menunggu Verifikasi</h2></div>
                                    <?php } else { ?>
                                        <?php if (!$this->ion_auth->is_admin()) { ?>
                                            <div class="bg-color-red" style="height: 38px;text-align: center;"><h2 class="fg-color-white">Konten Sedang Menunggu Verifikasi</h2></div>
                                        <?php } else { ?>
                                            <div style="background-color: whiteSmoke;
                                                 z-index: 1;
                                                 position: absolute;
                                                 height: 30px;
                                                 width: 30px;
                                                 float: right;
                                                 margin-top: 2px;
                                                 right: 0px;"></div>
                                            <iframe style="width: 100%;height: 100%;border: 0px;" src="http://docs.google.com/viewer?url=<?php echo base_url() . 'resource/' . $content->file . '&embedded=true' ?>"></iframe>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } elseif ($content->show == 1) { ?>
                                    <div style="background-color: whiteSmoke;
                                         z-index: 1;
                                         position: absolute;
                                         height: 30px;
                                         width: 30px;
                                         float: right;
                                         margin-top: 2px;
                                         right: 0px;"></div>
                                    <iframe style="width: 100%;height: 100%;border: 0px;" src="http://docs.google.com/viewer?url=<?php echo base_url() . 'resource/' . $content->file . '&embedded=true' ?>"></iframe>
                                <?php } ?>
                                <div id="other-left" class="span6">
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
                                    <?php //echo modules::run('content/btn_share', site_url('content/document' . '/' . $content->id_content)) ?>
                                </div>
                                <div id="other-right" class="span6" style="padding-top: 10px;">
                                    <table id="table-soundcloud-other">
                                        <?php foreach ($other_content as $row): ?>
                                            <tr>
                                                <td>
                                                    <a style="color: #095b97;font-size: 18px;" href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
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
<script type="text/javascript">        
    $('#topbar').load("<?php echo site_url('site/topbar_nomenu') ?>");
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