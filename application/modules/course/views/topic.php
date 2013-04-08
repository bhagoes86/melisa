
<a class="button bg-color-yellow" id="topic-add-form"><i class="icon-plus"></i>Buat Topik Baru</a>
<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>
<div class="row" id="row-message1">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template1" >
        <p id="message-confirm1">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message1">Batal</button>
       
    </div>
</div>
<table class="striped" id="my-table">
    <thead>
        <tr>
            <th><b>Daftar Topik Kuliah</b></th>
            <th class="right" style="text-align: center"><b>Jenjang</b></th>
            <th class="right" style="text-align: center"><b>Total Kuliah</b></th>
            <th class="right" style="text-align: center"><b>Total Konten</b></th>
            <th class="right" style="text-align: center"><b>Aksi</b></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($select as $row): ?>
            <tr>
                <td><?php echo $row->topic; ?></td>
                <td class="right" style="text-align: center"><?php echo $row->status; ?></td>
                <td class="right" style="text-align: center"><?php echo $row->jmlh_kuliah; ?></td>
                <td class="right" style="text-align: center"><?php echo $row->jmlh_konten; ?></td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Edit" href="javascript:void(0)" id="btn-edit" data-kuliah="<?php echo $row->jmlh_kuliah; ?>" data-konten="<?php echo $row->jmlh_konten; ?>" data-id="<?php echo $row->id_topic; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-kuliah="<?php echo $row->jmlh_kuliah; ?>" data-konten="<?php echo $row->jmlh_konten; ?>" data-id="<?php echo $row->id_topic; ?>"><i class="icon-remove fg-color-red"></i></a>  
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $('#topic-add-form').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/form_add_topic') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('course/form_edit_topic') ?>/"+id,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-delete').click(function(){
        if($(this).attr('data-konten')>0 || $(this).attr('data-kuliah') >0){
            $('#message-confirm1').html('Topic ini tidak bisa di hapus.');
            $('#confirm-template1').fadeIn("medium");
        }else{
            $('#message-confirm').html('Apakah Anda yakin akan menghapus Topik ini? ');
            $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
            $('#confirm-template').fadeIn("medium");
        }
    });
    $('#accept-confirm-message').click(function(){
        $('#message').html('Sedang Menghapus .... ');
        $('#confirm-template').fadeOut("medium");
        $('#loading-template').fadeIn("slow");
        var id = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/delete_topic') ?>/"+id,
            data:id,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/all_topic') ?>",function(){
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
    $('#cancel-confirm-message1').click(function(){
        $('#confirm-template1').fadeOut("medium");
    });
    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = 5;
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