<?php if (count($list_avail_quiz_course_group) > 0) {?>


         <ul class="accordion dark" data-role="accordion">


        <?php foreach($list_quiz_course as $row):?>
        <li>
            <a href="#"> <?php echo character_limiter($row->course, 30);?> </a>
            <div>
                <?php echo modules::run('quiz/show_quiz_course_group', $row->quiz_id, $row->course_id); ?>
                          
            </div>
        </li>
        <?php endforeach;?>
    </ul>


        <?php } else { ?>
            <tr>
                <td><h2>Tidak ada orang yang ikut quiz ini....</h2></td>
            </tr>
        <?php }?>
<script type="text/javascript">


   $('a#btn-choose-result').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var course_id = $(this).attr('data-id-course');
        var quiz_id = $(this).attr('data-id-quiz');
        var group_id = $(this).attr('data-id-group');

        $('#content-right').load("<?php echo site_url('quiz/show_manage_course_result') ?>/"+course_id+"/"+quiz_id+"/"+group_id,function(){
            $('#loading-template').fadeOut("slow");

        });
    });


</script>