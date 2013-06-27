<button title="Unduh" id="download<?php echo $file ?>" data-file="<?php echo $file ?>"><i class="icon-download"></i></button>
<script type="text/javascript">
    $('button#download<?php echo $file ?>').click(function(){
        file = $(this).attr('data-file');
        location.href("<?php echo base_url() ?>resource/"+file,"_blank");
        return false;
    })
</script>
