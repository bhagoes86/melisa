
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

<div data-swf="<?php echo base_url() ?>asset/flowplayer/flowplayer.swf" class="flowplayer fixed-controls no-toggle play-button" style="background-color: #000;" data-ratio="0.5625">
    <video>
        <?php if ($ext == '.mp4') { ?> 
            <source type="video/mp4" src="<?php echo base_url() . 'attachment/' . $attachment; ?>"/>
        <?php } elseif ($ext == '.MP4') { ?>
            <source type="video/mp4" src="<?php echo base_url() . 'attachment/' . $attachment; ?>"/>
        <?php } elseif ($ext == '.FLV') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'attachment/' . $attachment ; ?>"/>
        <?php } elseif ($ext == '.flv') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'attachment/' . $attachment ; ?>"/>
        <?php } elseif ($ext == '.MOV') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'attachment/' . $attachment ; ?>"/>
        <?php } elseif ($ext == '.mov') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'attachment/' . $attachment ; ?>"/>
        <?php } ?>
    </video>
</div>