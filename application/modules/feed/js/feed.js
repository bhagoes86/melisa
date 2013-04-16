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