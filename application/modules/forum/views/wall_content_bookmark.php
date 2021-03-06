<style type="text/css">
    .pager {overflow:hidden;padding-top:0px;}
    .pager li{float:left;margin-left: 7px;list-style-type:none;margin-right:.3em;font-size:1.1em;}
</style>
<?php foreach ($content as $row): ?>
    <?php if ($row->type == 0) { ?>
        <!--Video-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;"/>
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>                
                <div class="text"><?php echo nl2br($row->description) ?></div>
                <div class="utils">                    
                    <div class="toolbar place-left">                        
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 0) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 0) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 0) ?>                    
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 0) ?>                        
            </div>
        </li>
    <?php } elseif ($row->type == 1) { ?>
        <!--document-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 120px;height: 135px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><p><?php echo nl2br($row->description) ?></p></div>
                <div class="utils">                    
                    <div class="toolbar place-left">                        
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 1) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 1) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 1) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 1) ?> 
            </div>
        </li>
    <?php } elseif ($row->type == 2) { ?>
        <!--Youtube-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><?php echo nl2br($row->description) ?></div>
                <div class="utils">                    
                    <div class="toolbar place-left">                        
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 2) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 2) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 2) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 2) ?>                        
            </div>
        </li>
    <?php } elseif ($row->type == 3) { ?>
        <!--Vimeo-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php $media = vimeo_cover($row->file); ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><?php echo nl2br($row->description) ?></div> 
                <div class="utils">                    
                    <div class="toolbar place-left">
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 3) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 3) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 3) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 3) ?>  
            </div>
        </li>
    <?php } elseif ($row->type == 4) { ?>
        <!--scribd-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="text" style="border: 1px solid #bbb;color: #bbb;">
                    <a id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><i class="icon-file-pdf"></i>&nbsp;<?php echo $row->file ?></a>
                </div>
                <div class="text"><p><?php echo nl2br($row->description) ?></p></div>
                <div class="utils">                    
                    <div class="toolbar place-left">
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 4) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 4) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 4) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 4) ?> 
            </div>
        </li>
    <?php } elseif ($row->type == 5) { ?>
        <!--slideshare-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="height: 380px;display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    $url = $extract_id[1];
                    $thumb = explode("/", slideshare_cover($url)->thumbnail);
                    $thumbnail = slideshare_cover($url)->thumbnail;
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><p><?php echo nl2br($row->description) ?></p></div>
                <div class="utils">                    
                    <div class="toolbar place-left">
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 5) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 5) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 5) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 5) ?>  
            </div>
        </li>
    <?php } elseif ($row->type == 6) { ?>
        <!--SoundCloud-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" style="background: #bbb;border:1px solid #bbb;vertical-align: middle;padding: 0px;width: 100%;height: 168px;">
                    <div id="putTheWidgetHere-<?php echo $row->file ?>" style="height: 168px;"></div>
                    <script type="text/JavaScript">
                        SC.oEmbed("<?php echo $row->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere-<?php echo $row->file ?>"));
                    </script>
                </div>
                <div class="text"><p><?php echo nl2br($row->description) ?></p></div>
                <div class="utils">                    
                    <div class="toolbar place-left">
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 6) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 6) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 6) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 6) ?>  
            </div>
        </li>
    <?php } elseif ($row->type == 7) { ?>
        <!--docstoc-->
        <li class="feed-link" id="content<?php echo $row->id_content ?>">
            <span class="feed-avatar">
                <?php if ($row->profic == '') { ?>
                    <img src="<?php echo base_url() . 'asset/css/images/photo-default.png' ?>" class="userphoto" style="padding-right: 0px;width: 100%;height: 59px;"/>
                <?php } else { ?>
                    <?php
                    $profpic = 'resource/' . $row->profic;
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
                        <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <?php echo modules::run('plugin/tag_content_by_id_limit', $row->id_content, 3) ?>
                <div class="text" id="wall-content-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->file);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_content ?>">
                        <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><p><?php echo nl2br($row->description) ?></p></div>
                <div class="utils">                    
                    <div class="toolbar place-left">
                        <?php echo modules::run('forum/btn_broadcast', $row->id_content, 7) ?>
                    </div>
                    <div class="toolbar place-right">
                        <?php echo modules::run('forum/btn_tags', $row->id_content, 7) ?>
                        <?php echo modules::run('plugin/btn_bookmark_remove', $row->id_content, 7) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php echo modules::run('forum/form_tag_add', $row->id_content, 7) ?> 
            </div>
        </li>  
    <?php } ?>
<?php endforeach; ?>
<script>
    $('#wall_container').flexipage({
        perpage:10
    });
    //text activate preview
    $('a#btn-content-activate').click(function(){
        var id_content = $(this).attr('data-id');
        $('#wall-content-viewer-'+id_content).slideToggle('fast');
        $('#wall-content-viewer-'+id_content).load("<?php echo site_url('forum/wall_content_player') ?>/"+id_content);           
        return false;
    });
    //picture activate preview
    $('a#pic-content-activate').click(function(){
        var id_content = $(this).attr('data-id');
        $('#wall-content-viewer-'+id_content).slideToggle('fast');
        $('#wall-content-viewer-'+id_content).load("<?php echo site_url('forum/wall_content_player') ?>/"+id_content);
        return false;
    });
    //plugin soundcloud
    SC.initialize({
        client_id: "938418853596f90572983f377348dc57"
    });
</script>