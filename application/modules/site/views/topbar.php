<div class="nav-bar">
    <div class="nav-bar-inner padding10" style="background: <?php echo '#' . $topbar->bgheader; ?>">

        <a href="<?php echo site_url() ?>" id="btn-home">
            <span class="element brand">
                <?php echo $topbar->header; ?> <small><?php echo $topbar->caption; ?></small>
            </span>
        </a>
        <div class="divider"></div>
        <ul class="menu">
            <a href="javascript:void(0)" id="btn-all-course">
                <span class="element brand">
                    <small><?php echo $topbar->menu1; ?></small>
                </span>
            </a>
            <a href="javascript:void(0)" id="btn-all-content">
                <span class="element brand">
                    <small><?php echo $topbar->menu2; ?></small>
                </span>
            </a>
            <a href="<?php echo site_url('news' . '/selected_type/4') ?>" id="btn-all-content">
                <span class="element brand">
                    <small>News Update</small>
                </span>
            </a>
            <a href="javascript:void(0)" id="btn-all-content">
                <span class="element brand">
                    <small>About Us</small>
                </span>
            </a>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        //home
        $('#btn-home').click(function(){       
            $('#row-main-other').show();
            $('#row-button-other').show();
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-main-content').load("<?php echo site_url('home/welcome') ?>",function(){
                $('#loading-template').fadeOut('slow'); 
            });        
        });
    
        //new video
        $('#btn-new-vid').click(function(){       
            $('#row-main-other').hide();
            $('#row-button-other').hide();
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-main-content').load("<?php echo site_url('content/video_list') ?>",function(){
                $('#loading-template').fadeOut('slow'); 
            });        
        });
        
        //all course
        $('#btn-all-course').click(function(){       
            $('#row-main-other').hide();
            $('#row-button-other').hide();
            $('#message').html("Loading Data");
            $('#loading-template').show();
            $('#row-main-content').load("<?php echo site_url('course/all_course') ?>",function(){
                $('#loading-template').fadeOut('slow'); 
            });        
        });
    });
</script>