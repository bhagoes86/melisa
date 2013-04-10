<a class="button bg-color-green fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kelola Kuis</a>
<a class="button bg-color-orange fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kuliah</a>
<a class="button bg-color-red fg-color-white" id="quiz-back-btn" data-id="" ><i class="icon-arrow-left-2" ></i>Kuis</a>




<div class="span8">
<h2>Daftar Group - <?php echo $quiz_id; ?></h2>
<hr>
<?php if ($list_avail_quiz_group > 0) {?>

<table>
    <tbody>
        <?php foreach ($list_group as $group): ?>
            <tr>

                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $group->title ?></a><br/>
                </td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Next" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $group->id_group; ?>"><i class="icon-arrow-right-2 fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?>
    <tr>
        <td><h2>Tidak ada  group yang Anda buat....</h2></td>
    </tr>
<?php }?>
</div>

<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

<script type="text/javascript">
    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });



    $('a#btn-delete').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_group= $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/show_manage_course_result') ?>/"+id_group+"/<?php echo $course_id ?>/<?php echo $quiz_id;?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

</script>