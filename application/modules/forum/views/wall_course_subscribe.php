<style type="text/css">
    .pager {overflow:hidden;padding-top:0px;}
    .pager li{float:left;margin-left: 7px;list-style-type:none;margin-right:.3em;font-size:1.1em;}
</style>
<?php foreach ($content as $row): ?>
    <li class="feed-link" id="content<?php echo $row->id_course ?>">
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
                    Pengelola Kuliah <a href="<?php echo site_url('forum' . '/' . $row->user_id) ?>"><?php echo modules::run('authz/get_username', $row->user_id) ?></a> 
                </h4>
                <span class="date-meta">Dibuka Sejak <?php echo nicetime(dtm2timestamp($row->date)) ?></span>
            </div>
            <div class="text" id="wall-content-viewer-<?php echo $row->id_course ?>" data-id="<?php echo $row->id_course ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>            
            <div class="image link-image">
                <a href="javascript:void(0)" id="pic-content-activate" data-id="<?php echo $row->id_course ?>">
                    <img src="<?php echo base_url() . 'resource/' . $row->picture ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;"/>
                </a>
                <div class="description">
                    <a href="javascript:void(0)" id="btn-content-activate" data-id="<?php echo $row->id_course ?>"><?php echo word_wrap(nl2br(auto_link($row->course)), 40); ?></a>
                </div>
                <div class="clearfix"></div>
            </div>                
            <div class="text"><?php echo nl2br($row->description) ?></div>
            <div class="utils">                    
                <div class="toolbar place-left">
                    <?php echo modules::run('plugin/btn_subscribe', $row->id_course) ?>
                </div>
                <div class="toolbar place-right"></div>
                <div class="clearfix"></div>
            </div>                   
        </div>
    </li>
<?php endforeach; ?>
<script>
    $('#wall_container').flexipage({perpage:10});
</script>