<fieldset class="feed" style="margin-top: 5px;">
    <legend>Trend Topik</legend>
    <ul style="list-style:none;color:#aaa">
        <?php foreach ($trending as $row): ?>
            <li> <a id="wall-trending" style="text-decoration: none;cursor: pointer;" data-tag="<?php echo $row->tag ?>"><i class="icon-tag"></i> <?php echo $row->tag ?></a></li>
        <?php endforeach; ?>
    </ul>
</fieldset>
<script type="text/javascript">
    $('a#wall-trending').click(function(){
        var tag = $(this).attr('data-tag');
        $('div.pager').remove();                
        $('#message').html("Loading Data");
        $('#loading-template').show();                
        $('#wall_container').empty();                
        //        $('#wall_container').load("<?php // echo site_url('forum/content_list_by_tag') ?>/"+tag,function(){                
        //            $('#loading-template').fadeOut("slow");
        //        });
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('forum/content_list_by_tag') ?>/"+tag,
            data:$(this).serialize(),
            success: function (data, status)
            {
                $('#wall_container').html(data);
                $('#wall_container').slideDown('fast');
            },
            error: function (data, status, e)
            {
            }
        });
    });
</script>