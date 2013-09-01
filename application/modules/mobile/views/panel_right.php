<div data-role="panel" id="right-panel" data-theme="b" data-position="right" data-display="push">
    <ul data-role="listview" id="ul-value">
        <li data-role="list-divider">Wanna Share Something ?</li>
        <li data-icon="comments-alt"><a href="#" id="update-status">Update Status</a></li>
        <li data-icon="link"><a href="#" id="link">Insert Link</a></li>
        <li data-icon="upload-alt"><a href="#" id="link">Upload Content</a></li>
        <li data-role="list-divider">Trending Content</li>
        <?php foreach ($trending as $rowtrending): ?>
            <li data-icon="tag"><a href="javascript:void(0)"><?php echo $rowtrending->tag ?></a></li>
        <?php endforeach; ?>
        <li data-role="list-divider">Browse Archive</li>
        <li data-icon=""><a href="#" id="link">Today</a></li>
        <li data-icon=""><a href="#" id="link">Yesterday</a></li>
        <li data-icon=""><a href="#" id="link">This Month</a></li>
        <li data-role="list-divider">Institution</li>
    </ul>
</div>
<script type="text/javascript">
    $('a#update-status').tap(function() {
        $('#form-container').show();
        $('#form-feed-insert').show();
        $("#right-panel").panel("close");
        return false;
    });
</script>