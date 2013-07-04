<fieldset class="feed" style="margin-top: 5px;">
    <legend style="padding-top: 2px;"><i class="icon-filter"></i>Filter Presentasi Fakultas</legend>
    <div class="input-control select" style="width: 100%">
        <select id="presentation-filter-faculty" style="width: 100%">
            <option href="javascript:void(0)">Pilih Fakultas</option>
            <?php foreach ($content as $row): ?>
                <option href="javascript:void(0)" value="<?php echo $row->id_faculty ?>"><?php echo $row->faculty ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</fieldset>
<script type="text/javascript">
    $("select#presentation-filter-faculty").change(function(){
        var id_faculty = $("#presentation-filter-faculty").val();
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_presentation_faculty') ?>/"+id_faculty,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false;
    });
</script>