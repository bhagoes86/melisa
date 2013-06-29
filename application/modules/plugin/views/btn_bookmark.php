<?php if ($bookmark_status == '') { ?>
    <button title="bookmark" id="bookmark-<?php echo $content_id ?>" data-content="<?php echo $content_id ?>" data-type="<?php echo $type ?>"><i class="icon-bookmark"></i></button>
    <script type="text/javascript">
        $('#bookmark-<?php echo $content_id ?>').click(function(){
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#bookmark-<?php echo $content_id ?>').load("<?php echo site_url('plugin/action_bookmark' . '/' . $content_id . '/' . $type) ?>",function(){
                $('#loading-template').hide();            
            });
            return false;
        });
    </script>
<?php } else { ?>
<?php } ?>
