<table id="course">
    <tbody>
        <?php foreach ($content as $row): ?>
            <tr style="background: rgb(247,247,247);padding-bottom: 0px;margin-bottom: 0px;">
                <td style="border: 1px solid white;padding: 0px;margin: 0px;width: 280px;height: 158px;">
                    <a href="<?php echo site_url('course' . '/' . $row->id_course) ?>">
                        <img src="<?php echo base_url() . 'resource/' . $row->picture ?>" style="width: 280px;height: 100%;vertical-align: middle;"/>
                    </a>
                </td>
                <td style="border: 1px solid white;width: 450px;vertical-align: top;">
                    <a style="font-family: sofiapro-medium,Arial,sans-serif;color: #095b97;font-size: 18px;line-height: 1.5em;"><?php echo $row->course ?></a>
                </td>
                <td style="border: 1px solid white;vertical-align: top;">
                    <?php echo nicetime(dtm2timestamp($row->date)) ?>
                    <a href="<?php echo site_url('course' . '/' . $row->id_course) ?>" class="button bg-color-yellow"><i class="icon-enter"></i> Lihat Materi</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $('table#course').each(function() {
        var currentPage = 0;
        var numPerPage = 15;
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