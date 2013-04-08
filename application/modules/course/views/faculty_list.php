<?php foreach ($content as $row): ?>
    <li><a href="javascript:void(0)" id="course_by_faculty" data-id="<?php echo $row->id_faculty; ?>"><?php echo $row->faculty; ?></a></li>
<?php endforeach; ?>
<script type="text/javascript">
    $('a#course_by_faculty').click(function(){
        $('#row-main-other').hide();
        $('#row-button-other').hide();
        $('#message').html("Loading Data");
        $('#loading-template').show();
        var faculty_id = $(this).attr('data-id');
        $('#row-main-content').load("<?php echo site_url('course/knowledge_by_faculty') ?>/"+faculty_id,function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
</script>