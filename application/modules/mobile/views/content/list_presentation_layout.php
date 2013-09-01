<?php foreach ($presentation as $rowpresentation): ?>
    <li data-cards-type='text'>
        <h2><i class="icon-indent-right"></i> Slideshare Content</h2>
        <?php
        $media = analyze_media($rowpresentation->file);
        $extract_id = explode('^^^', $media);
        $url = $extract_id[1];
        $thumb = explode("/", slideshare_cover($url)->thumbnail);
        $thumbnail = slideshare_cover($url)->thumbnail;
        ?>
        <a href="javascript:void(0)">
            <img src="<?php echo "http:" . $thumbnail ?>" style="width: 100%;border-right: 1px solid white;">
        </a>
        <p><?php echo $rowpresentation->title ?></p>
    </li>
<?php endforeach; ?>