$(document).ready(function(){
	//отступ снизу в контенте
	if ($('.form-zakaz').length == 0){
		$('.content').css('padding-bottom','70px');
	}
	
	//портфолио ссылки
	$(".portfolio").each(function(){
		var href = $(this).attr("data-href");
		var links = $(this).find("a");
		
		links.each(function(){
			$(this).attr("href", href);
		})
	});
	
});	
