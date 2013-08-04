<div class="row" id="row-main-content">
    <a class="shortcut bg-color-red" id="btn-my-video">
        <span class="icon fg-color-white"><i class="icon-film"></i></span>
        <span class="label fg-color-white">Podcast</span>
    </a>
    <a class="shortcut bg-color-blueDark" id="btn-my-document">
        <span class="icon  fg-color-white"><i class="icon-file-pdf"></i></span>
        <span class="label  fg-color-white">Document</span>
    </a>
    <a class="shortcut bg-color-orange" id="btn-my-document">
        <span class="icon fg-color-white"><i class="icon-monitor"></i></span>
        <span class="label fg-color-white">Presentation</span>
    </a>
    <a class="shortcut bg-color-pinkDark" id="btn-my-course">
        <span class="icon fg-color-white"><i class="icon-address-book"></i></span>
        <span class="label fg-color-white">Course</span>
    </a>
    <a class="shortcut bg-color-pink" id="btn-quiz">
        <span class="icon fg-color-white"><i class="icon-drawer-2"></i></span>
        <span class="label fg-color-white">Quiz</span>
    </a>
    <!--
    <a class="shortcut bg-color-green" id="btn-assignment">
        <span class="icon fg-color-white"><i class="icon-box-remove"></i></span>
        <span class="label fg-color-white">Assignment</span>
    </a>
    -->
    <?php
    $group = $this->ion_auth->get_users_groups()->row();
    $group_id = $group->id;
    ?>
    <?php if ($group_id == 1) { ?><!--admin-->
        <a class="shortcut bg-color-orangeDark fright" id="btn-site-manager">
            <span class="icon fg-color-white"><i class="icon-cog"></i></span>
            <span class="label fg-color-white">Admin</span>
        </a>
    <?php } ?>
    <div class="bg-color-blueDark" style="padding-bottom: 1px;margin-bottom: 10px;"></div>
</div>
<!--Konten-->
<div class="span12" id="content-right">
    <div class="span4">
        <img src="<?php echo base_url() ?>asset/css/images/pencilcase.png" style="width: 85%;"/>
    </div>
    <div class="span8">
        <h2 style="padding-top: 0px;margin-top: 0px;">Halo,
            <?php
            $user = $this->ion_auth->user()->row();
            echo strtoupper($user->username);
            ?>
        </h2>
        <p>
            Welcome <br/>Halaman ini dapat digunakan untuk mengelola konten dan materi ajar. 
            Semua fungsi dapat diakses melalui shortcut yang tersedia. <br/><br/>Selamat menggunakan ^-^
        </p>
    </div>
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
    $('a#btn-assignment').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('assignment/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });    
</script>