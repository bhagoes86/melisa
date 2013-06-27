<button title="Unduh" id="download" data-file="<?php echo $file ?>"><i class="icon-download"></i></button>
<script type="text/javascript">
    $('button#download').click(function(){
        file = $(this).attr('data-file');
        window.open("<?php echo base_url() ?>resource/"+file,"_blank");
        return false;
    })
</script>
