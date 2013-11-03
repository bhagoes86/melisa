<?php foreach ($content as $row): ?>
    <div class="span4">
        <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
            <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 100%;height: 173px;vertical-align: middle;"/>
        </a><br/>
        <div class="hero-unit" style="height: 80px;padding: 2px 6px 0px 6px;">
            <a style="font-family: sofiapro-medium,Arial,sans-serif;color: #095b97;font-size: 16px;line-height: 1.5em;"></a>
        </div>
    </div>
<?php endforeach; ?>