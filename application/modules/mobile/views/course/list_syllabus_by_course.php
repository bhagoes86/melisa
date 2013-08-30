<?php foreach ($syllabus as $rowsyllabus): ?>
    <li data-cards-type='text'>
        <h2>Total Content - <?php echo modules::run('mobile/content_counter_by_syllabus', $rowsyllabus->id_silabus) ?></h2>
        <p><a style="color: rgb(0,0,0);text-decoration: none;" href="javascript:void(0)" id="content-by-syllabus" data-id="<?php echo $rowsyllabus->id_silabus ?>"><?php echo $rowsyllabus->deskripsi ?></a></p>
    </li>
<?php endforeach; ?>
<script type="text/javascript">
    $('a#content-by-syllabus').tap(function() {
        var id_syllabus = $(this).attr('data-id');
        $('#main_content').empty();
        $('#main_content').load("<?php echo site_url('mobile/list_content_by_syllabus') ?>/" + id_syllabus);
        return false;
    });
</script>