<fieldset class="feed" style="margin-top: 5px;padding-top: 0px;padding-right: 0px;margin-right: 6px;">
    <legend><?php echo modules::run('forum/user_name', $user_id) ?></legend><br/>
    <form id="add-wall" method="post">
        <div class="input-control">
            <input type="text" id="feedtext" placeholder="Hi, Wanna Share Something ?"/>
        </div>
        <div class="input-control textarea hide">
            <input type="file" name="userfile" id="userfile" style="margin-bottom: 10px; display:none;"/>
            <input type="text" name="alamat" id="alamat" style="margin-bottom: 10px; display: none;"/>
            <textarea name="message" class="message" id="feedpost" placeholder="Wanna Share Something ?" style="resize: vertical;"></textarea>
            <input type="hidden" id="forum_type" name="forum_type" value="10"/>
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id ?>"/>
            <input type="hidden" id="user_idto" name="user_idto" value="<?php echo $user_idto ?>"/>
            <div class="toolbar place-left">
                <button title="Upload image" data-id="9" class="btn-shortcut fg-color-white bg-color-blueDark" id="image">
                    <i class="icon-pictures"></i>
                </button>
                <button title="Tautan Youtube" data-id="2" class="btn-shortcut fg-color-white bg-color-red" id="youtube">
                    <i class="icon-youtube"></i>
                </button>
                <button title="Tautan Vimeo" data-id="3" class="btn-shortcut fg-color-white bg-color-blue" id="vimeo">
                    <i class="icon-vimeo"></i>
                </button>
                <button title="Tautan Sideshare" data-id="5" class="btn-shortcut fg-color-white bg-color-orange" id="slideshare">
                    <i class="icon-file-powerpoint"></i>
                </button>
                <button title="Tautan Scribd" data-id="4" class="btn-shortcut fg-color-white bg-color-purple" id="scribd">
                    <i class="icon-file-pdf"></i>
                </button>
                <button title="Tautan Docstoc" data-id="7" class="btn-shortcut fg-color-white bg-color-pink" id="docstoc">
                    <i class="icon-file-word"></i>
                </button>
                <button title="Tautan SoundCloud" data-id="6" class="btn-shortcut fg-color-white bg-color-orangeDark" id="soundcloud">
                    <i class="icon-soundcloud"></i>
                </button>
            </div>
            <div class="toolbar place-right" style="padding-right: 0px;">
                <input id="cancelpost" type="button" value="BATAL"/>
                <input class="bg-color-green" type="submit" value="BAGI" style="margin-right: 0px;"/>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</fieldset>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/ajaxfileupload.js"></script>    
<script type="text/javascript">
    $('.hide-link').live('click', function(){
        $this = $(this);
        $this.html('tutup detail.').removeClass('hide-link').addClass('show-link');
        $this.siblings('.hide').removeClass('hide').addClass('show');
    });
    
    $('.show-link').live('click', function(){
        $this = $(this);
        $this.html('selengkapnya..').removeClass('show-link').addClass('hide-link');
        $this.siblings('.show').removeClass('show').addClass('hide');
    });
    
    $('#feedtext').live('click', function(){
        $(this).parent().addClass('hide');
        $('#feedpost').parent().removeClass('hide');
        $('#feedpost').focus();
    });
    
    $('#cancelpost').live('click', function(){
        $('#feedtext').parent().removeClass('hide');
        $('#feedpost').parent().addClass('hide');
        $('#userfile, #alamat').addClass('hide').val('');
    });
    
    $('.btn-shortcut').click(function(){
        $this = $(this);
        forum_type = $this.attr('data-id');
        if($this.attr('id') == 'image'){
            $('#userfile').show();
            $('#alamat').hide();
            $('#forum_type').val(forum_type);
        } else {
            $('#userfile').hide();
            $('#alamat').show();
            $('#alamat').attr('placeholder', 'Alamat tautan konten ' + $this.attr('id'));
            $('#forum_type').val(forum_type);
        }
        return false;
    });
    
    $('#add-wall').submit(function(){
        var user_id = $('#user_id').val();
        var user_idto = $('#user_idto').val();
        var message = $('.message').val();
        var forum_type = $('#forum_type').val();
        if (forum_type != 9) {
            $.ajax({
                type:'POST',
                url:"<?php echo site_url('forum/add_wall') ?>",
                data:$(this).serialize(),
                success: function (data, status)
                {
                    $.ajax({
                        type:'POST',
                        url:"<?php echo site_url('forum/wall_by_id') ?>/"+data,
                        data:$(this).serialize(),
                        success: function (datas, statuss)
                        {
                            $('#wall_container_first').prepend(datas);
                        },
                        error: function (datas, statuss, ee)
                        {
                            alert('gagal');
                        }
                    });
                },
                error: function (data, status, e)
                {
                    alert('gagal');
                }
            });
        } else {
            $.ajaxFileUpload({
                url:"<?php echo site_url('forum/wall_upload'); ?>",
                secureuri:false,
                fileElementId:'userfile',
                dataType:'json',
                data:{user_id:user_id, 
                    user_idto:user_idto,
                    message:message,
                    forum_type:forum_type
                },
                success: function (data, status)
                {
                    $.ajax({
                        type:'POST',
                        url:"<?php echo site_url('forum/wall_by_id') ?>/"+data.msg,
                        data:$(this).serialize(),
                        success: function (datas, statuss)
                        {
                            $('#wall_container_first').prepend(datas);
                        },
                        error: function (datas, statuss, ee)
                        {
                            alert('gagal');
                        }
                    });
                },
                error: function (data, status, e)
                {
                    $('#message-error').html("Koneksi / Sistem Error");
                }
            });
        }
        return false; 
    });
</script>