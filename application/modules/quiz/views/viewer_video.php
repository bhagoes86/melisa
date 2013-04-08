
    <?php $this->load->view('home/js'); ?>
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
    
<div data-swf="<?php echo base_url() ?>asset/flowplayer/flowplayer.swf" class="flowplayer fixed-controls no-toggle play-button"  style="margin-bottom:30px;background-color: #000;" data-ratio="0.5625">
    <video>
        <?php if ($content->ext == '.mp4') { ?>
            <source type="video/mp4" src="<?php echo base_url() . 'resource/quiz_video_' . $content->id_quiz_resource . '.mp4'; ?>"/>
        <?php } elseif ($content->ext == '.MP4') { ?>
            <source type="video/mp4" src="<?php echo base_url() . 'resource/quiz_video_' . $content->id_quiz_resource . '.MP4'; ?>"/>
        <?php } elseif ($content->ext == '.FLV') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'resource/quiz_video_' . $content->id_quiz_resource . '.FLV'; ?>"/>
        <?php } elseif ($content->ext == '.flv') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'resource/quiz_video_' . $content->id_quiz_resource . '.flv'; ?>"/>
        <?php } elseif ($content->ext == '.MOV') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'resource/quiz_video_' . $content->id_quiz_resource . '.flv'; ?>"/>
        <?php } elseif ($content->ext == '.mov') { ?>
            <source type="video/flv" src="<?php echo base_url() . 'resource/quiz_video_' . $content->id_quiz_resource . '.flv'; ?>"/>
        <?php } ?>
    </video>
</div>