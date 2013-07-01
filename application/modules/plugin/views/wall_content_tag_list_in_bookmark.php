<?php if ($tag_counter == '') { ?>
<?php } else { ?>
    <div class="text" style="border-top: 1px solid #bbb;" id="tags-content-<?php echo $content_id ?>">
        <?php foreach ($content as $row): ?>
            <a href="javascript:void(0)" id="btn-tags-content-<?php echo $row->content_id ?>" data-tag="<?php echo $row->tag ?>"><i class="icon-bookmark-3"></i> <?php echo $row->tag ?></a>
        <?php endforeach; ?>
    </div>
    <div id="tags-content-container-<?php echo $content_id ?>" style="display: none;"></div>
    <script type="text/javascript">
        $('a#btn-tags-content-<?php echo $content_id ?>').click(function(){
            var tag = $(this).attr('data-tag');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('plugin/get_content_from_tag_in_bookmark') ?>/"+tag,
                data:$(this).serialize(),
                success: function (data, status)
                {
                    $('#tags-content-container-<?php echo $content_id ?>').html(data);
                    $('#tags-content-container-<?php echo $content_id ?>').slideToggle('fast');
                },
                error: function (data, status, e)
                {
                }
            });
        });
    </script>
<?php } ?>