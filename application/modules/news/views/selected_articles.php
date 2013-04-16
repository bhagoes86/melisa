<div class="span6">
    <?php if ($news == NULL) { ?>
    <?php } else { ?>
        <img src="<?php echo base_url() . 'attachment/' . $news->header ?>" style="width: 100%;">
    <?php } ?>
    <?php if ($news == NULL) { ?>

    <?php } else { ?>
        <div class="bg-color-blueDark" style="margin-bottom: 10px;">
            <a class="fg-color-white">&nbsp;Title</a>
        </div>
        <p><?php echo $news->title ?></p>
    <?php } ?>

    <?php if ($news == NULL) { ?>

    <?php } else { ?>
        <div class="bg-color-greenDark" style="margin-bottom: 10px;">
            <a class="fg-color-white">&nbsp;Isi</a>
        </div>
        <p><?php echo $news->news ?></p>

        <?php
        if (($news->attachment_type == 2) || ($news->attachment_type == 3) || ($news->attachment_type == 4) ||($news->attachment_type == 7)) {
            echo modules::run('news/youtube_view',$news->attachment);
        }
        
        if($news->attachment_type == 1){
            echo modules::run('news/document_view',$news->attachment);
        }
        
        if($news->attachment_type == 0){
            echo modules::run('news/video_view',$news->attachment,$news->ext);
        }
        
        if($news->attachment_type == 6){
            echo modules::run('news/soundcloud_view',$news->attachment);
        }
    }
    ?>

</div>
