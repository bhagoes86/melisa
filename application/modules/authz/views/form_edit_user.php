<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit User</h3>
<form id="do-edit-user" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h4 style="margin-top: 0px; padding-top: 0px;">Username</h4>
    <div class="input-control text span6">
        <input name="username" id="username" type="text" placeholder="Username" value ="<?php echo $user->username;?>"/>        
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Password</h4>
    <div class="input-control textarea span6">
        <input name="password" id="password" type="password" placeholder="Password" value ="<?php echo $user->password;?>"/>     
    </div>
    <div class="clearfix"></div>
    <h4 style="margin-top: 0px; padding-top: 0px;">Email</h4>
    <div class="input-control textarea span6">
        <input name="email" id="email" type="text" placeholder="Email" value ="<?php echo $user->email;?>"/>        
    </div>
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var id = <?php echo $id;?>;
    $('#do-edit-user').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('authz/edit_user_db'); ?>/"+id,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('authz/all_user') ?>");
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