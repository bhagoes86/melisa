<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<div class="span6">
    <div id="for-signup" class ="hero-unit">
        <form id="signup" action="<?php echo site_url('authz/registrasi') ?>" method="POST" accept-charset="utf-8" >
            <h3>Register New Account</h3>
            <div class="input-control text span5">
                <input name="fullname" id ="fullname" type="text" placeholder="username"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>
            <div class="input-control text span5">
                <input name="emails" id ="emails" type="text" placeholder="email"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>
            <div class="input-control text span5">
                <input name="passwords" id ="passwords" type="password" placeholder="password"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>
            <div class="input-control text span5">
                <input name="retype" id ="retype" type="password" placeholder="retype-password"/>
                <button class="helper"></button>
            </div>
            <div class="clearfix"></div>

            <label class="input-radio" onclick="">
                <input type="radio" name="gender" value=1 checked="">
                <span class="helper" >Laki-laki</span>
            </label>

            <label class="input-radio" onclick="">
                <input type="radio" name="gender" value=2 >
                <span class="helper" >Perempuan</span>
            </label>
            <!-- Sign Up Box -->

            <div id="signup">
                <br/>
                <input type="submit" value="Sign Up"/>
            </div>
        </form>
    </div>
</div>
<div class="span6">
    <img src="<?php echo base_url(); ?>asset/css/images/HomePage_Registration.jpg" style="width: 600px; height: 325px;">
</div>
<script type="text/javascript">
    $('form#signup').submit(function(){
        var fullname = $('#fullname').val();
        var emails = $('#emails').val();
        var passwords = $('#passwords').val();
        var retype = $('#retype').val();
        var status = 0;
         if(fullname == "" || emails == "" || passwords == "" || retype == ""){
            //tampil message harus diisi semua fieldnya
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("Semua field harus diisi");
            return false;
            
        }
        
        if(passwords.length < 8){
            //tampil message password dan retype mesti sama
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("Gunakan minimal 8 huruf untuk password");
            return false; 
        }

        if(retype != passwords){
            //tampil message password dan retype mesti sama
            $('#loading-template').fadeOut("slow");
            $('#error-template').show();
            $('#message-error').html("Retype password harus sama");
            return false; 
        }
       
        //alert($(this).serialize());         
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/registrasi'); ?>",
            data:$(this).serialize(),
            success:function (data){
                $('#row-main-content').load("<?php echo site_url('authz/success') ?>");
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
    
</script>