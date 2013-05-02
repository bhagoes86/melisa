<style type="text/css">
    .pager {
        overflow:hidden;
        padding-top:0px;
    }

    .pager li{
        float:left;
        list-style-type:none;
        margin-right:.3em;
        font-size:1.1em;
    }
</style>
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
                    <?php if ($row->type == 0) { ?><!--Video-->
                        <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-film"></i>&nbsp;&nbsp;konten video</a>
                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-youtube"></i>&nbsp;&nbsp;konten youtube.com</a>
                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-vimeo"></i>&nbsp;&nbsp;konten vimeo.com</a>
                    <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                        <a href="<?php echo site_url('content/soundcloud' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-soundcloud"></i>&nbsp;&nbsp;konten soundcloud.com</a>
                    <?php } ?>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
            </div>
            <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>
            <div class="image link-image">
                <?php if ($row->type == 0) { ?><!--Video-->
                    <?php if ($row->cover == 0) { ?>
                    <?php } else { ?>
                        <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                            <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;vertical-align: middle;"/>
                        </a>
                    <?php } ?>
                <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;vertical-align: middle;">
                    </a>
                <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                    <?php $media = vimeo_cover($row->file); ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="<?php echo ($media['thumbnail_medium']) ?>" style="margin:14px 0px 15px 10px;width: 125px;height: 100px;">
                    </a>
                <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                <?php } ?>
                <div class="description" style="padding-left: 141px;">
                    <h4 style="padding-left: 0px;margin-left: 0px;" data-id="<?php echo $row->id_content ?>">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                            <?php echo $row->title; ?>
                        </a>
                    </h4>
                    <?php echo CutText($row->description, 150); ?>...
                    <?php if ($row->type == 0) { ?><!--Video-->
                        <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } elseif ($row->type == 2) { ?><!--youtube-->
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } elseif ($row->type == 3) { ?><!--vimeo-->
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                        <a href="<?php echo site_url('content/soundcloud' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="utils">
                <div class="toolbar place-left">
                    <?php if ($row->type == 0) { ?><!--Video-->
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 0) ?>
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 0) ?>
                    <?php } elseif ($row->type == 2) { ?><!--youtube-->
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 2) ?>
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 2) ?>
                    <?php } elseif ($row->type == 3) { ?><!--vimeo-->
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 3) ?>
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 3) ?>
                    <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 6) ?>
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 6) ?>
                    <?php } ?>
                </div>
                <div class="toolbar place-right" style="visibility: hidden;"></div>
                <div class="clearfix"></div>
            </div>
            <?php if ($row->type == 0) { ?><!--Video-->
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 0) ?>
            <?php } elseif ($row->type == 2) { ?><!--youtube-->
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 2) ?>
            <?php } elseif ($row->type == 3) { ?><!--vimeo-->
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 3) ?>
            <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 6) ?>
            <?php } ?>
        </div>
    </li>
<?php endforeach; ?>
<script type="text/javascript">
    $('#wall_container').flexipage({
        perpage:10
    });
    $('a#btn-content-activate').click(function(){
        var id_content = $(this).attr('data-id');
        $('#wall-content-viewer-'+id_content).load("<?php echo site_url('content/wall_player') ?>/"+id_content,function(){
            $('#wall-content-viewer-'+id_content).slideToggle('fast');
        });           
        return false;
    });
    $('a#pic-content-activate').click(function(){
        var id_content = $(this).attr('data-id');
        $('#wall-content-viewer-'+id_content).load("<?php echo site_url('content/wall_player') ?>/"+id_content,function(){
            $('#wall-content-viewer-'+id_content).slideToggle('fast');
        });
    });
</script>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script>
    SC.initialize({
        client_id: "938418853596f90572983f377348dc57"
    });
</script>