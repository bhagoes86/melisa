<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function splitPhrase($str, $length = 51) {
    $arr = explode(' ', $str);
    $h = '';
    foreach ($arr as $word) {
        if (strlen($word) > $length) {
            for ($i = 0; $i <= (strlen($word) / $length); $i++) {
                $h .= substr($word, ($i * $length), $length) . ' ';
            }
        } else
            $h .= $word . ' ';
    }
    return str_replace(array("\r\n", "\n"), "<br />", $h);
}

function mentionwall($text) {
    //untuk mention
    $text = preg_replace("/@(\w{1,15})/i", "@<a href=\"profile.php?username=\\1\">\\1</a>", $text);
    //untuk hashtag
    $text = preg_replace("/#(\w{1,15})/i", "#<a href=\"search.php?q=\\1\">\\1</a>", $text);
    return $text;
}

function splitPhraseCmt($str, $length = 50) {
    $arr = explode(' ', $str);
    $h = '';
    foreach ($arr as $word) {
        if (strlen($word) > $length) {
            for ($i = 0; $i <= (strlen($word) / $length); $i++) {
                $h .= substr($word, ($i * $length), $length) . ' ';
            }
        } else
            $h .= $word . ' ';
    }
    return str_replace(array("\r\n", "\n"), "<br />", $h);
}

function cut_text($text, $numTerm) {
    $all = explode(" ", $text);
    $result = "";
    for ($i = 0; $i < count($all); $i++) {
        if ($i < $numTerm) {
            $result.=" " . $all[$i];
        }
        else
            break;
    }
    return $result;
}

function CutText($str, $lenght) {
    if (strlen($str) <= $lenght) {
        return substr($str, 0, $lenght);
    } else {
        return substr($str, 0, $lenght) . "";
    }
}

function dtm2timestamp($str) {
    list($date, $time) = explode(' ', $str);
    list($year, $month, $day) = explode('-', $date);
    list($hour, $minute, $second) = explode(':', $time);

    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

    return $timestamp;
}

function nicetime($timestamp) {
    if ($timestamp == '' or !is_numeric($timestamp))
        return '';
    $hari = date('l', $timestamp);
    $tgl = date('d', $timestamp);
    $bln = date('F', $timestamp);
    $thn = date('Y', $timestamp);
    $pukul = date('H:i', $timestamp);
    // timespan dari CI's date helper
    $timespan = strtolower(timespan($timestamp));
    $timespan = str_replace(',', '', $timespan);
    $exp = explode(' ', $timespan);
    $k = $exp[1];
    $v = $exp[0];
    if ($v > 0) {
        if (stristr($k, 'year') OR date('Y') > $thn) {
            return $tgl . ' ' . $bln . ' ' . $thn;
        } elseif (stristr($k, 'week') OR stristr($k, 'month')) {
            return $tgl . ' ' . $bln . ' at ' . $pukul;
        } elseif (stristr($k, 'day') OR stristr($k, 'hour') OR stristr($k, 'minute') OR stristr($k, 'second')) {
            if ($v >= 2 AND stristr($k, 'day')) {
                return $hari . ' at ' . $pukul;
            } elseif (date('j') - date('j', $timestamp) == 1) {
                return 'Yesterday at ' . $pukul;
            } elseif ((date('D') == date('D', $timestamp)) AND (($v >= 10) AND stristr($k, 'hour'))) {
                return 'Today at ' . $pukul;
            } elseif ((stristr($k, 'hour') AND $v < 10) OR stristr($k, 'minute') OR stristr($k, 'second')) {
                if (stristr($k, 'second') AND $v <= 15) {
                    return 'just now';
                }
                return $v . ' ' . $k . ' ago';
            } else {
                return $hari . ' at ' . $pukul;
            }
        }
    } else {
        return 'just now';
    }
}

function get_url($text) {
    $pattern = preg_replace("`.*?((http|ftp)://[\w#$&+,\/:;=?@.-]+)*?`i", "$1", $text);
    return $pattern;
}

function resize_image($url) {
    list($width, $height) = getimagesize($url);
    $size = 150;
    $aspect_ratio = $height / $width;
    if ($width <= $size) {
        $new_w = $width;
        $new_h = $height;
    } else {
        $new_w = $size;
        $new_h = abs($new_w * $aspect_ratio);
    }
    return array($new_w, $new_h);
}

function youtubeTevePlayer($val) {
    $ext = substr($val, -4, 4);
    if (in_array($ext, array('.jpg', '.png', '.gif'))) {
        $size = resize_image($val);
        $return = 'image^^^' . $size[0] . '^^^' . $size[1] . '^^^' . $val;
        return $return;
    } elseif (stristr($val, 'youtube.com')) {
        $id_youtube = get_id_youtube($val);
        $return = 'youtube^^^' . $id_youtube[1];
        return $return;
    } elseif (stristr($val, 'vimeo.com')) {
        $id_vimeo = get_id_vimeo($val);
        $return = 'vimeo^^^' . $id_vimeo[0];
        return $return;
    } elseif (stristr($val, 'scribd.com')) {
        $id_scribd = get_id_scribd($val);
        $return = 'scribd^^^' . $id_scribd[0];
        return $return;
    } elseif (stristr($val, 'docstoc.com')) {
        $id_scribd = get_id_docstoc($val);
        $return = 'docstoc^^^' . $id_scribd[0];
        return $return;
    } else {
        //Todo create dom html and specific the attachment like zip an rar
        return 'link^^^' . $val;
    }
}

function analyze_media($val) {
    $ext = substr($val, -4, 4);
    if (in_array($ext, array('.jpg', '.png', '.gif'))) {
        $size = resize_image($val);
        $return = 'image^^^' . $size[0] . '^^^' . $size[1] . '^^^' . $val;
        return $return;
    } elseif (stristr($val, 'youtube.com')) {
        $id_youtube = get_id_youtube($val);
        $return = 'youtube^^^' . $id_youtube[1];
        return $return;
    } elseif (stristr($val, 'vimeo.com')) {
        $id_vimeo = get_id_vimeo($val);
        $return = 'vimeo^^^' . $id_vimeo[0];
        return $return;
    } elseif (stristr($val, 'scribd.com')) {
        $id_scribd = get_id_scribd($val);
        $return = 'scribd^^^' . $id_scribd[0];
        return $return;
    } elseif (stristr($val, 'docstoc.com')) {
        $id_scribd = get_id_docstoc($val);
        $return = 'docstoc^^^' . $id_scribd[0];
        return $return;
    } else {
        //Todo create dom html and specific the attachment like zip an rar
        return 'link^^^' . $val;
    }
}

function get_id_youtube($url) {
    $pattern = '/^[^v]+v.(.{11}).*/';
    preg_match($pattern, $url, $matches);
    return $matches;
}

function youtube_teve_player($id) {
    return '<object width="100%" height="350" style="margin:0px;padding: 0px;vertical-align: middle"><param name="movie" value="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed wmode="transparent" src="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="100%" height="350" style="margin:0px;padding: 0px;vertical-align: middle"></embed></object>';
}

function youtube($id) {
    return '<object width="100%" height="394" style="margin:0px;padding: 0px;vertical-align: middle"><param name="movie" value="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed wmode="transparent" src="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="100%" height="394" style="margin:0px;padding: 0px;vertical-align: middle"></embed></object>';
}

function youtube_full($id) {
    return '<object width="100%" height="100%" style="margin:0px;padding: 0px;vertical-align: middle"><param name="movie" value="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed wmode="transparent" src="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="100%" height="100%" style="margin:0px;padding: 0px;vertical-align: middle"></embed></object>';
}

function youtubeLarge($id) {
    return '<object width="100%" height="100%" style="margin:0px;padding: 0px;vertical-align: middle"><param name="movie" value="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed wmode="transparent" src="http://www.youtube.com/v/' . $id . '&hl=en_US&feature=player_embedded&version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="100%" height="100%" style="margin:0px;padding: 0px;vertical-align: middle"></embed></object>';
}

function vimeo($id) {
    return '<iframe width="370" height="250" style="padding: 0px;vertical-align: middle" src="http://player.vimeo.com/video/' . $id . '"></iframe>';
}

function scribd($id) {
    return '<iframe width="100%" height="350" src="http://www.scribd.com/fullscreen/' . $id . '"></iframe>';
}

function docstoc($id) {
    return '<iframe width="100%" height="350" src="http://www.docstoc.com/docs/document-preview.aspx?doc_id=' . $id . '"></iframe>';
}


function vimeoLarge($id) {
    return '<iframe width="100%" height="100%" src="http://player.vimeo.com/video/' . $id . '" style="border:0px;padding: 0px;vertical-align: middle"></iframe>';
}

function scribdLarge($id) {
    return '<iframe style="border:0px;padding: 0px;vertical-align: middle" width="100%" height="100%" src="http://www.scribd.com/fullscreen/' . $id . '"></iframe>';
}

function docstocLarge($id) {
    return '<iframe width="100%" height="100%" style="border:1px solid #e5e5e5;padding: 0px;vertical-align: middle" src="http://www.docstoc.com/docs/document-preview.aspx?doc_id=' . $id . '"></iframe>';
}

function cleartext($text) {
    return htmlentities($text, ENT_NOQUOTES | ENT_IGNORE, "UTF-8");
}

function get_id_vimeo($url) {
    preg_match('/(\d+)/', $url, $matches);
    return $matches;
}

function get_id_scribd($url) {
    preg_match('/(\d+)/', $url, $matches);
    return $matches;
}

function get_id_docstoc($url) {
    preg_match('/(\d+)/', $url, $matches);
    return $matches;
}

function getName($id = null) {
    if (!$id)
        $id = $this->session->userdata('user_id');

    $CI = & get_instance();
    $CI->load->model('ion_auth_model', 'ion');
    return $CI->ion->get_name($id);
}

function analyze_cover($val) {
    if (stristr($val, 'youtube.com')) {
        $id_youtube = get_id_youtube($val);
        $return = $id_youtube[1];
        return $return;
    } else {
        //Todo create dom html and specific the attachment like zip an rar
        return 'link^^^' . $val;
    }
}

function vimeo_cover($link) {

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

function slideshare_cover($url) {
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
    return $slideshare = json_decode($output);
}

?>
