<style type="text/css">
    .pager {
        overflow:hidden;
        padding-top:1em;
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
                        unggah <i class="icon-film"></i>&nbsp;&nbsp;konten video
                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                        menautkan <i class="icon-youtube"></i>&nbsp;&nbsp;konten youtube.com
                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                        menautkan <i class="icon-vimeo"></i>&nbsp;&nbsp;konten vimeo.com
                    <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                        menautkan <i class="icon-soundcloud"></i>&nbsp;&nbsp;konten soundcloud.com
                    <?php } ?>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
            </div>
            <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" style="display: none;padding: 4px 4px 0px 4px;margin: 0px;background: #000;"></div>
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
                    <h4 style="padding-left: 0px;margin-left: 0px;">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                            <?php echo $row->title; ?>
                        </a>
                    </h4>
                    <?php echo cut_text($row->description, 300); ?>
                </div>
                <div class="clearfix"></div>
            </div>            
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