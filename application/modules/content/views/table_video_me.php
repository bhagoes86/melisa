<form class="span3" style="float: right;margin-right: 0px;padding-right: 0px;">
    <div class="input-control text">
        <input type="text" id="kwd_search">
    </div>
</form>
<table class="striped" id="my-table">
    <?php foreach ($content as $row): ?>
        <tbody>
            <tr>
                <td style="width: 157px;padding: 0px 0px 0px 0px;text-align: center;vertical-align: middle;">
                    <?php if ($row->type == 0) { ?><!--Video-->
                        <?php if ($row->cover == 0) { ?>
                            Gambar Kosong
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="height: 118px;width: 157px;"/>
                            </a>
                        <?php } ?>
                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                        <?php
                        $media = analyze_media($row->file);
                        $extract_id = explode('^^^', $media);
                        ?>
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>">
                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="height: 118px;width: 157px;">
                        </a>
                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                        <?php $media = vimeo_cover($row->file); ?>
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>">
                            <img src="<?php echo ($media['thumbnail_medium']) ?>" style="height: 118px;width: 157px;">
                        </a>
                    <?php } ?>
                </td>
                <td style="vertical-align: top;">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;">
                        <b><?php echo nicetime(dtm2timestamp($row->date)) ?></b>
                        <br/>
                        Ekstensi : 
                        <?php if ($row->type != 0 || $row->type != 1) { ?>
                            -
                        <?php } else { ?>
                            <?php echo $row->ext ?>
                        <?php } ?>
                        <br/>Tipe Berkas : 
                        <?php
                        if ($row->type == 0) {
                            echo "Video";
                        } elseif ($row->type == 1) {
                            echo "Dokumen";
                        } elseif ($row->type == 2) {
                            echo "Tautan Youtube";
                        } elseif ($row->type == 3) {
                            echo "Tautan Vimeo";
                        } elseif ($row->type == 4) {
                            echo "Tautan Scribd";
                        } elseif ($row->type == 5) {
                            echo "Tautan Slideshare";
                        }
                        ?>
                        <br/>
                        Deskripsi : <?php echo cut_text($row->description, 10) . ' ...' ?>
                    </p>                    
                </td>
                <td class="center" style="width: 30px;">
                    <?php if ($row->ext == ".MOV") { ?>
                        <?php if ($row->converted == 0) { ?>
                            <a title="Konversi Video" href="javascript:void(0)" id="btn-con-flv" data-id="<?php echo $row->id_content; ?>"><i class="icon-cog"></i></a>
                        <?php } ?>
                        <?php if ($row->cover == 0) { ?>
                            <a title="Ambil Kover" href="javascript:void(0)" id="btn-tak-pic-mov" data-id="<?php echo $row->id_content; ?>"><i class="icon-pictures fg-color-orange"></i></a>
                        <?php } ?>

                    <?php } elseif ($row->ext == ".mov") { ?>
                        <?php if ($row->converted == 0) { ?>
                            <a title="Konversi Video" href="javascript:void(0)" id="btn-con-flv" data-id="<?php echo $row->id_content; ?>"><i class="icon-cog"></i></a>
                        <?php } ?>
                        <?php if ($row->cover == 0) { ?>
                            <a title="Ambil Kover" href="javascript:void(0)" id="btn-tak-pic-mov" data-id="<?php echo $row->id_content; ?>"><i class="icon-pictures fg-color-orange"></i></a>
                        <?php } ?>

                    <?php } elseif ($row->ext == ".MP4") { ?>
                        <?php if ($row->cover == 0) { ?>
                            <a title="Ambil Kover" href="javascript:void(0)" id="btn-tak-pic-mp4-big" data-id="<?php echo $row->id_content; ?>"><i class="icon-pictures fg-color-orange"></i></a>
                        <?php } ?>

                    <?php } elseif ($row->ext == ".mp4") { ?>
                        <?php if ($row->cover == 0) { ?>
                            <a title="Ambil Kover" href="javascript:void(0)" id="btn-tak-pic-mp4" data-id="<?php echo $row->id_content; ?>"><i class="icon-pictures fg-color-orange"></i></a>
                        <?php } ?>

                    <?php } elseif ($row->ext == ".FLV") { ?>
                        <?php if ($row->cover == 0) { ?>
                            <a title="Ambil Kover" href="javascript:void(0)" id="btn-tak-pic-flv-big" data-id="<?php echo $row->id_content; ?>"><i class="icon-pictures fg-color-orange"></i></a>
                        <?php } ?>

                    <?php } elseif ($row->ext == ".flv") { ?>
                        <?php if ($row->cover == 0) { ?>
                            <a title="Ambil Kover" href="javascript:void(0)" id="btn-tak-pic-flv" data-id="<?php echo $row->id_content; ?>"><i class="icon-pictures fg-color-orange"></i></a>
                        <?php } ?>
                    <?php } ?>
                    <a title="Edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id_content; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="Konfigurasi" href="javascript:void(0)" id="btn-config" data-id="<?php echo $row->id_content; ?>"><i class="icon-cog fg-color-orange"></i></a>
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_content; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<script type="text/javascript">
    $('a#btn-con-flv').click(function(){
        $('#message').html('Konversi Video');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/con_vid_mov_flv') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
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
    $('a#btn-tak-pic-mov').click(function(){
        $('#message').html('Mengambil Kover');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/gen_cov_vid_mov') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
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
    $('a#btn-tak-pic-mp4').click(function(){
        $('#message').html('Mengambil Kover');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/gen_cov_vid_mp4') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
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
    $('a#btn-tak-pic-mp4-big').click(function(){
        $('#message').html('Mengambil Kover');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/gen_cov_vid_mp4_big') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
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
    $('a#btn-tak-pic-flv').click(function(){
        $('#message').html('Mengambil Kover');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/gen_cov_vid_flv') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
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
    $('a#btn-tak-pic-flv-big').click(function(){
        $('#message').html('Mengambil Kover');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/gen_cov_vid_flv_big') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
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
    $('a#btn-delete').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/delete_content') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/list_my_video') ?>",function(){
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
    $('a#btn-config').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('content/content_config') ?>/"+id_content,function(){
            $('#loading-template').fadeOut("slow");                
        });
    });
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('content/content_edit') ?>/"+id_content,function(){
            $('#loading-template').fadeOut("slow");                
        });
    });
    // Write on keyup event of keyword input element
    $("#kwd_search").keyup(function(){
        // When value of the input is not blank
        if( $(this).val() != "")
        {
            // Show only matching TR, hide rest of them
            $("#my-table tbody>tr").hide();
            $("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {
            // When there is no input or clean again, show everything back
            $("#my-table tbody>tr").show();
        }
    });
    // jQuery expression for case-insensitive filter
    $.extend($.expr[":"], 
    {
        "contains-ci": function(elem, i, match, array) 
        {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
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