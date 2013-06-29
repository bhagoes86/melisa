<?php foreach ($content as $row): ?>
    <?php if ($row->forum_type == 0) { ?>
        <!--Video-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <!--more todo-->
            </div>
        </li>
    <?php } elseif ($row->forum_type == 1) { ?>
        <!--document-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                        <a href="javascript:void(0)" target="_blank" style="text-decoration: none;cursor: pointer;color: #2f3e46;">mengunggah <i class="icon-libreoffice"></i>&nbsp;&nbsp;konten dokumen</a>
                    </h4>
                    <span class="date-meta"><?php echo nicetime(dtm2timestamp($row->date)) ?></span>
                </div>
                <!--more todo-->
            </div>
        </li>
    <?php } elseif ($row->forum_type == 2) { ?>
        <!--Youtube-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" id="wall-content-viewer-<?php echo $row->id_wall ?>" data-id="<?php echo $row->id_wall ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->url);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_wall ?>">
                        <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_wall ?>"><?php echo word_wrap(nl2br(auto_link($row->url)), 40); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><?php echo $row->message ?></div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 3) { ?>
        <!--Vimeo-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" id="wall-content-viewer-<?php echo $row->id_wall ?>" data-id="<?php echo $row->id_wall ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php $media = vimeo_cover($row->url); ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_wall ?>">
                        <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_wall ?>"><?php echo word_wrap(nl2br(auto_link($row->url)), 20) ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text"><?php echo $row->message ?></div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 4) { ?>
        <!--scribd-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" id="wall-content-viewer-<?php echo $row->id_wall ?>" data-id="<?php echo $row->id_wall ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="text" style="border: 1px solid #bbb;color: #bbb;">
                    <a id="btn-content-activate" data-id="<?php echo $row->id_wall ?>"><i class="icon-file-pdf"></i>&nbsp;<?php echo $row->url ?></a>
                </div>
                <div class="text">
                    <p><?php echo nl2br($row->message) ?></p>
                </div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 6) { ?>
        <!--SoundCloud-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" style="background: #bbb;border:1px solid #bbb;vertical-align: middle;padding: 0px;width: 100%;height: 168px;">
                    <div id="putTheWidgetHere-<?php echo $row->url ?>" style="height: 168px;"></div>
                    <script type="text/JavaScript">
                        SC.oEmbed("<?php echo $row->url ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere-<?php echo $row->url ?>"));
                    </script>
                </div>
                <div class="text">
                    <p><?php echo nl2br($row->message) ?></p>
                </div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 5) { ?>
        <!--slideshare-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" id="wall-content-viewer-<?php echo $row->id_wall ?>" data-id="<?php echo $row->id_wall ?>" style="height: 380px;display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->url);
                    $extract_id = explode('^^^', $media);
                    $url = $extract_id[1];
                    $thumb = explode("/", slideshare_cover($url)->thumbnail);
                    $thumbnail = slideshare_cover($url)->thumbnail;
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_wall ?>">
                        <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_wall ?>"><?php echo word_wrap(nl2br(auto_link($row->url)), 20) ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text">
                    <p><?php echo nl2br($row->message) ?></p>
                </div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 7) { ?>
        <!--docstoc-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" id="wall-content-viewer-<?php echo $row->id_wall ?>" data-id="<?php echo $row->id_wall ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
                <div class="image link-image">
                    <?php
                    $media = analyze_media($row->url);
                    $extract_id = explode('^^^', $media);
                    ?>
                    <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_wall ?>">
                        <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;border-right: 1px solid #bbb;">
                    </a>
                    <div class="description">
                        <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_wall ?>"><?php echo splitPhrase($row->url, 15) ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="text">
                    <p><?php echo nl2br($row->message) ?></p>
                </div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 9) { ?>
        <!--picture-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="image video-image" style="margin-bottom: 0px;padding-bottom: 0px;">
                    <img src="<?php echo base_url() . 'resource/' . $row->url ?>" style="margin-bottom: 0px;padding-bottom: 0px;">
                    <div class="description"><?php echo nl2br($row->message) ?></div>
                </div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } elseif ($row->forum_type == 10) { ?>
        <!--plain-->
        <li class="feed-link" id="wall<?php echo $row->id_wall ?>">
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
                <div class="text" style="border-top: 1px solid #bbb;">
                    <p><?php echo nl2br($row->message) ?></p>
                </div>
                <div class="utils">
                    <div class="toolbar place-left">
                    </div>
                    <div class="toolbar place-right">
                        <button title="Hapus" id="remove-status" data-id="<?php echo $row->id_wall ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </li>
    <?php } ?>
<?php endforeach; ?>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script>
    //delete
    $("button#remove-status").click(function(){
        var id = $(this).attr('data-id');
        var answer = confirm('Apakah anda yakin akan menghapus konten ini ?')
        if (answer == true){            
            $('#wall'+id).fadeOut('slow');        
            $.ajax({
                url: "<?php echo site_url('forum/delete_wall') ?>/"+id,
                success: function(){
                    $('#wall'+id).fadeOut('slow');
                }
            });
        }else{
            alert('Konten tidak jadi dihapus');
        }        
        return false;
    });
    //text activate preview
    $('a#btn-content-activate').click(function(){
        var id_wall = $(this).attr('data-id');
        $('#wall-content-viewer-'+id_wall).slideToggle('fast');
        $('#wall-content-viewer-'+id_wall).load("<?php echo site_url('forum/wall_player') ?>/"+id_wall);           
        return false;
    });
    //picture activate preview
    $('a#pic-content-activate').click(function(){
        var id_wall = $(this).attr('data-id');
        $('#wall-content-viewer-'+id_wall).slideToggle('fast');
        $('#wall-content-viewer-'+id_wall).load("<?php echo site_url('forum/wall_player') ?>/"+id_wall);
        return false;
    });
    //plugin soundcloud
    SC.initialize({
        client_id: "938418853596f90572983f377348dc57"
    });
</script>