<a id="btn-add-course" class="button bg-color-yellow"><i class="icon-plus"></i> Buat Kuliah</a>
<table class="striped" id="my-table">
    <tbody>
        <?php foreach ($content as $row): ?>
            <tr>
                <td style="border: 1px solid white;background:white;width: 180px;padding: 0px;margin: 0px;text-align: center;">
                    <?php if ($row->picture == "") { ?>
                        <a id="add-cover-course" class="button" data-id="<?php echo $row->id_course ?>"><i class="icon-pencil"></i> Sampul</a>
                    <?php } else { ?>
                        <img src="<?php echo base_url() . 'resource/' . $row->picture ?>" style="width: 180px;height: 120px;vertical-align: middle;padding: 0px;margin: 0px;"/>
                    <?php } ?>
                </td>
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->course ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;"><?php echo cut_text($row->description, 45) ?> ...</p>
                </td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id_course; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="Silabus" href="javascript:void(0)" id="btn-silabus" data-id="<?php echo $row->id_course; ?>"><i class="icon-list fg-color-blue"></i></a>
                    <a title="Konfigurasi" href="javascript:void(0)" id="btn-config" data-id="<?php echo $row->id_course; ?>"><i class="icon-cog fg-color-orange"></i></a>
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_course; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $('a#btn-delete').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/delete_course') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/my_course') ?>",function(){
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
    $('#btn-add-course').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/course_form_add') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
        return false; 
    });
    $('#add-cover-course').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        var id_course = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('course/course_form_add_cover') ?>/"+id_course,function(){
            $('#loading-template').fadeOut("slow");
        });
        return false; 
    });
    $('a#btn-config').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_course = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('course/course_config') ?>/"+id_course,function(){
            $('#loading-template').fadeOut("slow");                
        });
    });
    $('a#btn-silabus').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_course = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('course/course_silabus') ?>/"+id_course,function(){
            $('#loading-template').fadeOut("slow");                
        });
    });
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_course = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('course/edit_course') ?>/"+id_course,function(){
            $('#loading-template').fadeOut("slow");                
        });
    });
    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = 3;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="toolbar"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
    });
</script>