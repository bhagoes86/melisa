<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/pagecontrol.js"></script>
<div class="span7">
    <div class="page-control" data-role="page-control">
          <?php foreach($test as $row):?>
                    <?php if($row->type == 6){?>
                    <?php echo $row->information ?><br/>
                    <?php } ?>    
          <?php endforeach; ?>
          <button id="btn-edit" class="bg-color-green">Edit</button>
            <ul>
                <li class="active"><a href="#profil">PROFIL</a></li>
                <li class=""><a href="#pengajaran">PENGAJARAN</a></li>
                <li class=""><a href="#riset">RISET</a></li>
                <li class=""><a href="#publikasi">PUBLIKASI</a></li>
                <li class=""><a href="#pengalaman">PENGALAMAN</a></li>
            </ul>

            <div class="frames">
                <div class="frame active" id="profil">
                <?php foreach($test as $row):?>
                    <?php if($row->type == 1){?>
                     <li>
                    <?php echo $row->information ?><br/>
                    </li>
                    <?php } ?>    
                <?php endforeach; ?>
                </div>
                <div class="frame " id="pengajaran">
                <?php foreach($test as $row):?>
                    <?php if($row->type == 2){?>
                     <li>
                    <?php echo $row->information ?><br/>
                    </li>
                    <?php } ?>    
                <?php endforeach; ?>
                </div>

                <div class="frame " id="riset">
                <?php foreach($test as $row):?>
                    <?php if($row->type == 3){?>
                     <li>
                    <?php echo $row->information ?><br/>
                    </li>
                    <?php } ?>    
                <?php endforeach; ?>
                </div>
                <div class="frame " id="publikasi">
                <?php foreach($test as $row):?>
                    <?php if($row->type == 4){?>
                     <li>
                    <?php echo $row->information ?><br/>
                    </li>
                    <?php } ?>    
                <?php endforeach; ?>
                </div>
                <div class="frame " id="pengalaman">
                <?php foreach($test as $row):?>
                    <?php if($row->type == 5){?>
                     <li>
                    <?php echo $row->information ?><br/>
                    </li>
                    <?php } ?>    
                <?php endforeach; ?>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    $('#btn-edit').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('portofolio/edit_portofolio') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>