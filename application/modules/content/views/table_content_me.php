<form class="span3" style="float: right;margin-right: 0px;padding-right: 0px;">
    <div class="input-control text">
        <input type="text" id="kwd_search">
    </div>
</form>
<div class='pager toolbar' style="vertical-align: middle;">
    <a style="cursor: pointer;text-decoration: none;" alt='First' class='firstPage button'><i class="icon-first"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Previous' class='prevPage button'><i class="icon-arrow-left-2"></i></a>
    <span class='currentPage'></span> dari <span class='totalPages'></span>
    <a style="cursor: pointer;text-decoration: none;" alt='Next' class='nextPage button'><i class="icon-arrow-right-2"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Last' class='lastPage button'><i class="icon-last"></i></a>
</div>
<table class="striped" id="my-table">
    <?php foreach ($content as $row): ?>
        <tbody>
            <tr>
                <td style="width: 180px;padding: 0px 0px 0px 0px;text-align: center;">
                    <?php if ($row->type == 0) { ?><!--Video-->
                        <?php if ($row->cover == 0) { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                <i class="icon-file" style="font-size: 45px;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;vertical-align: middle;"/>
                            </a>
                        <?php } ?>
                    <?php } elseif ($row->type == 1) { ?><!--Document-->
                        <?php if ($row->cover == 0) { ?>
                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                <i class="icon-file" style="font-size: 45px;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;vertical-align: middle;"/>
                            </a>
                        <?php } ?>
                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                        <?php
                        $media = analyze_media($row->file);
                        $extract_id = explode('^^^', $media);
                        ?>
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>">
                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;vertical-align: middle;">
                        </a>
                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                        <?php $media = vimeo_cover($row->file); ?>
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>">
                            <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;">
                        </a>
                    <?php } elseif ($row->type == 4) { ?><!--Scribd-->
                        <a href="<?php echo site_url('content/scribd' . '/' . $row->id_content) ?>">
                            <i class="icon-file" style="font-size: 45px;"></i>
                        </a>
                    <?php } elseif ($row->type == 5) { ?><!--Slideshare-->
                        <?php
                        $media = analyze_media($row->file);
                        $extract_id = explode('^^^', $media);
                        $url = $extract_id[1];
                        $thumb = explode("/", slideshare_cover($url)->thumbnail);
                        $thumbnail = slideshare_cover($url)->thumbnail;
                        ?>
                        <a href="<?php echo site_url('content/slideshare' . '/' . $row->id_content) ?>">
                            <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;vertical-align: middle;">
                        </a>
                    <?php } elseif ($row->type == 6) { ?><!--SoundCloud-->
                        <a href="<?php echo site_url('content/soundcloud' . '/' . $row->id_content) ?>">
                            &nbsp;<i class="icon-soundcloud" style="font-size: 47px;"></i>
                        </a>
                    <?php } elseif ($row->type == 7) { ?><!--Docstoc-->
                        <?php
                        $media = analyze_media($row->file);
                        $extract_id = explode('^^^', $media);
                        ?>
                        <a href="<?php echo site_url('content/docstoc' . '/' . $row->id_content) ?>">
                            <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 120px;height: 135px;vertical-align: middle;">
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
<?php if ($row->type == 0) { ?>
                    $('#content-right').load("<?php echo site_url('content/list_my_video') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 1) { ?>
                    $('#content-right').load("<?php echo site_url('content/list_my_document') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 2) { ?>
                    $('#content-right').load("<?php echo site_url('content/list_my_video') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 3) { ?>
                    $('#content-right').load("<?php echo site_url('content/list_my_video') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 4) { ?>        
                    $('#content-right').load("<?php echo site_url('content/list_my_document') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 5) { ?>    
                    $('#content-right').load("<?php echo site_url('content/list_my_document') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 6) { ?>    
                    $('#content-right').load("<?php echo site_url('content/list_my_sound') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } elseif ($row->type == 7) { ?>    
                    $('#content-right').load("<?php echo site_url('content/list_my_document') ?>",function(){
                        $('#loading-template').fadeOut("slow");
                    });    
<?php } ?>
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
    $('#my-table').paginateTable({ rowsPerPage: 10 });
</script>