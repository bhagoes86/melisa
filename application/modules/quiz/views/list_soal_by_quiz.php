<a class="button bg-color-green fg-color-white" id="quiz-back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali ke Kuis</a>
<a class="button bg-color-yellow" id="quiz-add-form"><i class="icon-plus"></i>Tambah Soal</a>
<hr />
<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>


       <?php if (count($list_avail_soal) > 0) {?>
<table class="striped" id="my-table">
    <thead>
        <tr>
            <th><b>Kode Soal</b></th>
            <th><b>Soal</b></th>
            <th><b>Jawaban</b></th>
            <th><b>Tampil</b></th>
            <th><b>Aksi</b></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($list_soal as $soal): ?>
        <?php if ($soal->deleted == 1){?>
            <tr>
                <td><?php echo 'soal_'.$soal->id_soal; ?></td>
                <td><?php echo $soal->soal; ?></td>
                <td><?php echo $soal->answer; ?></td>
                <td><?php 
                
                    if ($soal->status == 0) {
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
                    <a title="edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $soal->id_soal; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="Konfigurasi" href="javascript:void(0)" id="btn-config" data-id="<?php echo $soal->id_soal; ?>"><i class="icon-cog fg-color-orange"></i></a>
                    <a title="hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $soal->id_soal; ?>"><i class="icon-remove fg-color-red"></i></a>
               </td>
            </tr>
        <?php } ?>
        <?php endforeach; ?>
    </tbody>
</table>
        <?php } else { ?>
            <tr>
                <td><h3>Tidak ada  soal </h3></td>
            </tr>
        <?php }?>
<script type="text/javascript">
    $('#quiz-add-form').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/show_add_soal') ?>/"+<?php echo $quiz_id?>,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_soal = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/edit_soal') ?>/"+id_soal,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('a#btn-config').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_choice = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('quiz/list_all_choice') ?>/"+id_choice,function(){
            $('#loading-template').fadeOut("slow");
        });
    });

    

    $('#accept-confirm-message').click(function(){
            $('#message').html('Sedang Menghapus .... ');
            $('#confirm-template').fadeOut("medium");
            $('#loading-template').fadeIn("slow");
            var id_soal = $(this).attr('data-id');
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('quiz/delete_soal') ?>/"+id_soal,
                data:id_soal,
                success:function (data) {
                    $('#content-right').load("<?php echo site_url('quiz/list_all_soal') ?>/"+<?php echo $quiz_id;?>,function(){
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
        $('#message-confirm').html('Apakah Anda yakin akan menghapus soal ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");


    });
    
    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
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
