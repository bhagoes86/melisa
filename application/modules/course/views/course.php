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
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top Navbar-->
        <div class="page" id="topbar"></div>
        <div class="page">
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 10px;">
                            <!--Course Info-->
                            <div class="span5">
                                <img src="<?php echo base_url() . 'resource/' . $course->picture ?>" style="width: 100%;"/>
                                <a style="text-align: justify;color: #095b97;font-size: 18px;"><?php echo $course->course ?></a><br/>
                                <p style="text-align: justify;color: rgb(94,94,94);font-size: 14px;"><?php echo nl2br($course->description) ?></p>

                                <!--Quiz List-->
                                <div class="bg-color-green" style="margin-top: 10px;margin-bottom: 10px;text-align: center;">
                                    <a class="fg-color-white">&nbsp;EVALUASI</a>
                                </div>
                                <div id="list-quiz"></div>

                                <div class="bg-color-pink" style="margin-bottom: 10px;text-align: center;">
                                    <a class="fg-color-white">&nbsp;PENGAJAR</a>
                                </div>

                                <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;">
                                    <?php echo nl2br($pendidikan->information); ?><br/>
                                    <?php echo nl2br($profil->information); ?>
                                </p>
                                <div class="page-control" data-role="page-control">
                                    <ul>
                                        <li class="active"><a href="#pengajaran">Mengajar</a></li>
                                        <li><a href="#riset">Riset</a></li>
                                        <li><a href="#publikasi">Publikasi</a></li>
                                        <li><a href="#pengalaman">Pengalaman</a></li>
                                    </ul>
                                    <div class="frames">
                                        <div class="frame " id="pengajaran">
                                            <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;"><?php echo nl2br($pengajaran->information); ?></p>
                                        </div>
                                        <div class="frame " id="riset">
                                            <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;"><?php echo nl2br($riset->information); ?></p>
                                        </div>
                                        <div class="frame " id="publikasi">
                                            <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;"><?php echo nl2br($publikasi->information); ?></p>
                                        </div>
                                        <div class="frame " id="pengalaman">
                                            <p style="margin-top: 0px; padding-top: 0px;color: rgb(94,94,94);font-size: 14px;"><?php echo nl2br($pengalaman->information); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="span7">
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th><b>Topik</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>      
                                        <?php foreach ($silabus_parent as $row): ?>
                                            <tr>
                                                <td>
                                                    <a style="cursor: pointer;"><?php echo $row->deskripsi; ?></a>
                                                </td>
                                            </tr>
                                            <?php echo modules::run('course/show_child', $row->id_silabus, $id) ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <form class="span7" style="float: right;margin-right: 0px;padding-right: 0px;margin-bottom: 0px;">
                                    <div class="input-control text">
                                        <input type="text" id="kwd_search" placeholder="Cari Materi Video">
                                    </div>
                                </form>

                                <div class="clearfix"></div>
                                <table class="striped" id="my-table">
                                    <tbody>
                                        <?php foreach ($video as $row): ?>
                                            <tr>
                                                <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                                                    <?php if ($row->type == 0) { ?><!--Video-->
                                                        <?php if ($row->cover == 0) { ?>
                                                            Gambar Kosong
                                                        <?php } else { ?>
                                                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>"  target="_blank" >
                                                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: top;"/>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                                                        <?php
                                                        $media = analyze_media($row->file);
                                                        $extract_id = explode('^^^', $media);
                                                        ?>
                                                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>"  target="_blank" >
                                                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: top;">
                                                        </a>
                                                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                                                        <?php $media = vimeo_cover($row->file); ?>
                                                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>"  target="_blank" >
                                                            <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;">
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                                                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                                                    <p style="color: rgb(94,94,94);font-size: 13px;">
                                                        <?php echo nicetime(dtm2timestamp($row->date)) ?>
                                                        <br/>
                                                        Deskripsi : <?php echo cut_text($row->description, 15) . '...' ?>
                                                    </p>                    
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <form class="span7" style="float: right;margin-right: 0px;padding-right: 0px;margin-bottom: 0px;">
                                    <div class="input-control text">
                                        <input type="text" id="kwd_search_document" placeholder="Cari Materi Dokumen">
                                    </div>
                                </form>
                                <table class="striped table-document" id="my-table">
                                    <tbody>
                                        <?php foreach ($document as $row): ?>
                                            <tr>
                                                <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                                                    <?php if ($row->type == 0) { ?><!--Video-->
                                                        <?php if ($row->cover == 0) { ?>
                                                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                                                <i class="icon-file" style="font-size: 45px;"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } elseif ($row->type == 1) { ?><!--Document-->
                                                        <?php if ($row->cover == 0) { ?>
                                                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                                                <i class="icon-file" style="font-size: 45px;"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                                                        <?php
                                                        $media = analyze_media($row->file);
                                                        $extract_id = explode('^^^', $media);
                                                        ?>
                                                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>">
                                                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: middle;">
                                                        </a>
                                                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                                                        <?php $media = vimeo_cover($row->file); ?>
                                                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>">
                                                            <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;">
                                                        </a>
                                                    <?php } elseif ($row->type == 4) { ?><!--Scribd-->
                                                        <a href="<?php echo site_url('content/scribd' . '/' . $row->id_content) ?>">
                                                            <i class="icon-file" style="font-size: 45px;"></i>
                                                        </a>
                                                    <?php } elseif ($row->type == 5) { ?><!--Slideshare-->
                                                        <?php
                                                        $media = analyze_media($row->file);
                                                        $extract_id = explode('^^^', $media);
                                                        $url = $extract_id[1];
                                                        $thumb = explode("/", slideshare_cover($url)->thumbnail);
                                                        $thumbnail = slideshare_cover($url)->thumbnail;
                                                        ?>
                                                        <a href="<?php echo site_url('content/slideshare' . '/' . $row->id_content) ?>">
                                                            <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;height: 123px;vertical-align: middle;">
                                                        </a>
                                                    <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                                                        <a href="<?php echo site_url('content/soundcloud' . '/' . $row->id_content) ?>">
                                                            &nbsp;<i class="icon-soundcloud" style="font-size: 47px;"></i>
                                                        </a>
                                                    <?php } elseif ($row->type == 7) { ?><!--Docstoc-->
                                                        <?php
                                                        $media = analyze_media($row->file);
                                                        $extract_id = explode('^^^', $media);
                                                        ?>
                                                        <a href="<?php echo site_url('content/docstoc' . '/' . $row->id_content) ?>">
                                                            <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;">
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                                                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                                                    <p style="color: rgb(94,94,94);font-size: 13px;">
                                                        <?php echo nicetime(dtm2timestamp($row->date)) ?>
                                                        <br/>
                                                        Deskripsi : <?php echo cut_text($row->description, 15) . '...' ?>
                                                    </p>                    
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
            <div class="page" id="footbar"></div>
        </div>
    </body>
</html>
<script type="text/javascript">    
    $('#topbar').load("<?php echo site_url('site/topbar_nomenu') ?>");
    $('#footbar').load("<?php echo site_url('site/footbar') ?>");
    setInterval(function(){
        $('#list-quiz').load('<?php echo site_url('course/list_quiz') . "/$course->id_course"; ?>')
    }, 1000);
    
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
    // Write on keyup event of keyword input element
    $("#kwd_search").keyup(function(){
        // When value of the input is not blank
        if( $(this).val() != "")
        {
            // Show only matching TR, hide rest of them
            $("#my-table tbody>tr").hide();
            $("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {
            // When there is no input or clean again, show everything back
            $("#my-table tbody>tr").show();
        }
    });
    $("#kwd_search_document").keyup(function(){
        // When value of the input is not blank
        if( $(this).val() != "")
        {
            // Show only matching TR, hide rest of them
            $(".table-document tbody>tr").hide();
            $(".table-document td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {
            // When there is no input or clean again, show everything back
            $(".table tbody>tr").show();
        }
    });
    // jQuery expression for case-insensitive filter
    $.extend($.expr[":"], 
    {
        "contains-ci": function(elem, i, match, array) 
        {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });
    $('table#my-table').each(function() {
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