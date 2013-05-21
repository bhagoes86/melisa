<div class="comments comment-form hide" id="tags-list-form-<?php echo $content_id ?>">
    <form id="submit-tag-<?php echo $content_id ?>" method="POST" accept-charset="utf-8">
        <div class="input-control">
            <input type="text" name="tag" id="tag" placeholder ="Tag"/>
        </div>
        <div class="input-control">
            <input type="submit" value="Tag" class="tool-button"/>
        </div>
        <input type="hidden" id="content_id" name="content_id" value="<?php echo $content_id ?>"/>
        <input type="hidden" id="tag_type" name="tag_type" value="<?php echo $tag_type ?>"/>
    </form>
</div>
<script type="text/javascript">
    
    $('#submit-tag-<?php echo $content_id ?>').submit(function(){
        $('#message').html('Proses Input');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('forum/add_tag') ?>",
            data:$(this).serialize(),
            success: function (data, status)
            {
                $('#loading-template').fadeOut("slow");
                $('#tags-list-form-<?php echo $content_id ?>').slideUp("fast");
                $('#tags<?php echo $content_id ?>').load("<?php echo site_url('forum/counter_tag' . '/' . $content_id . '/' . $tag_type) ?>");
                //$('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
                
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#tags-list-form-<?php echo $content_id ?>').slideUp("fast");
                //$('#row-main-content').load("<?php echo site_url('content/shortcut') ?>");
            }
        });
        return false;
    });
</script>
