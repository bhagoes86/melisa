<button title="broadcast" id="broadcast-<?php echo $content_id ?>" data-content="<?php echo $content_id ?>" data-type="<?php echo $type ?>"><i class="icon-broadcast"></i> <span class="badge"><?php echo $count ?></span></button>
<script type="text/javascript">
    $('#broadcast-<?php echo $content_id ?>').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#broadcast-<?php echo $content_id ?>').load("<?php echo site_url('forum/action_broadcast' . '/' . $content_id . '/' . $type) ?>",function(){
            $('#loading-template').hide();            
        });
        return false;
    });
</script>
