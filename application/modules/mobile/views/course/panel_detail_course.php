<div data-role="panel" id="right-panel" data-theme="b" data-position="right" data-display="push">
    <ul data-role="listview">
        <li data-icon="info-sign"><a href="javascript:void(0)" id="info">About Course</a></li>
        <li data-role="list-divider">Welcome</li>
        <li data-icon="list-ol"><a href="javascript:void(0)" id="syllabus-detail-course" data-id="<?php echo $id_course; ?>">Syllabus</a></li>
        <li data-icon="group"><a href="javascript:void(0)" id="student-detail-course" data-id="<?php echo $id_course; ?>">Subscriber</a></li>
        <li data-icon="comments"><a href="javascript:void(0)" id="forum-detail-course" data-id="<?php echo $id_course; ?>">Forum</a></li>
    </ul>
</div>
<script type="text/javascript">
    //open syllabus
    $('a#syllabus-detail-course').tap(function() {
        var id_course = $(this).attr('data-id');
        $('#main_content').empty();
        $('#main_content').load("<?php echo site_url('mobile/list_course_syllabus') ?>/" + id_course, function() {
            $("#right-panel").panel("close");
        });
        return false;
    });
</script>