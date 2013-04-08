<script src="<?php echo base_url() ?>asset/flowplayer/flowplayer.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/flowplayer/skin/minimalist.css" />
<div class="flowplayer" style="background-color: #000;">
    <video preload="auto" autoplay="auto" controls="controls">
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
