<fieldset class="feed" style="margin-top: 5px;">
    <legend><i class="icon-filter"></i>Filter Waktu</legend>
    <select>
        <option><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y'); ?>">Tahun Sekarang</a></option>
        <option><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y') - 1; ?>">Tahun Kemarin</a></option>
    </option>
</fieldset>
<script type="text/javascript">
    $('a#podcast_time').click(function(){
        var year = $(this).attr('data-year');
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_podcast_year') ?>/"+year,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false; 
    });
</script>