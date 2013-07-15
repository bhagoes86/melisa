<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<div class="grid" style="margin-bottom: 20px;margin-top: 0px;padding-top: 0px;">
    <div class="row">
        <div style="padding: 1px 1px 1px 10px;background-color: rgb(255,191,0);">
            <h3 class="fg-color-darken"><i class="icon-comments-4"></i>&nbsp;Come and join us, Find your way to have fun with e-learning.</h3>
        </div>
    </div>
</div>
<div class="span6">
    <p>        
        Login Form    
    </p>
    <div class="hero-unit">
        <form id="do-login">
            <h4>Username</h4>
            <div class="input-control text span5">
                <input name="username" type="text" placeholder="username"/>
            </div>
            <div class="clearfix"></div>
            <h4>Password</h4>
            <div class="input-control password span5">
                <input name="password" type="password" placeholder="password"/>
            </div>
            <div class="clearfix"></div>
            <input type="submit" value="Login" class="bg-color-blueDark"/>
        </form>
    </div>
    <p>        
        Forgot Password
    </p>
    <div class="hero-unit">
        <form id="form_forgot" action="<?php echo site_url('authz/registrasi') ?>" method="POST" accept-charset="utf-8" >
            <h4>Email</h4>
            <div class="input-control email-reset" id="email-wrap">
                <input type="text" id="forgetemails" class="email-reset" name="emails" autocomplete="off"  placeholder="Put your registration email" />
            </div>
            <div class="clearfix"></div>
            <input type="submit" id="reset" name="reset" value="Ganti" tabindex="2" class="bg-color-red"/>
        </form>
    </div>
</div>
<div class="span6">
    <p>        
        Sign Up / Register
    </p>
    <div class="hero-unit">
        <form id="signup" action="<?php echo site_url('authz/registrasi') ?>" method="POST" accept-charset="utf-8" >
            <h4>Username</h4>
            <div class="input-control text span5">
                <input name="fullname" id ="regfullname" type="text" placeholder="username"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>

            <h4>Email</h4>
            <div class="input-control text span5">
                <input name="emails" id ="regemails" type="text" placeholder="email"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>

            <h4>Password</h4>
            <div class="input-control text span5">
                <input name="passwords" id ="regpasswords" type="password" placeholder="password (min 8 character)"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>

            <h4>Retype Password</h4>
            <div class="input-control text span5">
                <input name="retype" id ="regretype" type="password" placeholder="retype password"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>

            <h4>Gender</h4>
            <label class="input-radio" onclick="">
                <input type="radio" name="gender" value=1 checked="">
                <span class="helper" >Men</span>
            </label>

            <label class="input-radio" onclick="">
                <input type="radio" name="gender" value=2 >
                <span class="helper" >Women</span>
            </label>

            <div id="signup" style="margin-top: 18px;">
                <input type="submit" value="Daftar" class="bg-color-orangeDark"/>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
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
                    $('#message-error').html("Login Fail, Check Your Username And Password");
                }else if(data == 3){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Login Fail, Check Your Username And Password");
                }
            },
            error:function (data){                           
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#error-template').html(data);
            }
        });
        return false;
    });
    
    $('form#signup').submit(function(){
        var fullname = $('#regfullname').val();
        var emails = $('#regemails').val();
        var passwords = $('#regpasswords').val();
        var retype = $('#regretype').val();
        var status = 0;
        if(fullname == "" || emails == "" || passwords == "" || retype == ""){
            //tampil message harus diisi semua fieldnya
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("All Field Needed");
            return false;
            
        }
        
        if(passwords.length < 8){
            //tampil message password dan retype mesti sama
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("Password 8 Character Minimum");
            return false; 
        }

        if(retype != passwords){
            //tampil message password dan retype mesti sama
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("Retype Password Not Match");
            return false; 
        }
                
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/registrasi'); ?>",
            data:$(this).serialize(),
            success:function (data){                
                $('#info-template').show();
                $('#message-info').html(data);                
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Check Network Connection / System Error");
            }
        });
        return false;
    });
    
    $('form#form_forgot').submit(function(){
        var emails = $('#forgetemails').val();
        if(emails == ""){
            //tampil message harus diisi semua fieldnya
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("Email harus di isi");
            return false;
        }
        //alert($(this).serialize());         
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/lupa_password'); ?>",
            data:$(this).serialize(),
            success:function (data){                
                $('#info-template').show();
                $('#message-info').html(data);
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
    
    $('button#tutup-pesan').click(function(){
        $('#action-info').slideUp("fast");
        return false;
    });
</script>