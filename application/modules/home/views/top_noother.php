<div class="span8"></div>
<div class="span4">
    <form id="form-search">
        <div class="input-control text">
            <input id="katakunci" type="text" placeholder="Kata Kunci Pencarian"/>
            <button class="btn-search"></button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('#form-search').submit(function(){
        var katakunci = $('#katakunci').val();
        if(katakunci == ""){
            alert('Katakunci ?');
            return false;
        }else if(katakunci != ""){
            location.href="<?php echo site_url('search') ?>/"+katakunci;
        }
        return false;
    });
    //Form Login
    $('#btn-search').click(function(){
        $('#message').html("Loading Data");
        $('#loading-template').show();
        $('#row-main-content').load("<?php echo site_url('authz/login') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
        return false;
    });
</script>