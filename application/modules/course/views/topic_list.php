<li><a id="all-course" href="javascript:void(0)">Seluruh Materi</a></li>
<li class="divider"></li>
<?php foreach ($content as $row): ?>
    <li><a href="javascript:void(0)" id="course_by_topic" data-id="<?php echo $row->id_topic; ?>"><?php echo $row->topic; ?></a></li>
<?php endforeach; ?>
<script type="text/javascript">
    $('#all-course').click(function(){               
        $('#row-main-other').hide();
        $('#row-button-other').hide();
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('course/all_course') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#course_by_topic').click(function(){
        $('#row-main-other').hide();
        $('#row-button-other').hide();
        $('#message').html("Loading Data");
        $('#loading-template').show();
        var topic_id = $(this).attr('data-id');
        $('#row-main-content').load("<?php echo site_url('course/knowledge_by_topic') ?>/"+topic_id,function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
</script>