<div data-role="panel" id="left-panel" data-theme="b" data-position="left" data-display="push">
    <ul data-role="listview">
        <li data-role="list-divider">Welcome</li>
        <li data-icon="male"><a href="#" id="user_name"></a></li>
        <li data-role="list-divider">Updates</li>
        <li data-icon="comments-alt"><a href="<?php echo site_url('mobile/list_feed_new') ?>" data-ajax="false">News Feed</a></li>
        <li data-icon="eye-open"><a href="#" data-ajax="false">Readcast</a></li>
        <li data-role="list-divider">Library</li>
        <li data-icon="play-sign"><a href="<?php echo site_url('mobile/list_podcast_new') ?>" data-ajax="false">Podcast</a></li>
        <li data-icon="file-text-alt"><a href="#" data-ajax="false">Document</a></li>
        <li data-icon="indent-right"><a href="#" data-ajax="false">Presentation</a></li>
        <li data-role="list-divider">Course</li>
        <li data-icon="book"><a href="<?php echo site_url('mobile/list_course_new') ?>" data-ajax="false">Course</a></li>
        <li data-icon="check"><a href="#" data-ajax="false">Subscribe</a></li>
        <li data-role="list-divider">Other</li>
        <li data-icon="facebook"><a href="<?php echo site_url('mobile/fan_page') ?>">Fan Page</a></li>
        <li data-icon="info"><a href="#" data-ajax="false">About Us</a></li>
        <li data-icon="signout"><a href="<?php echo site_url('mobile/logout') ?>" data-ajax="false">Log Out</a></li>
    </ul>
</div>