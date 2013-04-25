<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>

<div class="span7">
    <form id="edit_portofolio" action="<?php echo site_url('portofolio/edit_save') ?>" method="POST" accept-charset="utf-8" >
        <div class="input-control textarea ">
            <h3 style="margin-top: 0px; padding-top: 0px;">Profil</h3>
            <textarea name="profil" id="profil" placeholder="Profil" style="resize: vertical;margin-bottom: 15px;"><?php echo $profil->information; ?></textarea>
            <h3 style="margin-top: 0px; padding-top: 0px;">Mengajar</h3>
            <textarea name="pengajaran" id="pengajaran" placeholder="Mengajar" style="resize: vertical;margin-bottom: 15px;"><?php echo $pengajaran->information; ?></textarea>
            <h3 style="margin-top: 0px; padding-top: 0px;">Riset</h3>
            <textarea name="riset" id="riset" placeholder="Riset" style="resize: vertical;margin-bottom: 15px;"><?php echo $riset->information; ?></textarea>
            <h3 style="margin-top: 0px; padding-top: 0px;">Publikasi</h3>
            <textarea name="publikasi" id="publikasi" placeholder="Publikasi" style="resize: vertical;margin-bottom: 15px;"><?php echo $publikasi->information; ?></textarea>
            <h3 style="margin-top: 0px; padding-top: 0px;">Pengalaman</h3>
            <textarea name="pengalaman" id="pengalaman" placeholder="Pengalaman" style="resize: vertical;margin-bottom: 15px;"><?php echo $pengalaman->information; ?></textarea>
            <h3 style="margin-top: 0px; padding-top: 0px;">Pendidikan</h3>
            <textarea name="pendidikan" id="pendidikan" placeholder="Pendidikan" style="resize: vertical;margin-bottom: 15px;"><?php echo $pendidikan->information; ?></textarea>
        </div>
        <div class="clearfix"></div>
        <input type="submit" value="Update Biodata"/>
    </form>
</div>
<div class="span2" style="text-align: center;">
    <div class="clearfix" style="margin-bottom: 40px;">
        <?php
        if ($profic->profic != NULL) {
            ?>

            <a id ="btn-upload-picture" style="cursor: pointer;" title="Klik untuk edit foto"><img src="<?php echo base_url() . 'resource/' . $profic->profic; ?>" style="width:150px ; heigth:150px"></a>
            <?php
        } else {
            ?>

            <a id="btn-upload-picture" style="cursor: pointer;" title="Klik untuk edit foto"><i class="icon-user" style="font-size: 100px;"></i></a>
            <?php
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    $('form#edit_portofolio').submit(function(){
        //alert($(this).serialize());         
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('portofolio/edit_save'); ?>",
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('portofolio/user') ?>");
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
    $('a#btn-upload-picture').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('portofolio/form_upload_picture') ?>/",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>