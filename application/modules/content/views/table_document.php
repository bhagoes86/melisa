<table class="striped" id="my-table">
    <?php foreach ($content as $row): ?>
        <tbody>
            <tr style="height: 135px;">
                <td style="border: 1px solid white;background: #e5e5e5;width: 120px;padding: 1px 0px 0px 0px;text-align: center;">
                    <?php if ($row->type == 1) { ?><!--Document-->
                        <?php if ($row->cover == 0) { ?>
                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                <i class="icon-file" style="font-size: 45px;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/document' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
                            </a>
                        <?php } ?>
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
                    <?php } elseif ($row->type == 7) { ?><!--docstoc-->
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
                    <?php if ($row->type == 1) { ?><!--Document-->
                        <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <?php } elseif ($row->type == 4) { ?><!--Scribd-->
                        <a href="<?php echo site_url('content/scribd' . '/' . $row->id_content) ?>"  style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <?php } elseif ($row->type == 5) { ?><!--slideshare-->
                        <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <?php } elseif ($row->type == 7) { ?><!--docstoc-->
                        <a href="<?php echo site_url('content/docstoc' . '/' . $row->id_content) ?>"  style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                    <?php } ?>
                    <p style="color: rgb(94,94,94);font-size: 13px;">
                        <b><?php echo nicetime(dtm2timestamp($row->date)) ?></b>
                        <br/>
                        Deskripsi : <?php echo cut_text($row->description, 25) . ' ...' ?>
                    </p>                    
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<script type="text/javascript">
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