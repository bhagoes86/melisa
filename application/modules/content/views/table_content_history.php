<form class="span3" style="float: right;margin-right: 0px;padding-right: 0px;">
    <div class="input-control text">
        <input type="text" id="kwd_search">
    </div>
</form>
<table class="striped" id="my-table">
    <?php foreach ($content as $row): ?>
        <tbody>
            <tr>
                <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;text-align: center;vertical-align: middle;">
                    <?php if ($row->type == 0) { ?><!--Video-->
                        <?php if ($row->cover == 0) { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                <i class="icon-file" style="font-size: 45px;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
                            </a>
                        <?php } ?>
                    <?php } elseif ($row->type == 1) { ?><!--Document-->
                        <?php if ($row->cover == 0) { ?>
                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                <i class="icon-file" style="font-size: 45px;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
                            </a>
                        <?php } ?>
                    <?php } elseif ($row->type == 2) { ?><!--Youtube-->
                        <?php
                        $media = analyze_media($row->file);
                        $extract_id = explode('^^^', $media);
                        ?>
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>">
                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: middle;">
                        </a>
                    <?php } elseif ($row->type == 3) { ?><!--Vimeo-->
                        <?php $media = vimeo_cover($row->file); ?>
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>">
                            <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;">
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
                            <img src="<?php echo "http:" . $thumbnail ?>" style="width: 180px;height: 123px;vertical-align: middle;">
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
                <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <p style="color: rgb(94,94,94);font-size: 13px;">
                        <b><?php echo nicetime(dtm2timestamp($row->date)) ?></b>
                        <br/>
                        Deskripsi : <?php echo cut_text($row->description, 25) . ' ...' ?>
                    </p>                    
                </td>
                <td class="center" style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="Hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_content; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<script type="text/javascript">
    $('a#btn-delete').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_content = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/delete_history') ?>/"+id_content,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/list_my_video_history') ?>/"+0,function(){
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