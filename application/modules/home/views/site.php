<!--Sidebar Manager-->
<div class="span3">
    <div class="page-sidebar bg-color-red" style="margin-top: 0px;margin-left: 0px;padding-bottom: 0px;">
        <?php
        $group = $this->ion_auth->get_users_groups()->row();
        $group_id = $group->id;
        
        ?>
        <?php if ($group_id == 1) { ?><!--admin-->
            <ul>
                <li><a id="btn-style"><i class="icon-newspaper"></i> Site Theme</a></li>
            </ul>
            <ul>
                <li><a id="btn-content-pending"><i class="icon-loop"></i> Unconfirm Content</a></li>
                <li><a id="btn-course-pending"><i class="icon-printer"></i> Unconfirm Course</a></li>
                <li><a id="btn-all-topic"><i class="icon-drawer-2"></i> Topic List</a></li>
                <li><a id="btn-all-faculty"><i class="icon-briefcase-2"></i> Institution / Faculty</a></li>
                <li><a id="btn-all-category"><i class="icon-grid"></i> Category List</a></li>
                <li><a id="btn-all-course"><i class="icon-clipboard-2"></i> Course List</a></li>
                <li><a id="btn-all-user"><i class="icon-user-3"></i> Users</a></li>
                <li><a id="btn-content-reported"><i class="icon-blocked"></i> Reported Content</a></li>
            </ul>
            <ul>
                <li><a id="btn-news"><i class="icon-screen"></i> Headline News</a></li>
                <li><a id="btn-beasiswa"><i class="icon-book"></i> Schoolarship</a></li>
                <li><a id="btn-fitur"><i class="icon-gift"></i> Update Feature</a></li>
                <li><a id="btn-kami"><i class="icon-home"></i> Vabel</a></li>
                <li><a id="btn-karir"><i class="icon-user-3"></i> Career</a></li>
                <li><a id="btn-blog"><i class="icon-file"></i> Blogs</a></li>
                <li><a id="btn-pengembangan"><i class="icon-accessibility"></i> Developer</a></li>
                <li><a id="btn-kerjasama"><i class="icon-lab"></i> Cooperation</a></li>
                <li><a id="btn-sponsor"><i class="icon-broadcast"></i> Sponsorship & Donation</a></li>
            </ul>
        <?php } ?>
    </div>
</div>
<!--Konten-->
<div class="span9" id="content-right">
    <div class="span4">
        <img src="<?php echo base_url() ?>asset/css/images/website-administrator.jpg"/>
    </div>
    <div class="span5">
        <h2 style="margin-top: 0px;">Site Administration</h2>
        <p>
            Warning restricted area for administrator only. Becarefull when using feature in this page.
            <br/><br/> ^-^
        </p>
    </div>
</div>
<!--Script-->
<script type="text/javascript">
    $('a#btn-content-pending').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('content/table_content') ?>/"+0,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-course-pending').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/course_pending') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-all-faculty').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/all_faculty') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-all-topic').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/all_topic') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-all-category').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/all_category') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-all-course').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/all_kuliah') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-news').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+1,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-beasiswa').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+2,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-fitur').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+3,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-kami').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+4,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-karir').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+5,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-blog').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+6,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-pengembangan').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+7,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-kerjasama').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+8,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('a#btn-sponsor').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('news/home') ?>/"+9,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-all-user').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('authz/all_user') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-style').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('site/site_edit') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>