<div id="for-forgot" >
    <div class="span6">
        <div class="hero-unit">
            <form id="form_forgot" action="<?php echo site_url('authz/registrasi') ?>" method="POST" accept-charset="utf-8" >
                <h3>Reset Password</h3>
                <div id="email-wrap">
                    <input id="emails" class="email-reset" name="emails" autocomplete="off"  placeholder="Masukkan email anda" />
                </div>
                <div class="clearfix"></div>
                <br/>
                <input type="submit" id="reset" name="reset" value="Send to Email" tabindex="2" />
            </form>
            
        </div>
    </div>

    <!-- Sign Up Box -->
    <div id="signup-wrap">
        <div id="signup"></div>
    </div>
</div>
<script type="text/javascript">
    $('form#form_forgot').submit(function(){
        var emails = $('#emails').val();
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