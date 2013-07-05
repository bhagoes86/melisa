<?php if ($subscribe_status == '') { ?>
    <button title="Langganan" id="subscribe<?php echo $course_id ?>" data-course="<?php echo $course_id ?>" ><i class="icon-bookmark"></i>&nbsp;</button>
    <script type="text/javascript">
        $("button#subscribe<?php echo $course_id ?>").click(function(){
            var course_id = $(this).attr('data-course');
            $.ajax({
                url: "<?php echo site_url('plugin/add_subscribe_me') ?>/"+course_id,
                success: function(){
                    $('button#subscribe'+course_id).fadeOut('fast');
                }
            });
            return false;
        });
    </script>
<?php } else { ?>
<?php } ?>
