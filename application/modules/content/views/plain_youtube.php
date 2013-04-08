<div style="background-color: #000;height: 100%;width: 100%;">
    <?php
    $media = analyze_media($content->file);
    $trace = explode('^^^', $media);
    switch ($trace[0]) {
        case 'image' :
            echo "<a href='" . $trace[3] . "' target='_blank'><img src='" . $trace[3] . "' width='100%' /></a>";
            break;
        case 'youtube' :
            echo youtube_full($trace[1]);
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