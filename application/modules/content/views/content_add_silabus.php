<a class="button bg-color-green fg-color-white" id="back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali</a>
<h3>Silabus</h3>
<div class="span8">
    <form id="add-silabus">
        <div class="input-control select span6">
            <select name="silabus_id" id="silabus_id">
                <?php foreach ($silabus_course as $row): ?>
                    <option value="<?php echo $row->id_silabus; ?>"><?php echo $row->deskripsi; ?></option>
                <?php endforeach; ?>
            </select>
        </div>&nbsp;
        <div class="input-control select span6">
            <input type="submit" value="Tambahkan"/>
        </div>
    </form>
        <div class="span6" >
        <table class="striped">
            <thead>
                <tr>
                    <td>Silabus</td>
                    <td style="width: 50px;text-align: center;">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($silabus_content as $row): ?>
                    <tr>
                        <td><?php echo $row->deskripsi ?></td>
                        <td style="width: 50px;text-align: center;">
                            <a id="btn-delete-content-course" href="javascript:void(0)" style="cursor: pointer;" data-id-content-silabus="<?php echo $row->id_content_silabus;?>" ><i class="icon-remove fg-color-red"></i></a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   
</div>

<script type="text/javascript">
    
    $('#add-silabus').submit(function(){
        $('#loading-template').show();
        $('#message').html("Loading Data");
        
        $('#content-right').fadeOut("fast");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/content_silabus_add') . '/' . $id_content ?>",
            data:$(this).serialize(),
            success: function (data, status)
            {
                if (data == 1){
                    $('#loading-template').fadeOut("slow");
                    $('#error-template').show();
                    $('#message-error').html("Data Sudah Pernah Diinput");
                    $('#content-right').fadeIn("fast");
                }else{   
                    $('#content-right').load("<?php echo site_url('content/content_silabus'  . '/' . $id_content. '/' . $id_course) ?>");
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
        $('#content-right').load("<?php echo site_url('content/content_config') . '/' . $id_content ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    
     $('a#btn-delete-content-course').click(function(){
        $('#message').html('Menghapus Konten');
        $('#loading-template').show();
        var id_content_silabus = $(this).attr('data-id-content-silabus');
        
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('content/delete_silabus_content') ?>/"+id_content_silabus,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('content/content_silabus'  . '/' . $id_content. '/' . $id_course) ?>",function(){
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