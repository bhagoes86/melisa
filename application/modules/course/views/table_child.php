
<?php foreach ($silabus_anak as $row): ?>
    <tr>
        <td>
            <a style="text-decoration: none;margin-left:20px;cursor: pointer; " ><?php echo $row->deskripsi; ?></a>
        </td>

        <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
            <a title="edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id_silabus; ?>"><i class="icon-pencil fg-color-pink"></i></a>
            <a title="hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_silabus; ?>"><i class="icon-remove fg-color-red"></i></a>
        </td>
    </tr>
<?php endforeach; ?>
<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>
<script type="text/javascript">
    
    var id=<?php echo $id ?>;
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_silabus = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('course/silabus_edit') ?>/"+id_silabus+"/"+id,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda yakin akan menghapus berita ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });
    
    $('#accept-confirm-message').click(function(){
        $('#message').html('Sedang Menghapus .... ');
        $('#confirm-template').fadeOut("medium");
        $('#loading-template').fadeIn("slow");
        var id_silabus = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/delete_silabus') ?>/"+id_silabus,
            data:id,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/course_silabus') ?>/"+id,function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                alert('gagal');
            }
        });
        return false;
    });

    $('#cancel-confirm-message').click(function(){
        $('#confirm-template').fadeOut("medium");
    });
</script>