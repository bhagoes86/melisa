<fieldset class="feed" style="margin-top: 5px;">
    <legend>Trend Topik</legend>
    <ul style="list-style:none;color:#aaa">
        <?php foreach ($trending as $row): ?>
            <li> <a style="text-decoration: none;cursor: pointer;"><i class="icon-tag"></i> <?php echo $row->tag ?></a></li>
        <?php endforeach; ?>
    </ul>
</fieldset>