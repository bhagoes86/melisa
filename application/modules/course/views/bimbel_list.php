<?php foreach ($content as $row): ?>
    <li>
        <a href="javascript:void(0)" id="course_by_bimbel" data-id="<?php echo $row->id_topic; ?>">
            <?php
            if ($row->status == 4) {
                echo 'SMK -';
            } elseif ($row->status == 3) {
                echo 'SMA -';
            } elseif ($row->status == 2) {
                echo 'SMP -';
            }
            ?>
            <?php echo $row->topic; ?>
        </a>
    </li>
<?php endforeach; ?>
<script type="text/javascript">
    $('a#course_by_bimbel').click(function(){
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