<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<div class="span6">
    <div class="hero-unit">
        <form id="do-login">
            <div class="input-control text span5">
                <input name="username" type="text" placeholder="username"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>
            <div class="input-control password span5">
                <input name="password" type="password" placeholder="password"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>
            <input type="submit" value="Login" class="bg-color-blueDark"/>
            <a class="button bg-color-red fg-color-white" id="btn-lupa-password" style="cursor: pointer;">Lupa password <i class="icon-help"></i></a>
            <a class="button bg-color-orangeDark fg-color-white" id="btn-registrasi" style="cursor: pointer;">Daftar <i class="icon-printer"></i></a>
        </form>
    </div>
</div>
<div class="span6">
    <h3>Hi :-)</h3>
    <p>        
        Selamat datang di sakola.net. Untuk masuk
        kedalam sistem, Inputkan USERNAME dan PASSWORD. <br/><br/>Ayo bergabung bersama komunitas SAKOLA !
    </p>
</div>
<script type="text/javascript">
    //Logout
    $('#do-login').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Penelusuran Data Pengguna");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/do_login'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                if(data == 1){
                    $('#row-top-content').load("<?php echo site_url('home/top') ?>");
                    $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
                    $('#loading-template').fadeOut("slow");
                }else if(data == 2){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Login Gagal, Cek Username Dan Password");
                }else if(data == 3){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Login Gagal, Cek Username Dan Password");
                }
            },
            error:function (data){
                $('#row-top-content').load("<?php echo site_url('home/top') ?>");
                $('#row-main-content').load("<?php echo site_url('home/welcome') ?>");
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    $('a#btn-registrasi').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('authz/register') ?>/",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-lupa-password').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('authz/forget_password') ?>/",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>