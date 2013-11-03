<?php foreach ($content as $row): ?>
    <?php
    $media = analyze_media($row->file);
    $extract_id = explode('^^^', $media);
    $url = $extract_id[1];
    $thumb = explode("/", slideshare_cover($url)->thumbnail);
    $thumbnail = slideshare_cover($url)->thumbnail;
    ?>
    <div class="span4">
        <a href="<?php echo site_url('content/slideshare' . '/' . $row->id_content) ?>">
            <img src="<?php echo "http:" . $thumbnail ?>" style="width: 100%;height: 173px;vertical-align: middle;"/>
        </a><br/>
        <div class="hero-unit" style="height: 80px;padding: 2px 6px 0px 6px;">
            <a style="font-family: sofiapro-medium,Arial,sans-serif;color: #095b97;font-size: 16px;line-height: 1.5em;"></a>
        </div>
    </div>
<?php endforeach; ?>