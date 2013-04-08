<a href="javascript:void(0)" id="news-add-form" class="button bg-color-yellow"><i class="icon-plus"></i>Buat Berita Baru</a>
<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>
<table class="striped">
    <thead>
        <tr>
            <th><b>Header</b></th>
            <th class="right"><b>Judul</b></th>
            <th class="right"><b>Berita</b></th>
            <th class="right"><b>Attachment</b></th>
            <th class="right"><b>Tanggal</b></th>
            <th class="right"><b>Aksi</b></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($news as $row): ?> 
            <tr>
                <td><?php echo $row->header; ?></td>
                <td class="right"><?php echo $row->title; ?></td>
                <td class="right"><?php echo $row->news; ?></td>
                <td class="right"><?php echo $row->attachment; ?></td>
                <td class="right"><?php echo $row->date; ?></td>
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">

                    <a title="Edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id_news; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_news; ?>"><i class="icon-remove fg-color-red"></i></a>
                    <?php
                    if ($row->header == "") {
                        ?>
                        <a title="Upload Header" href="javascript:void(0)" id="btn-upload-header" data-id="<?php echo $row->id_news; ?>"><i class="icon-pictures fg-color-green"></i></a>                  
                    <?php } ?>

                    <?php
                    if ($row->attachment == "") {
                        ?>
                        <a title="Upload Attachment" href="javascript:void(0)" id="btn-upload-attachment" data-id="<?php echo $row->id_news; ?>"><i class="icon-attachment fg-color-blue"></i></a>
                    <?php } ?>    

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    var type = <?php echo $type;?>;
    $('#news-add-form').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/form_add_news') ?>/"+type,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_news = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('news/edit_news') ?>/"+id_news+"/"+type,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-delete').click(function(){
        $('#message-confirm').html('Apakah Anda yakin akan menghapus berita ini ? ');
        $('#accept-confirm-message').attr('data-id', $(this).attr('data-id'));
        $('#confirm-template').fadeIn("medium");
    });
    
    $('a#btn-upload-header').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_news = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('news/header_upload') ?>/"+id_news+"/"+type,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('#accept-confirm-message').click(function(){
        $('#message').html('Sedang Menghapus .... ');
        $('#confirm-template').fadeOut("medium");
        $('#loading-template').fadeIn("slow");
        var id_news = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('news/delete_news') ?>/"+id_news,
            data:id_news,
            success:function (data) {
                $('#content-right').load("<?php echo site_url('news/home') ?>/"+type,function(){
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
    
    $('a#btn-upload-attachment').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_news = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('news/shortcut') ?>/"+id_news+"/"+type,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
</script>