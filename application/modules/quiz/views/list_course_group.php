<div >
<h3>Pilih Kuliah yang diikuti grup</h3>
<form id="insert-to-course">
    <div class="input-control select span6">
        <select name="course" id="course">
            <?php foreach ($list_course as $course): ?>
                <option value="<?php echo $course->id_course; ?>"><?php echo $course->course; ?></option>
            <?php endforeach; ?>
        </select>
    </div>&nbsp;
    <input type="hidden" name="group_id" id="group_id" value="<?php echo $group_id; ?>"/>
    <input type="submit" value="Tambahkan"/>
</form>


<?php if ($list_avail_quiz_course > 0) {?>

<table>
    <tbody>
        <?php foreach ($list_course_chosen as $course_chosen): ?>
            <tr>

                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $course_chosen->course ?></a><br/>
                </td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $course_chosen->id_quiz_course_group; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?>
    <tr>
        <td><h2>Tidak ada  course yang memakai grup ini....</h2></td>
    </tr>
<?php }?>
</div>


<script type="text/javascript">
    
    $('form#insert-to-course').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('quiz/add_course_group'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{
                    $('#content-right').load("<?php echo site_url('quiz/edit_group' . '/' . $group_id) ?>");
                    $('#loading-template').fadeOut("slow");
                    $('#content-right').fadeIn("fast");
                }
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#edit-course').fadeIn("fast");
            }
        });
        return false;
    });

    $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_group = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/delete_course_group') ?>/"+id_group,
                data:id_group,
                success:function (data) {
                    $('#content-right').load("<?php echo site_url('quiz/edit_group') ?>/"+<?php echo $group_id?>,function(){
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
        $('#message-confirm').html('Apakah Anda akan mencabut kuis dari grup ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });

</script>