<fieldset class="feed" style="margin-top: 5px;">
    <legend style="padding-top: 2px;"><i class="icon-filter"></i>Filter Waktu Dokumen</legend>
    <div class="input-control select" style="width: 100%">
        <select id="document_option_time" style="width: 100%">
            <option href="javascript:void(0)" value="<?php echo date('Y'); ?>" data-month="0">Pilih Waktu</option>
            <option href="javascript:void(0)" value="<?php echo date('Y'); ?>" data-month="<?php echo date('m'); ?>">Bulan Sekarang</option>
            <option href="javascript:void(0)" value="<?php echo date('Y'); ?>" data-month="<?php echo date('m') - 01; ?>">Bulan lalu</option>
            <option href="javascript:void(0)" value="<?php echo date('Y'); ?>" data-month="0">Tahun Sekarang</option>
            <option href="javascript:void(0)" value="<?php echo date('Y') - 1; ?>" data-month="0">Tahun Kemarin</option>
        </select>
    </div>
</fieldset>
<script type="text/javascript">
    $("select#document_option_time").change(function(){
        var year = $("#document_option_time").val();
        var month = $("#document_option_time option:selected").attr("data-month");
        $('div.pager').remove(); 
        $('#message').html("Loading Data");
        $('#loading-template').show(); 
        $('#wall_container').empty(); 
        $('#wall_container').load("<?php echo site_url('forum/wall_content_document_year') ?>/"+year+"/"+month,function(){            
            $('#loading-template').fadeOut('slow');
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        return false;
    });
</script>