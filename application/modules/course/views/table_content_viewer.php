<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/assets/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
<style type="text/css">
    /* custom player skin */
    .flowplayer { background-color: #222; background-size: cover; }
    .flowplayer .fp-controls { background-color: rgba(0, 0, 0, 0.4)}
    .flowplayer .fp-timeline { background-color: rgba(0, 0, 0, 0.5)}
    .flowplayer .fp-progress { background-color: rgba(219, 0, 0, 1)}
    .flowplayer .fp-buffer { background-color: rgba(249, 249, 249, 1)}
</style>
<h3 style="padding-top: 0px;margin-top: 0px;font-weight: bold;">Materi</h3>
<table class="striped bordered">
    <?php foreach ($content as $row): ?>
        <tbody>
            <tr style="padding: 0px;margin: 0px;">
                <td style="width: 100%;padding: 4px 4px 1px 4px;background-color:#000; ">
                    <?php if ($row->type == 0) { ?>
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

                    <?php } elseif ($row->type == 2) { ?>
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
                    <?php } elseif ($row->type == 4) { ?>
                    <?php } elseif ($row->type == 5) { ?>
                    <?php } elseif ($row->type == 6) { ?>
                    <?php } elseif ($row->type == 7) { ?>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>