<?php foreach ($content as $row): ?>
    <li class="feed-link" style="padding-left: 0px;">
        <span class="feed-avatar">
            <?php if ($row->profic == '') { ?>
                <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;"/>
            <?php } else { ?>
                <?php
                $profpic = 'resource/' . $row->profic;
                if (file_exists($profpic)) {
                    ?>
                    <img src="<?php echo base_url() . $profpic ?>" class="userphoto" style="padding-right: 0px;width: 100%;"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;"/>
                <?php } ?>
            <?php } ?>
        </span>
        <div class="data">
            <div class="user-description">
                <h4>
                    <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    <?php if ($row->forum_type == 0) { ?><!--Video-->
                        <a href="<?php echo site_url('content/video' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-film"></i>&nbsp;&nbsp;konten video</a>
                    <?php } elseif ($row->forum_type == 1) { ?><!--document-->
                        <a href="<?php echo site_url('content/document' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-libreoffice"></i>&nbsp;&nbsp;konten dokumen</a>
                    <?php } elseif ($row->forum_type == 2) { ?><!--Youtube-->
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-youtube"></i>&nbsp;&nbsp;konten youtube.com</a>
                    <?php } elseif ($row->forum_type == 3) { ?><!--Vimeo-->
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-vimeo"></i>&nbsp;&nbsp;konten vimeo.com</a>
                    <?php } elseif ($row->forum_type == 4) { ?><!--scribd-->
                        <a href="<?php echo site_url('content/scribd' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-pdf"></i>&nbsp;&nbsp;konten scribd.com</a>
                    <?php } elseif ($row->forum_type == 6) { ?><!--SoundCloud-->
                        <a href="<?php echo site_url('content/soundcloud' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-soundcloud"></i>&nbsp;&nbsp;konten soundcloud.com</a>
                    <?php } elseif ($row->forum_type == 5) { ?><!--slideshare-->
                        <a href="<?php echo site_url('content/slideshare' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-powerpoint"></i>&nbsp;&nbsp;konten slideshare.net</a>
                    <?php } elseif ($row->forum_type == 7) { ?><!--docstoc-->
                        <a href="<?php echo site_url('content/docstoc' . '/' . $row->forum_id) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-word"></i>&nbsp;&nbsp;konten docstoc.com</a>
                    <?php } elseif ($row->forum_type == 8) { ?><!--docstoc-->
                    <?php } elseif ($row->forum_type == 9) { ?><!--plain-->
                    <?php } elseif ($row->forum_type == 10) { ?><!--gambar-->
                    <?php } ?>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
            </div>
            <div class="text" id="wall-content-viewer-<?php echo $row->forum_id ?>" data-id="<?php echo $row->forum_id ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>
            <?php if ($row->forum_type == 0) { ?><!--Video-->
                <div class="image link-image">
                    <?php if ($row->cover == 0) { ?>
                    <?php } else { ?>
                        <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                            <img src="<?php echo base_url() . 'resource/' . $row->forum_id . '.jpg' ?>" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;vertical-align: middle;"/>
                        </a>
                    <?php } ?>
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 1) { ?><!--Document-->
                <div class="image link-image">
                    <?php if ($row->cover == 0) { ?>
                        <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                            <!--<i class="icon-file" style="font-size: 45px;"></i>-->
                        </a>
                    <?php } else { ?>
                        <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                            <img src="<?php echo base_url() . 'resource/' . $row->forum_id . '.jpg' ?>" style="width: 180px;vertical-align: middle;"/>
                        </a>
                    <?php } ?>
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 2) { ?><!--youtube-->
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->url);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                        <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;vertical-align: middle;">
                    </a>
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 3) { ?><!--vimeo-->
                <div class="image link-image">
                    <?php $media = vimeo_cover($row->url); ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                        <img src="<?php echo ($media['thumbnail_medium']) ?>" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;">
                    </a>
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 4) { ?><!--scribd-->
                <div class="image link-image">
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>"></a>
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 5) { ?><!--slideshare-->
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->url);
                    $extract_id = explode('^^^', $media);
                    $url = $extract_id[1];
                    $thumb = explode("/", slideshare_cover($url)->thumbnail);
                    $thumbnail = slideshare_cover($url)->thumbnail;
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                        <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;vertical-align: middle;">
                    </a>
                    <div class="description" style="padding-left: 141px;">
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 6) { ?><!--SoundCloud-->
                <div class="image link-image">
                    <div class="description" style="padding-left: 141px;">
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 7) { ?><!--docstoc-->
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->url);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->forum_id ?>">
                        <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;">
                    </a>
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 8) { ?><!--SoundCloud-->
                <div class="image link-image">
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 9) { ?><!--wall-->
                <div class="image link-image">
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } elseif ($row->forum_type == 10) { ?><!--gambar-->
                <div class="image link-image">
                    <div class="description" style="padding-left: 141px;">
                        <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                            <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                                <?php echo $row->message; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
            <div class="utils">
                <div class="toolbar place-left">
                    <?php if ($row->forum_type == 0) { ?><!--Video-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 0) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 0) ?>
                    <?php } elseif ($row->forum_type == 1) { ?><!--document-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 1) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 1) ?>
                    <?php } elseif ($row->forum_type == 2) { ?><!--youtube-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 2) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 2) ?>
                    <?php } elseif ($row->forum_type == 3) { ?><!--vimeo-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 3) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 3) ?>
                    <?php } elseif ($row->forum_type == 4) { ?><!--Scribd-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 4) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 4) ?>
                    <?php } elseif ($row->forum_type == 5) { ?><!--Slideshare-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 5) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 5) ?>
                    <?php } elseif ($row->forum_type == 6) { ?><!--SoundCloud-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 6) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 6) ?>
                    <?php } elseif ($row->forum_type == 7) { ?><!--Docstoc-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 7) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 7) ?>
                    <?php } elseif ($row->forum_type == 8) { ?><!--Docstoc-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 8) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 8) ?>
                    <?php } elseif ($row->forum_type == 9) { ?><!--Docstoc-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 9) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 9) ?>
                    <?php } elseif ($row->forum_type == 10) { ?><!--Docstoc-->
                        <?php echo modules::run('forum/btn_broadcast', $row->forum_id, 10) ?>
                        <?php echo modules::run('forum/btn_tags', $row->forum_id, 10) ?>
                    <?php } ?>
                </div>
                <div class="toolbar place-right" style="visibility: hidden;"></div>
                <div class="clearfix"></div>
            </div>
            <?php if ($row->forum_type == 0) { ?><!--Video-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 0) ?>
            <?php } elseif ($row->forum_type == 1) { ?><!--document-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 1) ?>
            <?php } elseif ($row->forum_type == 2) { ?><!--youtube-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 2) ?>
            <?php } elseif ($row->forum_type == 3) { ?><!--vimeo-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 3) ?>
            <?php } elseif ($row->forum_type == 4) { ?><!--scribd-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 4) ?>
            <?php } elseif ($row->forum_type == 5) { ?><!--slidshare-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 5) ?>
            <?php } elseif ($row->forum_type == 6) { ?><!--SoundCloud-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 6) ?>
            <?php } elseif ($row->forum_type == 7) { ?><!--docstoc-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 7) ?>
            <?php } elseif ($row->forum_type == 8) { ?><!--docstoc-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 8) ?>
            <?php } elseif ($row->forum_type == 9) { ?><!--docstoc-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 9) ?>
            <?php } elseif ($row->forum_type == 10) { ?><!--docstoc-->
                <?php echo modules::run('forum/form_tag_add', $row->forum_id, 10) ?>
            <?php } ?>
        </div>
    </li>
<?php endforeach; ?>
<script forum_type="text/javascript">
    $('a#btn-content-activate').click(function(){
        var forum_id = $(this).attr('data-id');
        $('#wall-content-viewer-'+forum_id).load("<?php echo site_url('content/wall_player') ?>/"+forum_id,function(){
            $('#wall-content-viewer-'+forum_id).slideToggle('fast');
        });           
        return false;
    });
    $('a#pic-content-activate').click(function(){
        var forum_id = $(this).attr('data-id');
        $('#wall-content-viewer-'+forum_id).load("<?php echo site_url('content/wall_player') ?>/"+forum_id,function(){
            $('#wall-content-viewer-'+forum_id).slideToggle('fast');
        });
    });
</script>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script>
    SC.initialize({
        client_id: "938418853596f90572983f377348dc57"
    });
</script>