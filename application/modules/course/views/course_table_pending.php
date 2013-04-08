<a id="btn-add-course" class="button bg-color-yellow"><i class="icon-plus"></i> Buka Kuliah</a>
<table>
    <tbody>
        <?php foreach ($content as $row): ?>
            <tr>
                <td style="border: 1px solid white;background:white;width: 180px;padding: 0px;margin: 0px;">
                    <?php if ($row->picture == "") { ?>
                        <a id="add-cover-course" class="button" data-id="<?php echo $row->id_course ?>"><i class="icon-pencil"></i> Sampul</a>
                    <?php } else { ?>
                        <img src="<?php echo base_url() . 'resource/' . $row->picture ?>" style="width: 180px;height: 120px;padding: 0px;margin: 0px;"/>
                    <?php } ?>
                </td>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->course ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;"><?php echo cut_text($row->description, 45) ?> ...</p>
                </td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Verifikasi" href="javascript:void(0)" id="btn-approve" data-id="<?php echo $row->id_course; ?>"><i class="icon-checkmark fg-color-green"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $('a#btn-approve').click(function(){
        $('#message').html('Konten Disetujui');
        $('#loading-template').show();
        var id_course = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/publish_course') ?>/"+id_course,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/course_pending') ?>",function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#message-error').html('Proses Gagal');
                $('#error-template').show();
            }
        });
        return false; 
    });
</script>