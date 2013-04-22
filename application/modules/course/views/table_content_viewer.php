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
<h3 style="padding-top: 0px;margin-top: 0px;font-weight: bold;">Materi</h3>
<div class='pager toolbar' style="vertical-align: middle;">
    <a style="cursor: pointer;text-decoration: none;" alt='First' class='firstPage button'><i class="icon-first"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Previous' class='prevPage button'><i class="icon-arrow-left-2"></i></a>
    <span class='currentPage'></span> Dari <span class='totalPages'></span>
    <a style="cursor: pointer;text-decoration: none;" alt='Next' class='nextPage button'><i class="icon-arrow-right-2"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Last' class='lastPage button'><i class="icon-last"></i></a>
</div>
<table class="striped bordered" id="my-table">
    <?php foreach ($content as $row): ?>
        <tbody>
            <tr style="padding: 0px;margin: 0px;">
                <td style="width: 100%;padding: 4px 4px 4px 4px;">
                    <?php if ($row->type == 0) { ?>
                        <!--Video-->
                        <div data-swf="<?php echo base_url() ?>asset/flowplayer/flowplayer.swf" class="flowplayer play-button" style="background-color: #000;width: 100%;" data-ratio="0.5625">
                            <video>
                                <?php if ($row->ext == '.mp4') { ?> 
                                    <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $row->id_content . '.mp4'; ?>"/>
                                <?php } elseif ($row->ext == '.MP4') { ?>
                                    <source type="video/mp4" src="<?php echo base_url() . 'resource/' . $row->id_content . '.MP4'; ?>"/>
                                <?php } elseif ($row->ext == '.FLV') { ?>
                                    <source type="video/flv" src="<?php echo base_url() . 'resource/' . $row->id_content . '.FLV'; ?>"/>
                                <?php } elseif ($row->ext == '.flv') { ?>
                                    <source type="video/flv" src="<?php echo base_url() . 'resource/' . $row->id_content . '.flv'; ?>"/>
                                <?php } elseif ($row->ext == '.MOV') { ?>
                                    <source type="video/flv" src="<?php echo base_url() . 'resource/' . $row->id_content . '.flv'; ?>"/>
                                <?php } elseif ($row->ext == '.mov') { ?>
                                    <source type="video/flv" src="<?php echo base_url() . 'resource/' . $row->id_content . '.flv'; ?>"/>
                                <?php } ?>
                            </video>
                        </div>
                    <?php } elseif ($row->type == 1) { ?>
                        <!--Document-->
                        <iframe style="width: 100%;height: 600px;border: 0px;" src="http://docs.google.com/viewer?url=<?php echo base_url() . 'resource/' . $row->file . '&embedded=true' ?>"></iframe>
                    <?php } elseif ($row->type == 2) { ?>
                        <!--Youtube-->
                        <div style="background-color: #000;height: 394px;">
                            <?php
                            $media = analyze_media($row->file);
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
                    <?php } elseif ($row->type == 3) { ?>
                        <!--Vimeo-->
                        <div style="background-color: #000;height: 394px;">
                            <?php
                            $media = analyze_media($row->file);
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
                    <?php } elseif ($row->type == 4) { ?>
                        <!--Scribd-->
                        <div style="background-color: #e5e5e5;height: 600px;">
                            <?php
                            $media = analyze_media($row->file);
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
                    <?php } elseif ($row->type == 5) { ?>
                        <script type="text/javascript" src="<?php echo base_url() ?>asset/slideshare/swfobject.js"></script>
                        <!--Slideshare-->
                        <?php
                        $url = $row->file;
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
                        <iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $slideshare->slideshow_id ?>?rel=0" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="width: 100%;height: 400px;border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe> 
                    <?php } elseif ($row->type == 6) { ?>
                        <!--Soundcloud-->
                        <div id="putTheWidgetHere"></div>
                        <script type="text/JavaScript">
                            SC.oEmbed("<?php echo $row->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere"));
                        </script>
                    <?php } elseif ($row->type == 7) { ?>
                        <!--Docstoc-->
                        <div style="background-color: #e5e5e5; height: 600px;">
                            <?php
                            $media = analyze_media($row->file);
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
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<script type="text/javascript">
    $('#my-table').paginateTable({ rowsPerPage: 1 });
</script>