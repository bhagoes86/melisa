<div class="span3">
    
    <div class="page-sidebar bg-color-red" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;margin-bottom: 10px;">
        <ul>
            <li><a id="news" data-url="<?php echo site_url('content/all_document') ?>">Berita</a></li>
            <li><a id="beasiswa" data-url="<?php echo site_url('content/all_presentation') ?>">Beasiswa</a></li>
            <li><a id="update" data-url="<?php echo site_url('content/all_presentation') ?>">Update</a></li>
        </ul>
    </div>
    
</div>
<div class="span9 fright" id="content-right">
    <div class="bg-color-blueDark" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Title</a>
    </div>   
    <div class="bg-color-red" style="margin-bottom: 10px;">
        <a class="fg-color-white">&nbsp;Isi</a>
    </div>
</div>
<script type="text/javascript">
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