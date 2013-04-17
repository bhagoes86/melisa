<?php if (count($list_quiz_resource) > 0) {?>

<table>
    <tbody>
        <?php foreach ($list_quiz_resource as $row): ?>
            <tr>
                
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;"><?php echo cut_text($row->description, 45) ?> ...</p>
                
                </td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <?php
                        if ($resource_id == $row->id_quiz_resource){
                    ?>
                    <a title="Pilih Ini" href="javascript:void(0)" id="btn-choose" data-title="<?php echo $row->title?>" data-id="<?php echo $row->id_quiz_resource; ?>"><i class="icon-radio-checked fg-color-pink"></i></a>
                    <?php
                        }
                        else {
                    ?>
                    <a title="Pilih Ini" href="javascript:void(0)" id="btn-choose" data-title="<?php echo $row->title?>" data-id="<?php echo $row->id_quiz_resource; ?>"><i class="icon-radio-unchecked fg-color-pink"></i></a>
                    <?php
                        }
                    ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        <?php } else { ?>
            <tr>
                <td><h2>Tidak ada konten yang bisa dipakai....</h2></td>
            </tr>
        <?php }?>
<script type="text/javascript">

    $('a#btn-delete-attachment').click(function(){
        var id_quiz_res = $(this).attr('data-id');

        $('#message').html("Loading Data");
        $('#loading-template').show();
        $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/update_quiz_soal_resource') ?>/<?php echo $id_soal?>/"+id_quiz_res,
                data:id_quiz_res,
                success:function (data) {
                    $('#list-resource').load("<?php echo site_url('quiz/list_all_quiz_attachment') ?>/<?php echo $id_soal?>");
                    $('#resource-detail').html('Anda tidak memilih resource manapun ...');
                    $('#loading-template').fadeOut("slow");
                },
                error:function (data){
                    $('#loading-template').fadeOut("slow");
                    alert('gagal');
                }
            });
            return false;
    });

    
    $('a#btn-choose').click(function(){
        var id_quiz_res = $(this).attr('data-id');
        var quiz_res_title = $(this).attr('data-title');

        $('#message').html("Loading Data");
        $('#loading-template').show();
        $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/update_quiz_soal_resource') ?>/<?php echo $id_soal?>/"+id_quiz_res,
                data:id_quiz_res,
                success:function (data) {
                    $('#list-resource').load("<?php echo site_url('quiz/list_all_quiz_attachment') ?>/<?php echo $id_soal?>");
                    $('#resource-detail').html('Anda memilih resource dengan id : <br/>'+ quiz_res_title+'<a title="Hapus Attachment ini.." href="javascript:void(0)" id="btn-delete-attachment" data-id="0"  ><i class="icon-cancel fg-color-pink"></i></a>');
                    $('#loading-template').fadeOut("slow");
                },
                error:function (data){
                    $('#loading-template').fadeOut("slow");
                    alert('gagal');
                }
            });
            return false;
    });





    $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_quiz_res = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/delete_quiz_resource') ?>/"+id_quiz_res,
                data:id_quiz_res,
                success:function (data) {
                    $('#list-quiz-resource-area').load("<?php echo site_url('quiz/list_all_quiz_resource') ?>",function(){
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


    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda yakin akan menghapus kuis ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });


</script>