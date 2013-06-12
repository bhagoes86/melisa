<?php if ($content->forum_type == 0) { ?>
    <!--Video-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-film"></i>&nbsp;&nbsp;konten video</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 1) { ?>
    <!--document-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-libreoffice"></i>&nbsp;&nbsp;konten dokumen</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 2) { ?>
    <!--Youtube-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="<?php echo $content->url ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-youtube"></i>&nbsp;&nbsp;konten youtube.com</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
            <div class="text">
                <p><?php echo $content->message ?></p>
            </div>
            <div class="image link-image">
                <?php
                $media = analyze_media($content->url);
                $extract_id = explode('^^^', $media);
                ?>
                <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $content->forum_id ?>">
                    <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;vertical-align: middle;">
                </a>
                <div class="description" style="padding-left: 141px;">
                    <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $content->forum_id ?>">
                        <a style="color: black;" href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $content->forum_id ?>">                            
                            <?php echo $content->url; ?>
                        </a>
                    </h4>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 3) { ?>
    <!--Vimeo-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-vimeo"></i>&nbsp;&nbsp;konten vimeo.com</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 4) { ?>
    <!--scribd-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-pdf"></i>&nbsp;&nbsp;konten scribd.com</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 6) { ?>
    <!--SoundCloud-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-soundcloud"></i>&nbsp;&nbsp;konten soundcloud.com</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 5) { ?>
    <!--slideshare-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-powerpoint"></i>&nbsp;&nbsp;konten slideshare.net</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 7) { ?>
    <!--docstoc-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                    <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-word"></i>&nbsp;&nbsp;konten docstoc.com</a>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 8) { ?>
    <!--proprofs-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a>                     
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 9) { ?>
    <!--picture-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a>                     
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
            <div class="image video-image" style="border: 1px solid #bbb;padding-bottom: 0px;">
                <img src="<?php echo base_url() . 'resource/' . $content->url ?>" style="padding: 5px 5px 0px 5px;">
                <div class="description" style="margin-top: 0px;">
                    <?php echo nl2br($content->message) ?>
                </div>
            </div>
        </div>
    </li>
<?php } elseif ($content->forum_type == 10) { ?>
    <!--plain-->
    <li class="feed-link">
        <span class="feed-avatar">
            <?php if ($content->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $content->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $content->user_id) ?>"><?php echo modules::run('authz/get_username', $content->user_id) ?></a> 
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($content->date)) ?></span>
            </div>
            <div class="text" style="border-bottom: 1px solid #bbb;">
                <p><?php echo nl2br($content->message) ?></p>
            </div>            
        </div>
    </li>
<?php } ?>