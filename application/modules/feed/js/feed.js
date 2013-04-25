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
    $('#postimage, #posturl').addClass('hide').val('');
});
$('.btn-shortcut').live('click', function(){
    $this = $(this);
    if($this.attr('id') == 'image'){
        $('#postimage').removeClass('hide').val('');
        $('#posturl').addClass('hide').val('');
    } else {
        $('#postimage').addClass('hide').val('');
        $('#posturl').removeClass('hide').val('').attr('placeholder', 'Enter ' + $this.attr('id') + ' URL');
    }
    return false;
});
$('.comments li').live('mouseover', function(){
    $(this).children().children('.delete-comment').removeClass('hide');
});
$('.comments li').live('mouseout', function(){
    $(this).children().children('.delete-comment').addClass('hide');
});