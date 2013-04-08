<a class="button bg-color-green fg-color-white" id="back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali</a>
<h3>Silabus Course</h3>
<div class="span8">
    <form id="add-silabus">
        <div class="input-control text span6">
            <input name="deskripsi" id="deskripsi" type="text" placeholder="Deskripsi"/>
            <button class="helper"></button>
        </div>
        <div class="input-control select span6">
            <select name="silabus_id" id="silabus_id">
                <option value="0">Parent Utama</option>
                <?php foreach ($silabus_parent as $row): ?>
                    <option value="<?php echo $row->id_silabus; ?>"><?php echo $row->deskripsi; ?></option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <input type="hidden" name="course_id" id="course_id" value="<?php echo $id; ?>"/>
        <div class="input-control select span6">
            <input type="submit" value="Tambahkan"/>
        </div>
    </form>
</div>
<table class="striped">
    <thead>
        <tr>
            <th><b>Topik</b></th>
            
            <th><b>Aksi</b></th>

        </tr>
    </thead>

    <tbody>      
        <?php foreach ($silabus_parent as $row): ?>
            <tr>
                <td>
                    <a style="cursor: pointer;"><?php echo $row->deskripsi; ?></a>
                </td>
                
                <td style="width: 30px;border: 1px solid white;vertical-align: middle;background-color:rgba(0, 0, 0, 0.0666667);">
                    <a title="edit" href="javascript:void(0)" id="btn-edit" data-id="<?php echo $row->id_silabus; ?>"><i class="icon-pencil fg-color-pink"></i></a>
                    <a title="hapus" href="javascript:void(0)" id="btn-delete" data-id="<?php echo $row->id_silabus; ?>"><i class="icon-remove fg-color-red"></i></a>
                </td>
            </tr>
            <?php echo modules::run('course/check_child', $row->id_silabus, $id) ?>
            
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    var id_course =<?php echo $id;?>;
    $('#add-silabus').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        var id_course = <?php echo $id ?>;
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/course_silabus_add') ?>",
            data:$(this).serialize(),
            success: function (data, status)
            {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#info-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('course/course_silabus' . '/' . $id) ?>");
                    $('#loading-template').fadeOut("slow");
                    $('#content-right').fadeIn("fast");
                }
                
            },
            error: function (data, status, e)
            {
                $('#loading-template').hide();
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
                $('#content-right').load("<?php echo site_url('course/my_course') ?>");
            }
        });
        return false;
    });
    $('a#back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('course/my_course') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('a#btn-edit').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_silabus = $(this).attr('data-id');
        
        $('#content-right').load("<?php echo site_url('course/silabus_edit') ?>/"+id_silabus+"/"+id,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
    $('a#btn-delete').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_silabus = $(this).attr('data-id');
        var id_course = <?php echo $id;?>;
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/delete_silabus') ?>/"+id_silabus,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/course_silabus') ?>/"+id_course,function(){
                    $('#loading-template').fadeOut("slow");
                });
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#message-error').html('Proses Gagal');
                $('#error-template').show();
            }
        });
        return false; 
    });
    
    
</script>