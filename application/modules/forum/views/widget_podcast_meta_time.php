<fieldset class="feed" style="margin-top: 5px;">
    <legend><i class="icon-filter"></i>Filter Waktu</legend>
    <ul style="list-style:none;color:#aaa">
        <li>
            <label class="input-control radio fg-color-orangeDark">
                <input checked="" type="radio" name="radio">
                <span class="helper">Podcast Minggu Terakhir</span>
            </label><br/>
            <label class="input-control radio fg-color-orangeDark">
                <input checked="" type="radio" name="radio">
                <span class="helper">Podcast Bulan Sekarang</span>
            </label><br/>
            <label class="input-control radio fg-color-orangeDark">
                <input checked="" type="radio" name="radio">
                <span class="helper">Podcast Bulan Kemarin</span>
            </label><br/>
            <label class="input-control radio fg-color-orangeDark">
                <input checked="" type="radio" name="podcast-year" id="podcast-year" data-year="<?php echo date('Y') ?>">
                <span class="helper">Podcast Tahun Sekarang</span>
            </label><br/>
            <label class="input-control radio fg-color-orangeDark">
                <input checked="" type="radio" name="podcast-year" id="podcast-year" date-year="<?php echo date('Y') - 1 ?>">
                <span class="helper">Podcast Tahun Lalu</span>
            </label><br/>
            <label class="input-control radio fg-color-orangeDark">
                <input checked="" type="radio" name="radio">
                <span class="helper">Podcast Tahun < <?php echo date('Y'); ?></span>
            </label>
        </li>
    </ul>
</fieldset>
<script type="text/javascript">
    $('input[name=podcast-year]:radio').change(function(){
        var year = $(this).attr('data-year');
        alert(year);
        //        $('div.pager').remove(); 
        //        $('#message').html("Loading Data");
        //        $('#loading-template').show(); 
        //        $('#wall_container').empty(); 
        //        $('#wall_container').load("<?php echo site_url('forum/wall_content_podcast_year') ?>/"+year,function(){            
        //            $('#loading-template').fadeOut('slow');
        //            $("html, body").animate({
        //                scrollTop: 0
        //            }, 1000);
        //        });
        //        return false; 
    });
</script>