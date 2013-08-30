<?php foreach ($content as $rowcontent): ?>
    <li data-cards-type='text'>
        <?php if ($rowcontent->type == 0) { ?><!--Video-->
        <?php } elseif ($rowcontent->type == 1) { ?><!--Document-->
        <?php } elseif ($rowcontent->type == 2) { ?><!--Youtube-->
            <?php
            $media = analyze_media($rowcontent->file);
            //ekstrak the youtube id
            $extract_id = explode('^^^', $media);
            ?>
            <img id="cover_<?php echo $rowcontent->id_content?>" src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 100%;">
        <?php } elseif ($rowcontent->type == 3) { ?><!--Vimeo-->
        <?php } elseif ($rowcontent->type == 4) { ?><!--Scribd-->
        <?php } elseif ($rowcontent->type == 5) { ?><!--Slideshare-->
        <?php } elseif ($rowcontent->type == 6) { ?><!--SoundCloud-->
        <?php } elseif ($rowcontent->type == 7) { ?><!--Docstoc-->
        <?php } ?>
        <div id="content_player" style="display: none;"></div>
        <h1><?php echo $rowcontent->title ?></h1>
    </li>
<?php endforeach; ?>