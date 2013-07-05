<fieldset class="feed" style="margin-top: 5px;">
    <legend><i class="icon-user"></i>Personalisasi</legend>
    <div class="progress-bar">
        <div class="bar-caption" style="width:70%"> 70%</div>
        <div class="bar bg-color-green" style="width:70%"></div>
        <div class="bar bg-color-yellow" style="width:30%"></div>
    </div>
    <ul class="listview side-list">
        <li>
            <div class="icon bg-color-green fg-color-white">
                <i class="icon-newspaper"></i>
            </div>
            <div class="data">
                <p style="line-height:14px;">Perbarui detail informasi sehingga teman-teman anda dapat mengenal anda.</p>
            </div>
        </li>
    </ul>
    <div class="toolbar">
        <button id="btn-course-subscribe" title="Kuliah Langganan"><i class="icon-list"></i></button>
        <button id="btn-content-bookmark" title="Lihat Nanti"><i class="icon-bookmark-4"></i></button>
        <button id="btn-content-log" title="Penelusuran"><i class="icon-history"></i></button>        
    </div>
</fieldset>
<script type="text/javascript">
    $('#btn-course-me').click(function(){
        alert('Sedang Dikembangkan')
    });
    $('#btn-course-subscribe').click(function(){
        $('#after-post').hide();
        $('div.pager').remove();                
        $('#message').html("Loading Data");
        $('#loading-template').show();                
        $('#wall_container').empty();                
        $('#wall_container').load("<?php echo site_url('forum/wall_course_subscribe') ?>",function(){                
            $('#loading-template').fadeOut("slow");                
            $('.category_time').empty();
            $('.category_faculty').empty();
        });
    });
    $('#btn-content-bookmark').click(function(){
        $('#after-post').hide();
        $('div.pager').remove();                
        $('#message').html("Loading Data");
        $('#loading-template').show();                
        $('#wall_container').empty();                
        $('#wall_container').load("<?php echo site_url('forum/wall_content_bookmark') ?>",function(){                
            $('#loading-template').fadeOut("slow");                
            $('.category_time').empty();
            $('.category_faculty').empty();
        });
    });
    $('#btn-content-log').click(function(){
        $('#after-post').hide();
        $('div.pager').remove();                
        $('#message').html("Loading Data");
        $('#loading-template').show();                
        $('#wall_container').empty();                
        $('#wall_container').load("<?php echo site_url('forum/wall_content_log') ?>",function(){                
            $('#loading-template').fadeOut("slow");                
            $('.category_time').empty();
            $('.category_faculty').empty();
        });
    });
</script>