$(document).ready(function(){
	//отступ снизу в контенте
	if ($('.form-zakaz').length == 0){
		$('.content').css('padding-bottom','70px');
	}
	
	//портфолио ссылки
	$(".portfolio a").click(function(e){
		e.preventDefault();
		var href = $(this).closest(".portfolio").attr("data-href");
		window.open(href, '_blank');
	});
	
});	
