$(function(){
	$('.searchbox input').focus(function(){
		$(this).css({'border-color':'#5eb95e'});
	}).blur(function(){
		$(this).css({'border-color':'#ddd'});
	});
});
