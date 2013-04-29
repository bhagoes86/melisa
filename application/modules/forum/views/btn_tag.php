<button title="tags" id="tags<?php echo $content_id ?>" data-content="<?php echo $content_id ?>" data-type="<?php echo $type ?>"><i class="icon-tag"></i> <span class="badge"><?php echo $count ?></span></button>
<script type="text/javascript">
    $('#tags<?php echo $content_id ?>').click(function(){        
        $('#tags-list-form-<?php echo $content_id ?>').slideToggle('fast');
        return false;
    });
</script>