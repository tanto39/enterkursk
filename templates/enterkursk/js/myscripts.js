//кнопка наверх
$(document).ready(function(){
	function show_scrollTop(){
		( $(window).scrollTop() > 750 ) ? $('.scroll').css('display','block') : $('.scroll').css('display','none');
	}
	$(window).scroll( function(){ show_scrollTop(); } );
	show_scrollTop();
	$('.scroll').click(function(event) {
		event.preventDefault();
		$('html,body').animate({scrollTop: 0}, 1000 );	
	});

//колебания при скролле
var move = 5; //размер сдвига, %
var duration = 70; //длительность

$('.centerimg').each(function(){
	moveblock($(this));
});

//изменение прозрачности блоков
//прозрачность при скролле
$('.opacity').css({opacity: 0});//начальная прозрачность у плавно появляющихся элементов
$('.opacity').each(function(){
	opacityblock($(this));
});

//функция для изменения прозрачности при скролле
function opacityblock(onfront2){
	var flag2 = 1; //флаг для проверки
	$(window).scroll(function(){
		
		if(flag2 == 1){
				if($(window).scrollTop() > (onfront2.offset().top-0.9*$(window).height())){
					flag2++;
					onfront2.animate({opacity: 1}, 2000);//изменяем прозрачность блока при появлении блока на экране
					
				}//изменяем при достижении элемента его прозрачность
			
		}//end if flag
		
	}); //end scroll
} //end opacityblock

//функция для изменения прозрачности при скролле
function moveblock(onfront){
	var flag = 1; //флаг для проверки
	$(window).scroll(function(){
		
		if(flag == 1){
				if($(window).scrollTop() > (onfront.offset().top-0.7*$(window).height())){
					flag++;
					onfront.animate({left: move+'%'}, duration)
					.animate({left: '-'+2*move+'%'}, duration)
					.animate({left: 0.5*move+'%'}, duration)
					.animate({left: '-'+move+'%'}, duration)
					.animate({left: 0.25*move+'%'}, duration)
					.animate({left: '-'+0.5*move+'%'}, duration)
					.animate({left: 0.12*move+'%'}, duration)
					.animate({left: '-'+0.24*move+'%'}, duration)
					.animate({left: '0%'}, duration);//изменяем положение блока при появлении блока на экране
					
				}//изменяем при достижении элемента его размеры
			
		}//end if flag
		
	}); //end scroll
} //end moveblock

//форма обратной связи аякс

$(".form-zakaz form").submit(function(e) {
	e.preventDefault();
	$('.message-form').css('display','block');
	var str = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: str,
			success: function(data) {
				$('.message-form').html(data);	
			}
			
		});
return false;
});

//Блок с услугами на главной
/*$(".service").hover(
	function() {
		console.log("111");
		$(this).children(".service-desc").animate({height:"450px"}, 400).dequeue('fx');
	},
	function() {
		console.log("222");
		$(this).children(".service-desc").animate({height:"0"}, 400).dequeue('fx');
	}
);*/

//ссылка на  соглашение
$(".form-pd a").attr("href", "pd.docx");

// jivosite
(function(){ var widget_id = 'dwH0vi6Pfn';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();

});

