<!--Sidebar Manager-->
<div class="span2">
    <?php echo $template['partials']['leftbar']; ?>
</div>
<!--Konten-->
<div class="span7" id="content-right">
    <?php echo $template['partials']['form']; ?>
    <?php echo $template['partials']['main']; ?>
</div>
<!-- Rightbar -->
<div class="span3">
    <?php echo $template['partials']['rightbar']; ?>
</div>
<!--Script-->
<script type="text/javascript">
    $('a#btn-site-manager').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('home/site') ?>/"+0,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-my-course').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/my_course') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-my-history').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/list_my_video_history') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-statistik').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('statistik/video_topic') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-watch-later').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/list_my_bookmark_content') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-my-video').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/list_my_video') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-my-sound').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/list_my_sound') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-my-document').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/list_my_document') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-tentang-saya').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('portofolio/user') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-quiz').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    //Logout
    $('#btn-logout').click(function(){        
        $('#message').html("Keluar Dari Sistem");
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/logout') ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#row-top-content').load("<?php echo site_url('home/top') ?>");
                $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
                $('#row-main-other').show();
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#row-top-content').load("<?php echo site_url('home/top') ?>");
                $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
                $('#row-main-other').show();
                $('#loading-template').fadeOut("slow");
            }
        });
        return false;
    });
</script>