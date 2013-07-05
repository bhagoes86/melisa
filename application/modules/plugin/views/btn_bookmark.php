<?php if ($bookmark_status == '') { ?>
    <button title="Lihat Nanti" id="bookmark<?php echo $content_id ?>" data-content="<?php echo $content_id ?>" data-type="<?php echo $type ?>"><i class="icon-bookmark"></i>&nbsp;</button>
    <script type="text/javascript">
        $("button#bookmark<?php echo $content_id ?>").click(function(){
            var content_id = $(this).attr('data-content');
            var type = $(this).attr('data-type');
            $.ajax({
                url: "<?php echo site_url('plugin/add_bookmark_me') ?>/"+content_id+'/'+type,
                success: function(){
                    $('button#bookmark'+content_id).fadeOut('fast');
                }
            });
            return false;
        });
    </script>
<?php } else { ?>
<?php } ?>
