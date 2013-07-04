<!--<fieldset class="feed" style="margin-top: 5px;">
    <legend style="padding-top: 2px;"><i class="icon-filter"></i>Filter Waktu Dokumen</legend>
    <div class="input-control select" style="width: 100%">
        <select id="document_option_time" style="width: 100%">
            <option href="javascript:void(0)" value="<?php echo date('Y'); ?>"><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y'); ?>">Pilih Waktu</a></option>
            <option href="javascript:void(0)" value="<?php echo date('Y'); ?>"><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y'); ?>">Tahun Sekarang</a></option>
            <option href="javascript:void(0)" value="<?php echo date('Y') - 1; ?>"><a href="javascript:void(0)" id="podcast_time" data-year="<?php echo date('Y') - 1; ?>">Tahun Kemarin</a></option>
        </select>
    </div>
</fieldset>
<script type="text/javascript">
    $("select#document_option_time").change(function(){
        var year = $("#document_option_time").val();
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_document_year') ?>/"+year,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false;
    });
</script>-->

<fieldset class="feed" style="margin-top: 5px;">
    <legend style="padding-top: 2px;"><i class="icon-filter"></i>Filter Dokumen Fakultas</legend>
    <div class="input-control select" style="width: 100%">
        <select id="document-filter-faculty" style="width: 100%">
            <option href="javascript:void(0)">Pilih Fakultas</option>
            <?php foreach ($content as $row): ?>
                <option href="javascript:void(0)" value="<?php echo $row->id_faculty ?>"><?php echo $row->faculty ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</fieldset>
<script type="text/javascript">
    $("select#document-filter-faculty").change(function(){
        var id_faculty = $("#document-filter-faculty").val();
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_document_year') ?>/"+id_faculty,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false;
    });
</script>