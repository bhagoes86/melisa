
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/accordion.js"></script>
<a class="button bg-color-yellow" id="assignment-add-form"><i class="icon-plus"></i>Tambah Tugas</a>
<a class="button bg-color-orange fg-color-white" id="my-assignment-result"><i class="icon-stats"></i>Nilai Saya</a>


<hr />




<?php if (count($list_assignment) > 0) {?>

<table class="striped" id="my-table">
    <thead>
        <tr >
            <th style="text-align:center"><b>Tugas</b></th>
            <th style="text-align:center"><b>Hasil Tugas</b></th>
            <th style="text-align:center"><b>Aktif</b></th>
            <th style="text-align:center"><b>Aksi</b></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_assignment as $assignment): ?>
            <tr style="margin-bottom:20px">
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo  character_limiter($assignment->title, 30); ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;"><?php echo cut_text($assignment->description, 10) ?> ...</p>
                </td>
                
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <div id="list-quiz-result" style="width:480px;height:150px;overflow:scroll;overflow-x:hidden;margin:0px 5px 5px 5px;">
                          <?php //echo modules::run('quiz/show_quiz_course', $quiz->id_quiz); ?>
                          <a style="color: #095b97;font-size: 18px;"><?php 
                          
                           if ($assignment->course!=null){
                               echo  character_limiter($assignment->course, 30); 
                           }
                           else {
                               echo "Tidak kuliah yang menyelenggarakan tugas ini";
                           }
                          ?></a><br/>
                          <p style="color: rgb(94,94,94);font-size: 13px;">
                          <ul>
                              
                              <?php foreach($assignment->list_group as $group ):?>
                              <li>
                              <?php
                                    if ($group->status == 1){
                                        ?>
                                        <a title="masih aktif di kuliah ini" href="javascript:void(0)">
                                            <i class="icon-unlocked fg-color-pink"></i>
                                        </a>
                                <?php
                                    }
                                    else {
                                        ?>
                                        <a title="sudah dinonaktifkan dari kuliah ini" href="javascript:void(0)">
                                            <i class="icon-locked fg-color-pink"></i>
                                        </a>
                                        <?php
                                    }
                                ?>


                            <?php echo character_limiter($group->title, 30);  ?>

                            <a title="Pilih Ini" href="javascript:void(0)" id="btn-choose-result"
                               data-id-course="<?php echo $assignment->course_id; ?>"
                               data-id-assignment="<?php echo $assignment->id_assignment; ?>"
                               data-id-group="<?php echo $group->id_group; ?>"
                            >
                                <i class="icon-arrow-right fg-color-pink"></i>
                            </a>
                              </li>
                              <?php endforeach;?>
                          </ul>
                          </p>
                    
                    </div>
                </td>
                <td style="border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <?php 
                    $date1 = date_create($assignment->start_time);
                    $date2 = date_create($assignment->end_time);
                    
                    if ($date1 == $date2) {
                        ?>
                            <a title="aktif" href="javascript:void(0)"  data-id=""><i class="icon-checkbox-unchecked" fg-color-black"></i></a>
                        <?php
                    }
                    else {
                        ?>
                            <a title="aktif" href="javascript:void(0)"  data-id=""><i class="icon-checkbox" fg-color-black"></i></a>
                        <?php
                    }
                    ?>
                </td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="preview" href="javascript:void(0)" id="btn-preview" data-id="<?php echo $assignment->id_assignment; ?>"><i class="icon-book fg-color-black"></i></a>
                    <a title="edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $assignment->id_assignment; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="daftar kuliah" href="javascript:void(0)" id="btn-list-course" data-id="<?php echo $assignment->id_assignment; ?>"><i class="icon-list fg-color-black"></i></a>
                    <a title="grup" href="javascript:void(0)" id="btn-group" data-id="<?php echo $assignment->id_assignment; ?>"><i class="icon-briefcase fg-color-black"></i></a>
                    <a title="hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $assignment->id_assignment?>"><i class="icon-remove fg-color-red"></i></a>
               </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


        <?php } else { ?>
            <tr>
                <td><h2>Tidak ada tugas yang bisa dipakai....</h2></td>
            </tr>
        <?php }?>
            

<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

<script type="text/javascript">

    $('#my-assignment-result').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();

        $('#content-right').load("<?php echo site_url('assignment/show_my_assignment_result') ?>",function(){
            $('#loading-template').fadeOut("slow");

        });
    });

    $('#assignment-add-form').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('assignment/show_form_add_assignment') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#btn-list-course').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('assignment/list_course') ?>/"+id_quiz,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    

    $('a#btn-group').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_assignment = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('assignment/list_group') ?>/"+id_assignment,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_assignment = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('assignment/show_form_edit_assignment') ?>/"+id_assignment,function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#btn-preview').click(function(){
        $('#message').html('Loading ...');
        $('#loading-template').show();
        var id_quiz = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/preview_quiz') ?>/"+id_quiz,function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#btn-config').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/list_all_soal') ?>/"+id_quiz,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    
    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda yakin akan menghapus tugas ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });
    

      $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_quiz = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('assignment/delete_assignment') ?>/"+id_quiz,
                data:id_quiz,
                success:function (data) {
                    $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
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


    $('a#btn-choose-result').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var course_id = $(this).attr('data-id-course');
        var assignment_id = $(this).attr('data-id-assignment');
        var group_id = $(this).attr('data-id-group');

        $('#content-right').load("<?php echo site_url('assignment/give_score') ?>/"+course_id+"/"+assignment_id+"/"+group_id,function(){
            $('#loading-template').fadeOut("slow");

        });
    });
    
    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = 10;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="toolbar"></div>');
        var $pagers = $('<div class="toolbar"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');

            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pagers).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
        $pagers.insertAfter($table).find('span.page-number:first').addClass('active');

    });

</script>
