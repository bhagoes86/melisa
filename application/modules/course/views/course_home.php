<?php foreach ($content as $row): ?>
    <div class="span4">
        <a href="<?php echo site_url('course' . '/' . $row->id_course) ?>">
            <img src="<?php echo base_url() . 'resource/' . $row->picture ?>" style="width: 100%;height: 173px;vertical-align: middle;"/>
        </a><br/>
        <div class="hero-unit" style="height: 80px;padding: 2px 6px 0px 6px;border: 0px 1px 1px 1px solid rgba(45,173,237,0.80)">
            <a style="font-family: sofiapro-medium,Arial,sans-serif;color: #004444;font-size: 16px;line-height: 1.5em;"><?php echo $row->course ?></a>
        </div>
    </div>
<?php endforeach; ?>
