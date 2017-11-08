//Simple js to animate lemon slice.
$(document).ready(function(){
	$('#email').focus(function(){
		$('.happy_lemon').toggleClass('toggle_lemon');
	});

	$('#email').focusout(function(){
		$('.happy_lemon').toggleClass('toggle_lemon');
	});

	$('#email').hover(function(){
		$('.lime_wink').toggleClass('toggle_lemon');
	});

});