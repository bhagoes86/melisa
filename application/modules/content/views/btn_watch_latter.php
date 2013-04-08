<button id="do-watch-latter" class="bg-color-orange fg-color-white" data-id="<?php echo $content_id ?>" data-type="<?php echo $type ?>"><i class="icon-bookmark"></i> Lihat Nanti</button>
<script type="text/javascript">
    $('#do-watch-latter').click(function(){    
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var content_id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/do_content_bookmark'); ?>/"+content_id+"/"+type,
            data:$(this).serialize(),
            success:function (data) {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html(data);
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
</script>