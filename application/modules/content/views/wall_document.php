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
                    <?php if ($row->type == 1) { ?><!--document-->
                        <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-libreoffice"></i>&nbsp;&nbsp;konten dokumen</a>
                    <?php } elseif ($row->type == 4) { ?><!--scribd-->
                        <a href="<?php echo site_url('content/scribd' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-pdf"></i>&nbsp;&nbsp;konten scribd.com</a>
                    <?php } elseif ($row->type == 5) { ?><!--slideshare-->
                        <a href="<?php echo site_url('content/slideshare' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-powerpoint"></i>&nbsp;&nbsp;konten slideshare.net</a>
                    <?php } elseif ($row->type == 7) { ?><!--docstoc-->
                        <a href="<?php echo site_url('content/docstoc' . '/' . $row->id_content) ?>" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">menautkan <i class="icon-file-word"></i>&nbsp;&nbsp;konten docstoc.com</a>
                    <?php } ?>
                </h4>
                <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
            </div>
            <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" style="display: none;padding: 4px 4px 0px 4px;margin: 0px;background: #000;"></div>
            <div class="image link-image">
                <?php if ($row->type == 1) { ?><!--document-->
                    <?php if ($row->cover == 0) { ?>
                        <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                            <!--<i class="icon-file" style="font-size: 45px;"></i>-->
                        </a>
                    <?php } else { ?>
                        <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                            <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;vertical-align: middle;"/>
                        </a>
                    <?php } ?>
                <?php } elseif ($row->type == 4) { ?><!--scribd-->
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <!--<i class="icon-file" style="font-size: 45px;"></i>-->
                    </a>
                <?php } elseif ($row->type == 5) { ?><!--slideshare-->
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    $url = $extract_id[1];
                    $thumb = explode("/", slideshare_cover($url)->thumbnail);
                    $thumbnail = slideshare_cover($url)->thumbnail;
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;vertical-align: middle;">
                    </a>
                <?php } elseif ($row->type == 7) { ?><!--docstoc-->
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;">
                    </a>
                <?php } ?>
                <div class="description" style="padding-left: 141px;">
                    <h4 style="padding-left: 0px;margin-left: 0px;">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>">                            
                            <?php echo $row->title; ?>
                        </a>
                    </h4>
                    <?php echo CutText($row->description, 150); ?>...
                    <?php if ($row->type == 1) { ?><!--document-->
                        <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } elseif ($row->type == 4) { ?><!--scribd-->
                        <a href="<?php echo site_url('content/scribd' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } elseif ($row->type == 5) { ?><!--slideshare-->
                        <a href="<?php echo site_url('content/slideshare' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } elseif ($row->type == 7) { ?><!--docstoc-->
                        <a href="<?php echo site_url('content/docstoc' . '/' . $row->id_content) ?>" target="_blank">selengkapnya</a>
                    <?php } ?>
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