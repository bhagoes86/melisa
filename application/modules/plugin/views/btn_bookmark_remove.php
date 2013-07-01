<button title="Hapus" id="remove-bookmark<?php echo $content_id ?>" data-id="<?php echo $content_id ?>" data-type="<?php echo $type ?>" style="text-align: center;"><i class="icon-cancel"></i>&nbsp;</button>
<script type="text/javascript">
    $("button#remove-bookmark<?php echo $content_id ?>").click(function(){
        var content_id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var answer = confirm('Apakah anda yakin akan menghapus konten ini ?')
        if (answer == true){            
            $('#content'+content_id).slideUp('slow');        
            $.ajax({
                url: "<?php echo site_url('plugin/delete_bookmark_me') ?>/"+content_id+'/'+type,
                success: function(){
                    $('#content'+content_id).slideUp('slow');
                }
            });
        }else{
            alert('Konten tidak jadi dihapus');
        }        
        return false;
    });
</script>