<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Topic</h3>
<form id="do-input-topic" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="input-control text span4 clearfix">
        <input name="topic" id="topic" type="text" placeholder="topic" value="<?php echo $topic->topic;?>"/>
        <button class="helper"></button>
    </div>
    <div class="clearfix"></div>
    <div class="input-control select span5">
        <select name="status" id="status">
            <option value="5">PT Perguruan Tinggi</option>
            <option value="4">SMK Sekolah Menengah Kejuruan / Sederajat</option>
            <option value="3">SMA Sekolah Menengah Atas / Sederajat</option>
            <option value="2">SMP Sekolah Menengah Pertama / Sederajat</option>
            <option value="1">SD Sekolah Dasar / Sederajat</option>
        </select>
    </div>
    <div class="clearfix"></div>
    
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var id=<?php echo $id ;?>;
    $('#do-input-topic').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/topic_update');?>/"+id,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/all_topic') ?>");
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