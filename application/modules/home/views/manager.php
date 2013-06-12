<!--Sidebar Manager-->
<div class="span3">
    <div class="page-sidebar bg-color-red" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;">
        <ul>
            <li><a id="btn-tentang-saya"><i class="icon-user"></i> Tentang Saya</a></li>
        </ul>
        <ul>
            <li><a id="btn-my-video"><i class="icon-film"></i> Video</a></li>
            <li><a id="btn-my-sound"><i class="icon-playlist"></i> Suara</a></li>
            <li><a id="btn-my-document"><i class="icon-file"></i> Dokumen</a></li>
        </ul>
        <ul>
            <li><a id="btn-my-course"><i class="icon-address-book"></i> Materi Ajar</a></li>
            <li><a id="btn-quiz"><i class="icon-drawer-2"></i> Kelola Kuis</a></li>
            <li><a id="btn-assignment"><i class="icon-box-remove"></i> Kelola Tugas</a></li>
            
        </ul>
        <ul>
            
        </ul>
        <?php
        $group = $this->ion_auth->get_users_groups()->row();
        $group_id = $group->id;
        ?>
        <?php if ($group_id == 1) { ?><!--admin-->
            <ul class="bg-color-orangeDark">
                <li><a id="btn-site-manager" class="fg-color-white"><i class="icon-newspaper"></i> Manajemen Situs</a></li>
            </ul>
        <?php } ?>
    </div>
</div>
<!--Konten-->
<div class="span9" id="content-right">
    <div class="span9">
        <h2 style="padding-top: 0px;margin-top: 0px;">Halo,
            <?php
            $user = $this->ion_auth->user()->row();
            echo strtoupper($user->username);
            ?>
        </h2>
        <p>
            Selamat datang <br/>Halaman ini dapat digunakan untuk mengelola konten yang ditautkan. 
            Masing-masing fitur dapat diakses melalui menu di sebelah kiri. <br/><br/>Selamat menggunakan ^-^
        </p>
    </div>
    <div class="span5">
        <img src="<?php echo base_url() ?>asset/css/images/pencilcase.png" style="width: 100%;"/>
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