<?php if ($total_course == 0) { ?>
<?php } else { ?>
    <div class="bg-color-green" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Daftar Kuliah</a>
    </div>
    <table id="course">
        <tbody>
            <?php foreach ($course as $row): ?>
                <tr style="background: rgb(247,247,247);padding-bottom: 0px;margin-bottom: 0px;">
                    <td style="border: 1px solid white;padding: 0px;margin: 0px;width: 280px;height: 158px;">
                        <a href="<?php echo site_url('course' . '/' . $row->id_course) ?>">
                            <img src="<?php echo base_url() . 'resource/' . $row->picture ?>" style="width: 280px;height: 100%;vertical-align: middle;"/>
                        </a>
                    </td>
                    <td style="border: 1px solid white;width: 450px;vertical-align: top;">
                        <a href="<?php echo site_url('course' . '/' . $row->id_course) ?>" style="font-family: sofiapro-medium,Arial,sans-serif;color: #095b97;font-size: 18px;line-height: 1.5em;"><?php echo $row->course ?></a>
                    </td>
                    <td style="border: 1px solid white;vertical-align: top;"><?php echo nicetime(dtm2timestamp($row->date)) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>
<?php if ($total_video == 0) { ?>
<?php } else { ?>
    <div class="bg-color-blue" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Video</a>
    </div>
    <table class="striped" id="video-table">
        <?php foreach ($video as $row): ?>
            <tbody>
                <tr style="">
                    <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                        <?php if ($row->cover == 0) { ?>
                            Gambar Kosong
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>"  target="_blank" >
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
                            </a>
                        <?php } ?>
                    </td>
                    <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                        <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                        <p style="color: rgb(94,94,94);font-size: 13px;">
                            <?php echo nicetime(dtm2timestamp($row->date)) ?>
                            <br/>
                            Deskripsi : <?php echo cut_text($row->description, 25) . ' ...' ?>
                        </p>                    
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
<?php } ?>
<?php if ($total_youtube == 0) { ?>
<?php } else { ?>
    <div class="bg-color-red" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Video Tautan</a>
    </div>
    <table class="striped" id="youtube-table">
        <?php foreach ($youtube as $row): ?>
            <tbody>
                <tr style="">
                    <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                        <?php
                        $media = analyze_media($row->file);
                        $extract_id = explode('^^^', $media);
                        ?>
                        <a href="<?php echo site_url('content/youtube' . '/' . $row->id_content) ?>"  target="_blank" >
                            <img src="http://img.youtube.com/vi/<?php echo $extract_id[1]; ?>/1.jpg" style="width: 180px;height: 123px;vertical-align: middle;">
                        </a>
                    </td>
                    <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                        <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                        <p style="color: rgb(94,94,94);font-size: 13px;">
                            <?php echo nicetime(dtm2timestamp($row->date)) ?>
                            <br/>
                            Deskripsi : <?php echo cut_text($row->description, 25) . ' ...' ?>
                        </p>                    
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
<?php } ?>
<?php if ($total_vimeo == 0) { ?>
<?php } else { ?>
    <div class="bg-color-orange" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Video Tautan</a>
    </div>
    <table class="striped" id="vimeo-table">
        <?php foreach ($vimeo as $row): ?>
            <tbody>
                <tr style="">
                    <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                        <?php $media = vimeo_cover($row->file); ?>
                        <a href="<?php echo site_url('content/vimeo' . '/' . $row->id_content) ?>"  target="_blank" >
                            <img src="<?php echo ($media['thumbnail_medium']) ?>" style="width: 180px;height: 123px;">
                        </a>
                    </td>
                    <td style="border: 1px solid white;vertical-align: top;background-color:rgba(0, 0, 0, 0.0666667);">
                        <a style="color: #095b97;font-size: 18px;"><?php echo $row->title ?></a><br/>
                        <p style="color: rgb(94,94,94);font-size: 13px;">
                            <?php echo nicetime(dtm2timestamp($row->date)) ?>
                            <br/>
                            Deskripsi : <?php echo cut_text($row->description, 25) . ' ...' ?>
                        </p>                    
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
<?php } ?>
<script type="text/javascript">
    $('table#course').each(function() {
        var currentPage = 0;
        var numPerPage = 2;
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
    $('table#video-table').each(function() {
        var currentPage = 0;
        var numPerPage = 2;
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
    $('table#youtube-table').each(function() {
        var currentPage = 0;
        var numPerPage = 2;
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
    $('table#vimeo-table').each(function() {
        var currentPage = 0;
        var numPerPage = 2;
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