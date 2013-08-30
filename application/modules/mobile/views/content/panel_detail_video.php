<div data-role="panel" id="right-panel" data-theme="b" data-position="right" data-display="push">
    <ul data-role="listview">
        <li data-icon=""><a href="javascript:void(0)" id="info-detail-course" data-id="<?php echo $id_content; ?>">About Content</a></li>
        <li data-role="list-divider">Action</li>
        <li data-icon=""><a href="<?php echo site_url('mobile/download_video' . '/' . $id_content) ?>" target="_blank" id="content-detail-download" data-id="<?php echo $id_content; ?>">Download</a></li>
        <li data-icon=""><a href="javascript:void(0)" id="content-detail-bookmark" data-id="<?php echo $id_content; ?>">Bookmark</a></li>
        <li data-icon=""><a href="javascript:void(0)" id="content-detail-broadcast" data-id="<?php echo $id_content; ?>">Broadcast</a></li>
    </ul>
</div>