<?php foreach ($content as $row): ?>
    <?php if ($row->type == 0) { ?>
        <!--Video-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="image link-image">
            <a href="javascript:void(0)" id="pic-bookmark-activate" data-id="<?php echo $row->id_content ?>">
                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;"/>
            </a>
            <div class="description">
                <a href="javascript:void(0)" id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } elseif ($row->type == 1) { ?>
        <!--document-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="image link-image">
            <a href="javascript:void(0)" id="pic-bookmark-activate" data-id="<?php echo $row->id_content ?>">
                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 120px;height: 135px;vertical-align: middle;border-right: 1px solid #bbb;">
            </a>
            <div class="description">
                <a href="javascript:void(0)" id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } elseif ($row->type == 2) { ?>
        <!--Youtube-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="image link-image">
            <?php
            $media = analyze_media($row->file);
            $extract_id = explode('^^^', $media);
            ?>
            <a href="javascript:void(0)" id="pic-bookmark-activate" data-id="<?php echo $row->id_content ?>">
                <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
            </a>
            <div class="description">
                <a href="javascript:void(0)" id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } elseif ($row->type == 3) { ?>
        <!--Vimeo-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="image link-image">
            <?php $media = vimeo_cover($row->file); ?>
            <a href="javascript:void(0)" id="pic-bookmark-activate" data-id="<?php echo $row->id_content ?>">
                <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
            </a>
            <div class="description">
                <a href="javascript:void(0)" id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } elseif ($row->type == 5) { ?>
        <!--scribd-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="text" style="border: 1px solid #bbb;color: #bbb;">
            <a id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><i class="icon-file-pdf"></i>&nbsp;<?php echo $row->file ?></a>
        </div>
    <?php } elseif ($row->type == 5) { ?>
        <!--slideshare-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="image link-image">
            <?php
            $media = analyze_media($row->file);
            $extract_id = explode('^^^', $media);
            $url = $extract_id[1];
            $thumb = explode("/", slideshare_cover($url)->thumbnail);
            $thumbnail = slideshare_cover($url)->thumbnail;
            ?>
            <a href="javascript:void(0)" id="pic-bookmark-activate" data-id="<?php echo $row->id_content ?>">
                <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;height: 123px;vertical-align: middle;border-right: 1px solid #bbb;">
            </a>
            <div class="description">
                <a href="javascript:void(0)" id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } elseif ($row->type == 6) { ?>
        <!--SoundCloud-->
        <div class="text" style="background: #bbb;border:1px solid #bbb;vertical-align: middle;padding: 0px;width: 100%;height: 168px;">
            <div id="putTheWidgetHere-<?php echo $row->file ?>" style="height: 168px;"></div>
            <script type="text/JavaScript">
                SC.oEmbed("<?php echo $row->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere-<?php echo $row->file ?>"));
            </script>
        </div>
    <?php } elseif ($row->type == 7) { ?>
        <!--docstoc-->
        <div class="text" id="wall-bookmark-viewer-<?php echo $row->id_content ?>" data-id="<?php echo $row->id_content ?>" style="display: none;padding: 0px;vertical-align: middle;margin: 0px;background: rgba(0,0,0,0.10);"></div>                            
        <div class="image link-image">
            <?php
            $media = analyze_media($row->file);
            $extract_id = explode('^^^', $media);
            ?>
            <a href="javascript:void(0)" id="pic-bookmark-activate" data-id="<?php echo $row->id_content ?>">
                <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;border-right: 1px solid #bbb;">
            </a>
            <div class="description">
                <a href="javascript:void(0)" id="btn-bookmark-activate" data-id="<?php echo $row->id_content ?>"><?php echo word_wrap(nl2br(auto_link($row->title)), 40); ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } ?>
<?php endforeach; ?>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script>
    //text activate preview
    $('a#btn-bookmark-activate').click(function(){
        var id_content = $(this).attr('data-id');
        $('#wall-bookmark-viewer-'+id_content).slideToggle('fast');
        $('#wall-bookmark-viewer-'+id_content).load("<?php echo site_url('forum/wall_content_player') ?>/"+id_content);           
        return false;
    });
    //picture activate preview
    $('a#pic-bookmark-activate').click(function(){
        var id_content = $(this).attr('data-id');
        $('#wall-bookmark-viewer-'+id_content).slideToggle('fast');
        $('#wall-bookmark-viewer-'+id_content).load("<?php echo site_url('forum/wall_content_player') ?>/"+id_content);
        return false;
    });
    //plugin soundcloud
    SC.initialize({
        client_id: "938418853596f90572983f377348dc57"
    });
</script>