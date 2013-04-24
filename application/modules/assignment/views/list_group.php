<a class="button bg-color-green fg-color-white" id="quiz-back-btn" data-id="<?php echo $assignment_id; ?>" ><i class="icon-arrow-left-2" ></i>Kembali ke Tugas</a>
<a class="button bg-color-yellow" id="quiz-add-form"><i class="icon-plus"></i>Tambah Grup</a>


 <?php if (count($list_group) > 0) {?>

<table class="striped" id="my-table">
    <thead>
        <tr>
            <th><b>Kode</b></th>
            <th><b>Nama</b></th>
            <th><b>Deskripsi</b></th>
            <th><b>Tampil</b></th>
            <th><b>Aksi</b></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($list_group as $group): ?>
            <?php if ($group->deleted == 0){ ?>
            <tr>
                <td><?php echo 'grup_'.$group->id_group; ?></td>
                <td><?php echo $group->title; ?></td>
                <td><?php echo $group->description; ?></td>
                <td><?php 
                    
                    if ($group->status == 0) {
                        ?>
                            <a title="aktif" href="javascript:void(0)"  data-id=""><i class="icon-checkbox-unchecked" fg-color-black"></i></a>
                        <?php
                    }
                    else {
                        ?>
                            <a title="aktif" href="javascript:void(0)"  data-id=""><i class="icon-checkbox" fg-color-black"></i></a>
                        <?php
                    }
                
                
                ?></td>

                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="edit grup" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $group->id_group; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="hapus grup" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $group->id_group; ?>"><i class="icon-remove fg-color-red"></i></a>
               </td>
            </tr>
           <?php } ?>
        <?php endforeach; ?>
    </tbody>
</table>
        <?php } else { ?>
            <tr>
                <td><h2>Tidak ada  grup yang bisa dipakai....</h2></td>
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

    $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_group = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('assignment/delete_group') ?>/"+id_group,
                data:id_group,
                success:function (data) {
                    $('#content-right').load("<?php echo site_url('assignment/list_group') ?>/"+<?php echo $assignment_id; ?>,function(){
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
        $('#message-confirm').html('Apakah Anda yakin akan menghapus grup ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });

    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_group = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('assignment/show_form_edit_group') ?>/"+id_group,function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    $('#quiz-add-form').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('assignment/show_form_add_group')."/".$assignment_id ?>",function(){
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