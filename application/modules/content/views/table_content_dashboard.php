<div class="span3">
    <div class="page-sidebar bg-color-orangeDark" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;margin-bottom: 10px;">
        <ul>
            <li><a id="radio" data-url="<?php echo site_url('content/all_radio') ?>">Suara</a></li>
        </ul>
    </div>
    <div class="page-sidebar bg-color-yellow" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;margin-bottom: 10px;">
        <ul>
            <li><a id="library" data-url="<?php echo site_url('content/all_document') ?>">Dokumen</a></li>
            <li><a id="presentation" data-url="<?php echo site_url('content/all_presentation') ?>">Presentasi</a></li>
        </ul>
    </div>
    <div class="page-sidebar bg-color-red" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;">
        <ul>
            <?php foreach ($category as $cat): ?>
                <li><a id="video-by-category" data-url="<?php echo site_url('content/list_video_by_category' . '/' . $cat->id_category) ?>"><?php echo $cat->category; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="span9 fright" id="content-right">
    <div id="sound_dashboard">
        <script src="//connect.soundcloud.com/sdk.js"></script>
        <script>
            SC.initialize({
                client_id: "938418853596f90572983f377348dc57"
            });
        </script>
        <div id="putTheWidgetHere"></div>
        <script type="text/JavaScript">
            SC.oEmbed("<?php echo $soundclooud->file ?>", {color: "ff0066"},  document.getElementById("putTheWidgetHere"));
        </script>
    </div>
    <div class="bg-color-blueDark" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Video Terbaru</a>
    </div>
    <table class="striped" id="video-table">
        <?php foreach ($video as $row): ?>
            <tbody>
                <tr style="">
                    <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                        <?php if ($row->cover == 0) { ?>
                            Gambar Kosong
                        <?php } else { ?>
                            <a href="<?php echo site_url('content/video' . '/' . $row->id_content) ?>">
                                <img src="<?php echo base_url() . 'resource/' . $row->id_content . '.jpg' ?>" style="width: 180px;height: 123px;vertical-align: middle;"/>
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
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <div class="bg-color-red" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Video Tautan</a>
    </div>
    <table class="striped" id="youtube-table">
        <?php foreach ($video_external as $row): ?>
            <tbody>
                <tr style="">
                    <td style="border: 1px solid white;background: #000;width: 180px;padding: 0px 0px 0px 0px;">
                        <?php if ($row->type == 2) { ?><!--Youtube-->
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
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>
<script type="text/javascript">
    $('#sound_dashboard').load("<?php echo site_url('content/sound_dashboard') ?>");
    $('a#video-by-category').click(function(){
        var url = $(this).attr('data-url');
        $('#message').html('Loading Data');
        $('#loading-template').show();
        $('#content-right').load($(this).attr('data-url'),function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
    $('a#radio').click(function(){
        var url = $(this).attr('data-url');
        $('#message').html('Loading Data');
        $('#loading-template').show();
        $('#content-right').load($(this).attr('data-url'),function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
    $('a#library').click(function(){
        var url = $(this).attr('data-url');
        $('#message').html('Loading Data');
        $('#loading-template').show();
        $('#content-right').load($(this).attr('data-url'),function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
    $('a#presentation').click(function(){
        var url = $(this).attr('data-url');
        $('#message').html('Loading Data');
        $('#loading-template').show();
        $('#content-right').load($(this).attr('data-url'),function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
    $('table#video-table').each(function() {
        var currentPage = 0;
        var numPerPage = 3;
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
        var numPerPage = 3;
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