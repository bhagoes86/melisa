<fieldset class="feed" style="margin-top: 5px;">
    <legend><i class="icon-filter"></i>Filter Waktu</legend>
    <select>
        <option href="javascript:void(0)" id="podcast_option" data-year="<?php echo date('Y'); ?>"><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y'); ?>">Pilih </a></option>
        <option href="javascript:void(0)" id="podcast_option" data-year="<?php echo date('Y'); ?>"><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y'); ?>">Tahun Sekarang</a></option>
        <option href="javascript:void(0)" id="podcast_option" data-year="<?php echo date('Y') - 1; ?>"><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y') - 1; ?>">Tahun Kemarin</a></option>
    </select>
</fieldset>
<script type="text/javascript">
    $('option#podcast_time').select(function(){
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