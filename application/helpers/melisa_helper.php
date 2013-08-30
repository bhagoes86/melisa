<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function detector_url($text) {
    $pattern = preg_replace("`.*?((http|ftp)://[\w#$&+,\/:;=?@.-]+)*?`i", "$1", $text);
    return $pattern;
}

function url_media_analizer($val) {
    $ext = substr($val, -4, 4);
    if (in_array($ext, array('.jpg', '.png', '.gif'))) {
        return '10';
    } elseif (in_array($ext, array('.pdf', '.zip', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'))) {
        return '10';
    } elseif (stristr($val, 'youtube.com')) {
        return '2';
    } elseif (stristr($val, 'vimeo.com')) {
        return '3';
    } elseif (stristr($val, 'soundcloud.com')) {
        return '5';
    } elseif (stristr($val, 'scribd.com')) {
        return '4';
    } elseif (stristr($val, 'slideshare.com')) {
        return '5';
    } elseif (stristr($val, 'docstoc.com')) {
        return '7';
    } else {
        return '10';
    }
}

//eksternal viewer
function eksternal_viewer_youtube($id) {
    return '<object width="100%" height="50%" style="margin:0px;padding: 0px;vertical-align: middle"><param name="movie" value="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed wmode="transparent" src="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="100%" height="50%" style="margin:0px;padding: 0px;vertical-align: middle"></embed></object>';
}

//cover
function cover_vimeo($link) {

    if (preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $link, $match)) {
        $id = $match[1];
    } else {
        $id = substr($link, 10, strlen($link));
    }

    if (!function_exists('curl_init'))
        die('CURL is not installed!');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/$id.php");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = unserialize(curl_exec($ch));
    $output = $output[0];
    curl_close($ch);
    return $output;
}

?>