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
                <?php if ($content->ext == '.mp4') { ?> 
                    <video controls autoplay style="width: 100%">
                        <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $content->id_content . '.mp4'; ?>"/>
                    </video>
                <?php } elseif ($content->ext == '.MP4') { ?>
                    <video controls autoplay style="width: 100%">
                        <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $content->id_content . '.MP4'; ?>"/>
                    </video>
                <?php } elseif ($content->ext == '.FLV') { ?>
                    <img src="<?php echo base_url() . '/resource/' . $content->id_content . '.jpg' ?>" style="width: 100%;"/>
                    <img src="<?php echo base_url() . '/resource/' . $content->id_content . '.jpg' ?>" style="width: 100%;"/>
                <?php } elseif ($content->ext == '.flv') { ?>
                    <img src="<?php echo base_url() . '/resource/' . $content->id_content . '.jpg' ?>" style="width: 100%;"/>
                <?php } elseif ($content->ext == '.MOV') { ?>
                    <img src="<?php echo base_url() . '/resource/' . $content->id_content . '.jpg' ?>" style="width: 100%;"/>
                <?php } elseif ($content->ext == '.mov') { ?>
                    <img src="<?php echo base_url() . '/resource/' . $content->id_content . '.jpg' ?>" style="width: 100%;"/>
                <?php } ?>
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