<?php
//plain_viewer_youtube generate in melisa_helper
$media = analyze_media($content->file);
$trace = explode('^^^', $media);
echo plain_viewer_youtube($trace[1]);
?>