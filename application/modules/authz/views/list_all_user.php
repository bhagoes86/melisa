<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>
<table class="striped" id="my-table">
    <thead>
        <tr>
            <th><b>Username</b></th>
            <th class="right"><b>Email</b></th>
            <th class="right"><b>Password</b></th>

        </tr>
    </thead>

    <tbody>
        <?php foreach ($user as $row): ?> 
            <tr>
                <td><?php echo $row->username; ?></td>
                <td class="right"><?php echo $row->email; ?></td>
                <td class="right"><?php echo $row->password; ?></td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <?php
                    if ($row->active == 0) {
                        ?>
                        <a title="Accept" href="javascript:void(0)" id="btn-accept" data-id="<?php echo $row->id; ?>"><i class="icon-checkmark fg-color-green"></i></a>
                    <?php } ?>
                    <?php
                    if ($row->active == 1) {
                        ?>
                        <a title="Block" href="javascript:void(0)" id="btn-block" data-id="<?php echo $row->id; ?>"><i class="icon-blocked fg-color-red"></i></a>
                    <?php } ?> 
                    <a title="Edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id; ?>"><i class="icon-pencil fg-color-pink"></i></a>


                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id; ?>"><i class="icon-remove fg-color-red"></i></a>               

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('authz/edit_user') ?>/"+id,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-accept').click(function(){        
        var id = $(this).attr('data-id');
        var active = 1;
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/update_active') ?>/"+id+"/"+active,
            data:id,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('authz/all_user') ?>",function(){
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
     $('a#btn-block').click(function(){
        var id = $(this).attr('data-id');
        var active = 0;
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/update_active') ?>/"+id+"/"+active,
            data:id,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('authz/all_user') ?>",function(){
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
    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda yakin akan menghapus user ini? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });
    $('#accept-confirm-message').click(function(){
        $('#message').html('Sedang Menghapus .... ');
        $('#confirm-template').fadeOut("medium");
        $('#loading-template').fadeIn("slow");
        var id = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/delete_user') ?>/"+id,
            data:id,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('authz/all_user') ?>",function(){
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