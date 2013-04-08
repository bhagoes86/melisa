<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="title" content="">
        <meta name="keywords" content="">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/modern-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/metro/css/site.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/metro/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
        <title>Virtual Learning</title>
    </head>
    <?php $this->load->view('home/js'); ?>
    <body class="modern-ui" onload="prettyPrint()">
        <!--Top Navbar-->
        <div class="page">
            <?php $this->load->view('course/navbar_course'); ?>
        </div>
        <div class="page">
            <div class="page-region">
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row" style="margin-top: 10px;">
                            <!--Course Info-->
                            <div class="span5">
                                <img src="<?php echo base_url() . 'attachment/' . $news->header ?>" style="width: 100%;"/>
                                
                            </div>

                            <div class="span7 fright" id="content-right">
                                <div class="bg-color-blueDark" style="margin-bottom: 10px;">
                                    <a class="fg-color-white">&nbsp;Title</a>
                                </div>
                                <p><?php echo $news->title?></p>
                                <div class="bg-color-red" style="margin-bottom: 10px;">
                                    <a class="fg-color-white">&nbsp;Isi</a>
                                </div>
                                <p><?php echo $news->news?></p>
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
            <div class="page">
                <div class="nav-bar">
                    <div class="nav-bar-inner padding10">
                        <span class="element">
                            <?php echo date('Y'); ?> <a class="fg-color-white" href="http://github.com/taufiksu/vabel">&copy; MELISA for Universitas Padjadjaran</a>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">

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
    _gaq.push(['_setAccount', 'UA-31205461-2']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>