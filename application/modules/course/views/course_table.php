<h3 style="padding-top: 0px;margin-top: 0px;font-weight: normal;">Daftar Kuliah</h3>
<div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
<div class='pager toolbar' style="vertical-align: middle;">
    <a style="cursor: pointer;text-decoration: none;" alt='First' class='firstPage button'><i class="icon-first"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Previous' class='prevPage button'><i class="icon-arrow-left-2"></i></a>
    <span class='currentPage'></span> Dari <span class='totalPages'></span>
    <a style="cursor: pointer;text-decoration: none;" alt='Next' class='nextPage button'><i class="icon-arrow-right-2"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Last' class='lastPage button'><i class="icon-last"></i></a>
</div>
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
<div class='pager toolbar' style="vertical-align: middle;">
    <a style="cursor: pointer;text-decoration: none;" alt='First' class='firstPage button'><i class="icon-first"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Previous' class='prevPage button'><i class="icon-arrow-left-2"></i></a>
    <span class='currentPage'></span> Dari <span class='totalPages'></span>
    <a style="cursor: pointer;text-decoration: none;" alt='Next' class='nextPage button'><i class="icon-arrow-right-2"></i></a>
    <a style="cursor: pointer;text-decoration: none;" alt='Last' class='lastPage button'><i class="icon-last"></i></a>
</div>
<script type="text/javascript">
    $('table#course').paginateTable({ rowsPerPage: 10 });
</script>