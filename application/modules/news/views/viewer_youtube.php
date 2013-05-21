<?php
$media = analyze_media($attachment);
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