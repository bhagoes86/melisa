<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/html"> 
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo $content->description; ?>">
        <meta name="author" content="Taufik Sulaeman">
        <meta name="title" content="<?php echo $content->title; ?>">
        <meta name="keywords" content="<?php echo $content->title; ?>">
        <title>UNPAD Virtual Learning</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery.mobile-1.2.0.min.css" />
        <script src="<?php echo base_url() ?>asset/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url() ?>asset/js/jquery.mobile-1.2.0.min.js"></script>
        <script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
    </head>
    <body>
        <div data-role="page">
            <div data-role="header">
                <a href="<?php echo site_url('mobile') ?>" data-icon="home">Depan</a> 
                <h1>Video</h1>
                <a href="javascript:void(0)" data-icon="grid">Loker</a>
                <?php $this->load->view('mobile/header'); ?>
            </div><!-- /header -->

            <div data-role="content">
                <div style="background-color: #000;height: 394px;">
                    <?php
                    $media = analyze_media($content->file);
                    $trace = explode('^^^', $media);
                    switch ($trace[0]) {
                        case 'image' :
                            echo "<a href='" . $trace[3] . "' target='_blank'><img src='" . $trace[3] . "' width='100%' /></a>";
                            break;
                        case 'youtube' :
                            echo youtube($trace[1]);
                            break;
                        case 'vimeo' :
                            echo vimeo($trace[1]);
                            break;
                        case 'scribd' :
                            echo scribd($trace[1]);
                            break;
                        case 'docstoc' :
                            echo docstoc($trace[1]);
                            break;
                        case 'link' :
                            break;
                        default :
                            die;
                    }
                    ?>
                </div>
                <h2><?php echo $content->title; ?></h2>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(function() {
        // install flowplayer to an element with CSS class "player"
        $(".player").flowplayer({ swf: "/swf/flowplayer-.swf" });
    });
    $('#list-video').load("<?php echo site_url('content/rightbar_video_viewer') ?>");
</script>