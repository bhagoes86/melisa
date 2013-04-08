<?php foreach ($content as $row): ?>
    <?php if ($row->type == 0) { ?><!--Video-->
        <div class="image-container bg-color-blue place-right" style="margin-right: 0px;">
            <a class="fg-color-white bg-color-blue" style="position: absolute;"><?php echo nicetime(dtm2timestamp($row->date)) ?>&nbsp;</a>
        <?php } elseif ($row->type == 2) { ?><!--Youtube-->
            <div class="image-container bg-color-red place-right" style="margin-right: 0px;">
                <a class="fg-color-white bg-color-red" style="position: absolute;"><?php echo nicetime(dtm2timestamp($row->date)) ?>&nbsp;</a>
            <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                <div class="image-container bg-color-orange place-right" style="margin-right: 0px;">
                    <a class="fg-color-white bg-color-orange" style="position: absolute;"><?php echo nicetime(dtm2timestamp($row->date)) ?>&nbsp;</a>
                <?php } ?>
                <?php if ($row->type == 0) { ?><!--Video-->
                    <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                        <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="height: 118px;"/>
                    </a>
                <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>">
                        <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="height: 118px">
                    </a>
                <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                    <?php $media = vimeo_cover($row->file); ?>
                    <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>"  target="_blank" >
                        <img src="<?php echo ($media['thumbnail_medium']) ?>" style="height: 118px;">
                    </a>
                <?php } ?>
                <div class="overlay" style="font-size: 16px;line-height: 23px;">
                    <a class="fg-color-white" href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                        <?php echo $row->title; ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>