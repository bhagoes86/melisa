<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/pagecontrol.js"></script>
<div class="span7">
    <p style="margin-top: 0px; padding-top: 0px;"><?php echo nl2br($pendidikan->information); ?></p>
    <div class="page-control" data-role="page-control">
        <ul>
            <li class="active"><a href="#profil">Profil</a></li>
            <li class=""><a href="#pengajaran">Mengajar</a></li>
            <li class=""><a href="#riset">Riset</a></li>
            <li class=""><a href="#publikasi">Publikasi</a></li>
            <li class=""><a href="#pengalaman">Pengalaman</a></li>
        </ul>

        <div class="frames">
            <div class="frame active" id="profil">
                <h4 style="margin-top: 0px; padding-top: 0px;"><?php echo nl2br($profil->information); ?></h4>
            </div>
            <div class="frame " id="pengajaran">
                <h4 style="margin-top: 0px; padding-top: 0px;"><?php echo nl2br($pengajaran->information); ?></h4>
            </div>
            <div class="frame " id="riset">
                <h4 style="margin-top: 0px; padding-top: 0px;"><?php echo nl2br($riset->information); ?></h4>
            </div>
            <div class="frame " id="publikasi">
                <h4 style="margin-top: 0px; padding-top: 0px;"><?php echo nl2br($publikasi->information); ?></h4>
            </div>
            <div class="frame " id="pengalaman">
                <h4 style="margin-top: 0px; padding-top: 0px;"><?php echo nl2br($pengalaman->information); ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="span2" style="text-align: center;">
    <div class="clearfix" style="margin-bottom: 40px;" style="width:600px">
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
    <a id="btn-edit-portofolio" class="button bg-color-yellow" style="width: 100%;">
        <i class="icon-pencil"></i>
        Edit Data
    </a><br/>
</div>
<script type="text/javascript">
    $('#btn-edit-portofolio').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('portofolio/edit_portofolio') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-upload-picture').click(function(){        
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('portofolio/form_upload_picture') ?>/",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>