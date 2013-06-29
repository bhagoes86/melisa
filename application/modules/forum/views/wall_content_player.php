<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/assets/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.paginatetable.js"></script>   
<style type="text/css">
    /* custom player skin */
    .flowplayer { background-color: #222; background-size: cover; }
    .flowplayer .fp-controls { background-color: rgba(0, 0, 0, 0.4)}
    .flowplayer .fp-timeline { background-color: rgba(0, 0, 0, 0.5)}
    .flowplayer .fp-progress { background-color: rgba(219, 0, 0, 1)}
    .flowplayer .fp-buffer { background-color: rgba(249, 249, 249, 1)}
</style>
<?php if ($content->type == 0) { ?>
    <!--Video-->
    <div alt="<?php echo $content->id_content ?>" data-swf="<?php echo base_url() ?>asset/flowplayer/flowplayer.swf" class="flowplayer play-button" style="height: 394px;background-color: #000;width: 100%;padding: 0px;vertical-align: middle;" data-ratio="0.5625">
        <video alt="<?php echo $content->id_content ?>">
            <?php if ($content->ext == '.mp4') { ?> 
                <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $content->id_content . '.mp4'; ?>"/>
            <?php } elseif ($content->ext == '.MP4') { ?>
                <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $content->id_content . '.MP4'; ?>"/>
            <?php } elseif ($content->ext == '.FLV') { ?>
                <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.FLV'; ?>"/>
            <?php } elseif ($content->ext == '.flv') { ?>
                <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.flv'; ?>"/>
            <?php } elseif ($content->ext == '.MOV') { ?>
                <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.flv'; ?>"/>
            <?php } elseif ($content->ext == '.mov') { ?>
                <source type="video/flv" src="<?php echo base_url() . 'resource/' . $content->id_content . '.flv'; ?>"/>
            <?php } ?>
        </video>        
    </div>
<?php } elseif ($content->type == 1) { ?>
    <!--Document-->
    <iframe style="padding: 0px;vertical-align: middle;width: 100%;height: 600px;border: 0px;" src="http://docs.google.com/viewer?url=<?php echo base_url() . 'resource/' . $content->file . '&embedded=true' ?>"></iframe>
<?php } elseif ($content->type == 2) { ?>
    <!--Youtube-->
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
<?php } elseif ($content->type == 3) { ?>
    <!--Vimeo-->
    <div style="background-color: #000;height: 320px;">
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
                echo vimeoLarge($trace[1]);
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
<?php } elseif ($content->type == 4) { ?>
    <!--Scribd-->
    <div style="background-color: #e5e5e5;height: 600px;">
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
                echo vimeoLarge($trace[1]);
                break;
            case 'scribd' :
                echo scribdLarge($trace[1]);
                break;
            case 'docstoc' :
                echo docstocLarge($trace[1]);
                break;
            case 'link' :
                break;
            default :
                die;
        }
        ?>
    </div>
<?php } elseif ($content->type == 5) { ?>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/slideshare/swfobject.js"></script>
    <!--Slideshare-->
    <?php
    $url = $content->file;
    if (!function_exists('curl_init'))
        die('CURL is not installed!');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.slideshare.net/api/oembed/2?url=$url&format=json&maxwidth=550");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    //$output = unserialize(curl_exec($ch));
    curl_close($ch);
    $slideshare = json_decode($output);
    $presentation = explode("/", "$slideshare->slide_image_baseurl");
    ?>
    <iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $slideshare->slideshow_id ?>?rel=0" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="width: 100%;padding: 0px;vertical-align: middle;height: 380px;border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:0px;padding-bottom: 0px;" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe> 
<?php } elseif ($content->type == 6) { ?>
    <!--Soundcloud-->
    <div id="putTheWidgetHere-<?php echo $content->file ?>" style="padding: 4px 4px 0px 4px;vertical-align: middle;margin: 0px;"></div>
    <script type="text/JavaScript">
        SC.oEmbed("<?php echo $content->file ?>", {color: "ff0066",auto_play:true},  document.getElementById("putTheWidgetHere-<?php echo $content->file ?>"));
    </script>
<?php } elseif ($content->type == 7) { ?>
    <!--Docstoc-->
    <div style="background-color: #e5e5e5; height: 600px;">
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
                echo vimeoLarge($trace[1]);
                break;
            case 'scribd' :
                echo scribd($trace[1]);
                break;
            case 'docstoc' :
                echo docstocLarge($trace[1]);
                break;
            case 'link' :
                break;
            default :
                die;
        }
        ?>
    </div>
<?php } ?>