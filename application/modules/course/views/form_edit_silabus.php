<a class="button bg-color-green fg-color-white" id="back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali</a>
<div class="span8">
    <h2>
        Formulir Edit Silabus
    </h2>
    <form id="submit-edit-silabus" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="input-control">
            <input name="deskripsi" id="deskripsi" type="text" value="<?php echo $select->deskripsi; ?>"/>
            
        </div>
        <input type="submit" value="Submit"/>
    </form>
</div>
<script type="text/javascript">
    var id_silabus = <?php echo $select->id_silabus; ?>;
    var id_course = <?php echo $id;?>;
    $('#submit-edit-silabus').submit(function(){
        $('#message').html('Proses Input');
        $('#loading-template').show();
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/update_silabus') ?>/"+id_silabus,
            data:$(this).serialize(),
            success: function (data, status)
            {
                $('#loading-template').fadeOut("slow");
                $('#info-template').show();
                $('#message-info').html("Silabus telah di edit");
                $('#content-right').load("<?php echo site_url('course/course_silabus') ?>/"+id_course);
                
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                
            }
        });
        return false;
    });
    $('a#back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/course_silabus') ?>/"+id_course,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
</script>