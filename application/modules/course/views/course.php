<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="<?php echo $course->description ?>">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="title" content="<?php echo $course->course ?>">
        <meta name="keywords" content="<?php echo $course->description ?>">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <title><?php echo $course->course ?></title>
    </head>
    <?php $this->load->view('home/js'); ?>
    <script src="//connect.soundcloud.com/sdk.js"></script>
    <script>
        SC.initialize({
            client_id: "938418853596f90572983f377348dc57"
        });
    </script>
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top Navbar-->
        <div class="page" id="topbar"></div>
        <div class="page">
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" id="row-top-content" style="margin-top: 20px;margin-bottom: 20px;"></div>
                        <div class="row" id="row-main-content">

                            <div class="span12" style="padding: 0px;">
                                <h3 style="margin-top: 0px;font-weight: normal;"><?php echo $course->course ?></h3>                                
                                <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                <div class="span6" style="padding: 0px;margin: 0px;">
                                    <img src="<?php echo base_url() . 'resource/' . $course->picture ?>" style="width: 95%;padding: 0px;margin: 5px 5px 0px 5px;"/>
                                </div>
                                <div class="span6">
                                    <p style="text-align: justify;color: rgb(94,94,94);font-size: 14px;">
                                        <?php echo $course->intkuliah; ?>
                                    </p>             
                                    <div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                        <a class="addthis_button_linkedin_counter"></a>
                                    </div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                                </div>  
                            </div>

                            <div class="span12">
                                <div class="span4">
                                    <h3 style="font-weight: normal;">Ringkasan Kuliah</h3>
                                    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                    <p style="text-align: justify;color: rgb(94,94,94);font-size: 14px;">
                                        <?php echo $course->intkuliah; ?>
                                    </p>                                    
                                </div>
                                <div class="span4">
                                    <h3 style="font-weight: normal;">Yang Harus Saya Ketahui?</h3>
                                    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                    <p style="text-align: justify;color: rgb(94,94,94);font-size: 14px;">
                                        <?php echo $course->pemdasar; ?>
                                    </p>                                    
                                </div>
                                <div class="span4">
                                    <h3 style="font-weight: normal;">Yang Akan Saya Pelajari?</h3>
                                    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                    <p style="text-align: justify;color: rgb(94,94,94);font-size: 14px;">
                                        <?php echo $course->dipelajari; ?>
                                    </p>                                    
                                </div>
                            </div>

                            <div class="span12">
                                <div class="span8" id="learning-content" style="padding-top: 0px;">
                                    <h3 style="padding-top: 0px;margin-top: 0px;font-weight: normal;">Materi</h3>
                                    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                    <iframe style="width: 100%;height: 400px;" src="http://www.youtube.com/embed/ZgqhsgNobiw" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="span4" style="padding-top: 0px;">
                                    <h3 style="padding-top: 0px;margin-top: 0px;font-weight: normal;">Silabus</h3>
                                    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                    <table class="bordered">                                    
                                        <tbody>      
                                            <?php foreach ($silabus as $row): ?>
                                                <tr>
                                                    <td>
                                                        <a id="silabus-get-content" data-id="<?php echo $row->id_silabus; ?>" href="javascript:void(0)" style="cursor: pointer;"><?php echo $row->deskripsi; ?></a>
                                                    </td>
                                                </tr>
                                                <?php echo modules::run('course/show_child', $row->id_silabus, $id) ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="span12">
                                <div class="span8">
                                    <h3 style="margin-top: 0px;font-weight: normal;">Diskusi</h3>  
                                    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                    <div id="disqus_thread">

                                    </div>
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
                                </div>
                                <div class="span4">
                                    <div class="span4">
                                        <h3 style="margin-top: 0px;font-weight: normal;">Evaluasi</h3>
                                        <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                        <div id="list-quiz"></div>
                                    </div>
                                    <div class="span4">
                                        <h3 style="margin-top: 0px;font-weight: normal;">Tugas</h3>
                                        <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
                                        <div id="list-assignment"></div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
            <div class="page" id="footbar"></div>
        </div>
    </body>
</html>
<script type="text/javascript">    
    $('#topbar').load("<?php echo site_url('site/topbar') ?>");    
    $('#row-top-content').load("<?php echo site_url('home/top') ?>");
    $('#footbar').load("<?php echo site_url('site/footbar') ?>");
    
    
    setInterval(function(){
        $('#list-quiz').load('<?php echo site_url('course/list_quiz') . "/$course->id_course"; ?>');
        $('#list-assignment').load('<?php echo site_url('course/list_assignment') . "/$course->id_course"; ?>');
    }, 1000);
    
    $('a#silabus-get-content').click(function(){
        $('#message').html('Mengambil Data');
        $('#loading-template').show();
        var silabus_id = $(this).attr('data-id');
        $('#learning-content').load("<?php echo site_url('course/list_content_by_sylabus') ?>"+"/"+silabus_id,function(){
            $('#loading-template').hide();            
        });
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