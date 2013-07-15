<div class="span8">
    <?php if (!$this->ion_auth->logged_in()) { ?>
        <button class="bg-color-red fg-color-white" id="btn-login-first">Add Content <i class="icon-upload"></i></button>
        <button id="btn-login" style="margin-right: 0px;float: right;" class="bg-color-green fg-color-white fright">Login / Sign Up
            <i class="icon-key"></i>
        </button>
    <?php } else { ?>
        <button class="bg-color-blueDark fg-color-white" id="btn-shortcut-content">Add Content <i class="icon-upload"></i></button>
        <?php
        $user = $this->ion_auth->user()->row();
        ?> 
        <button href="<?php echo site_url('forum' . '/' . $user->id) ?>" id="btn-forum" class="bg-color-orangeDark fg-color-white">
            News Feed
            <i class="icon-comments-4"></i> 
        </button>
        <button id="btn-manager" class="bg-color-pinkDark fg-color-white">
            Dashboard
            <i class="icon-cog"></i> 
        </button>
    <?php } ?>
</div>
<div class="span4">
    <form id="form-search">
        <div class="input-control text">
            <input id="katakunci" type="text" placeholder="Search All"/>
            <button class="btn-search"></button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('#form-search').submit(function(){
        var katakunci = $('#katakunci').val();
        if(katakunci == ""){
            alert('Katakunci ?');
            return false;
        }else if(katakunci != ""){
            location.href="<?php echo site_url('search') ?>/"+katakunci;
        }
        return false;
    });
    //Show Submit Content Shortcut
    $('#btn-shortcut-content').click(function(){
        $('#row-main-other').hide();
        $('#row-button-other').hide();
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('content/shortcut') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });

    //Show Feed Page
    $('#btn-forum').click(function(){
        var href= $(this).attr('href');
        document.location = href;
        return false;
    });
    
    //Form Login
    $('#btn-login').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('authz/login') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
    
    //Form Login First
    $('#btn-login-first').click(function(){
        $('#loading-template').fadeOut("slow");
        $('#error-template').show();
        $('#message-error').html("Login To Add New Content");
        return false;
    });
        
    //manager
    $('#btn-manager').click(function(){
        $('#row-main-other').hide();
        $('#row-button-other').hide();
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('home/manager') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>