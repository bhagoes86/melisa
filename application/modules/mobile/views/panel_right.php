<div data-role="panel" id="right-panel" data-theme="b" data-position="right" data-display="push">
    <ul data-role="listview" id="ul-value">
        <li data-role="list-divider">Share</li>
        <li data-icon=""><a href="#" id="status">Update Status</a></li>
        <li data-icon=""><a href="#" id="link">Insert Link</a></li>
        <li data-icon=><a href="#" id="link">Upload Content</a></li>
        <li data-role="list-divider">Archive</li>
        <li data-icon=""><a href="#" id="link">Today</a></li>
        <li data-icon=""><a href="#" id="link">Yesterday</a></li>
        <li data-icon=""><a href="#" id="link">This Month</a></li>
        <li data-role="list-divider">Trending Content</li>
        <?php foreach ($trending as $rowtrending): ?>
            <li data-icon="tag"><a href="javascript:void(0)"><?php echo $rowtrending->tag ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>