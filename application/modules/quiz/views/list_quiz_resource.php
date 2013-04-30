<?php if (count($list_quiz_resource) > 0) {?>

<table id="my-table">
    <tbody>
        <?php foreach ($list_quiz_resource as $row): ?>
            <tr>
                
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <?php if ($row->type == 0){
                    ?>
                    <span class="icon fg-color-blueDark"><i class="icon-film"></i></span>
                    <span class="label fg-color-blueDark">Video</span>
                    
                    <?php
                    }
                    else if ($row->type == 1){
                        ?>
                        <span class="icon fg-color-green"><i class="icon-libreoffice"></i></span>
                        <span class="label fg-color-green">Dokumen</span>    
                        <?php
                    }
                    else if ($row->type == 2){
                        ?>
                        <span class="icon  fg-color-red"><i class="icon-youtube"></i></span>
                        <span class="label  fg-color-red">Youtube</span>    
                        <?php
                    }
                    else if ($row->type == 3){
                        ?>
                        <span class="icon fg-color-blue"><i class="icon-vimeo"></i></span>
                        <span class="label fg-color-blue">Vimeo</span>    
                        <?php
                    }
                    else if ($row->type == 4){
                        ?>
                        <span class="icon fg-color-purple"><i class="icon-file-pdf"></i></span>
                        <span class="label fg-color-purple">Scribd</span>    
                        <?php
                    }
                    else if ($row->type == 5){
                        ?>
                        <span class="icon fg-color-orange"><i class="icon-file-powerpoint"></i></span>
                        <span class="label fg-color-orange">Slideshare</span>    
                        <?php
                    }
                    else if ($row->type == 6){
                        ?>
                        <span class="icon fg-color-orangeDark"><i class="icon-soundcloud"></i></span>
                        <span class="label fg-color-orangeDark">Soundcloud</span>    
                        <?php
                    }
                    else if ($row->type == 7){
                        ?>
                        <span class="icon fg-color-pink"><i class="icon-file-word"></i></span>
                        <span class="label fg-color-pink">Docstoc</span>    
                        <?php
                    }
                    else if ($row->type == 8){
                        ?>
                        <span class="icon fg-color-yellow"><i class="icon-pictures"></i></span>
                        <span class="label fg-color-yellow">Gambar</span>    
                        <?php
                    }
                    else if ($row->type == 9){
                        ?>
                        <span class="icon fg-color-darken"><i class="icon-mic"></i></span>
                        <span class="label fg-color-darken">Suara</span>    
                        <?php
                    }
                    
                    
                    ?>
                   
                    <br />
                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;"><?php echo cut_text($row->description, 45) ?> ...</p>
                </td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id_quiz_resource; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_quiz_resource; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        <?php } else { ?>
            <tr>
                <td><h2>Tidak ada  quiz resource yang bisa dipakai....</h2></td>
            </tr>
        <?php }?>
<script type="text/javascript">
    
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_quiz_res = $(this).attr('data-id');
        $('#list-quiz-resource-area').load("<?php echo site_url('quiz/edit_quiz_resource') ?>/"+id_quiz_res,function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#btn-preview').click(function(){
        $('#message').html('Loading ...');
        $('#loading-template').show();
        var id_quiz_res = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/preview_quiz_resource') ?>/"+id_quiz_res,function(){
            $('#loading-template').fadeOut("slow");
        });
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
        $('#message-confirm').html('Apakah Anda yakin akan menghapus konten kuis ini ? ');
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