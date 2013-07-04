<!--<fieldset class="feed" style="margin-top: 5px;overflow-x: ">
    <legend><i class="icon-filter"></i>Filter Fakultas</legend>
    <ul style="list-style:none;color:#aaa">
        <li>
            <?php foreach ($content as $row): ?>
                <label class="input-control radio fg-color-greenDark">
                    <input checked="" type="radio" name="id_faculty" id="id_faculty" data-id="<?php echo $row->id_faculty ?>">
                    <span class="helper" title="<?php echo $row->faculty ?>"><?php echo $row->short ?></span> 
                </label><br/>
            <?php endforeach; ?>
        </li>
    </ul>
</fieldset>
<script type="text/javascript">
    $('input[name=id_faculty]:radio').change(function(){
        var id_faculty = $(this).attr('data-id');
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_podcast_faculty') ?>/"+id_faculty,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false; 
    });
</script>-->

<fieldset class="feed" style="margin-top: 5px;">
    <legend><i class="icon-filter"></i>Filter Fakultas</legend>
    <div class="input-control select" style="width: 100%">
        <select class="fg-color-orangeDark" style="width: 100%">
                <option class="fg-color-orangeDark" href="javascript:void(0)" id="podcast_option_faculty" value="<?php echo $row->id_faculty ?>">Pilih Fakultas</option>
            <?php foreach ($content as $row): ?>
                <option class="fg-color-orangeDark" href="javascript:void(0)" id="podcast_option_faculty" value="<?php echo $row->id_faculty ?>"><?php echo $row->faculty ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</fieldset>
<script type="text/javascript">
    $("select").change(function(){
        var id_faculty = $("#podcast_option_faculty").val();
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_podcast_faculty') ?>/"+id_faculty,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false;
    });
</script>