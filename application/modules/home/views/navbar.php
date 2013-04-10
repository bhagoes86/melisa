<div class="page">
    <div class="nav-bar">
        <div class="nav-bar-inner padding10" style="background: rgb(0,64,128);">
            <span class="pull-menu"></span>

            <a href="<?php echo site_url() ?>" id="btn-home">
                <span class="element brand">
                    <img class="place-left" src="<?php echo base_url(); ?>asset/metro/images/logo32.png" style="height: 20px"/>
                    <?php echo modules::run('site/header_text'); ?> <small>Generasi Pembebas</small>
                </span>
            </a>

            <div class="divider"></div>

            <ul class="menu">
                <li data-role="dropdown">
                    <a href="javascript:void(0)">Kuliah</a>
                    <ul class="dropdown-menu" id="menu_kuliah"></ul>
                </li>                    
                <li data-role="dropdown">
                    <a href="javascript:void(0)">Kampus</a>
                    <ul class="dropdown-menu" id="menu_fakultas"></ul>
                </li>                
                <!--
                <li data-role="dropdown">
                    <a href="javascript:void(0)">Bimbel</a>
                    <ul class="dropdown-menu" id="menu_bimbel"></ul>
                </li>
                -->
                <li><a href="javascript:void(0)" id="btn-new-vid">Repositori</a></li>                
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
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
    
    $('#header_text').load("<?php echo site_url('site/header_text') ?>");
</script>