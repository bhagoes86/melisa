<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/accordion.js"></script>
<a class="button bg-color-yellow" id="quiz-add-form"><i class="icon-plus"></i>Tambah Kuis</a>
<a class="button bg-color-blue fg-color-white" id="quiz-manage-resource"><i class="icon-wrench"></i>Pengaturan Konten</a>
<a class="button bg-color-orange fg-color-white" id="quiz-my-quiz-result"><i class="icon-stats"></i>Nilai Saya</a>
<a class="button bg-color-purple fg-color-white" id="quiz-file-sample" href="<?php echo base_url().'asset/help/contoh-file-kuis.xls'?>"><i class="icon-download"></i>Contoh File Kuis</a>

<hr />
<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

    <?php if (count($list_avail_quiz) > 0) {?>

<table class="striped" id="my-table">
    <thead>
        <tr >
            <th style="text-align:center"><b>Kuis</b></th>
            <th style="text-align:center"><b>Hasil Kuis</b></th>
            <th style="text-align:center"><b>Aksi</b></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_quiz as $quiz): ?>
            <tr style="margin-bottom:20px">
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo  character_limiter($quiz->title, 30); ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;"><?php echo cut_text($quiz->description, 45) ?> ...</p>
                </td>
                
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <div id="list-quiz-result" style="width:480px;height:150px;overflow:scroll;overflow-x:hidden;margin:0px 5px 5px 5px;">
                          <?php echo modules::run('quiz/show_quiz_course', $quiz->id_quiz); ?>
                          
                    </div>
                </td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="preview" href="javascript:void(0)" id="btn-preview" data-id="<?php echo $quiz->id_quiz; ?>"><i class="icon-book fg-color-black"></i></a>
                    <a title="edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $quiz->id_quiz; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="grup" href="javascript:void(0)" id="btn-group" data-id="<?php echo $quiz->id_quiz; ?>"><i class="icon-briefcase fg-color-black"></i></a>
                    <a title="daftar kuliah" href="javascript:void(0)" id="btn-list-course" data-id="<?php echo $quiz->id_quiz; ?>"><i class="icon-list fg-color-black"></i></a>
                    <a title="konfigurasi" href="javascript:void(0)" id="btn-config" data-id="<?php echo $quiz->id_quiz; ?>"><i class="icon-cog fg-color-orange"></i></a>
                    <a title="hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $quiz->id_quiz?>"><i class="icon-remove fg-color-red"></i></a>
               </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


        <?php } else { ?>
            <tr>
                <td><h2>Tidak ada  quiz yang bisa dipakai....</h2></td>
            </tr>
        <?php }?>
<script type="text/javascript">

    $('#quiz-my-quiz-result').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();

        $('#content-right').load("<?php echo site_url('quiz/show_my_quiz_result') ?>",function(){
            $('#loading-template').fadeOut("slow");

        });
    });

    $('#quiz-add-form').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/show_add_quiz') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('#quiz-manage-resource').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/show_add_resource') ?>",function(){
            $('#loading-template').fadeOut("slow");
            
        });
    });

    $('#quiz-help').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/show_quiz_help') ?>",function(){
            $('#loading-template').fadeOut("slow");

        });
    });
    

    $('#quiz-manage-result').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/show_manage_result') ?>",function(){
            $('#loading-template').fadeOut("slow");

        });

    });

    $('a#btn-list-course').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/list_course') ?>/"+id_quiz,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    

    $('a#btn-group').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/group_quiz') ?>/"+id_quiz,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/edit_quiz') ?>/"+id_quiz,function(){
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

      $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_quiz = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/delete_quiz') ?>/"+id_quiz,
                data:id_quiz,
                success:function (data) {
                    $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
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
