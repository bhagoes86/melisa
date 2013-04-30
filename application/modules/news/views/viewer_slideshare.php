<script type="text/javascript" src="<?php echo base_url() ?>asset/slideshare/swfobject.js"></script>
<!--Slideshare-->
    <?php
    $url = $attachment;
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
<iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $slideshare->slideshow_id ?>?rel=0" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="width: 100%;height: 450px;border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:0px;padding-bottom: 0px;" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe>