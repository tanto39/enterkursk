//высота экранов
$(document).ready(function(){
	//var heighttop = $('.topmenu').height();
	//$('header').height(0.87*$(window).height());
	//$('section').height($(window).height()-$('.topmenu').height());
	//$('footer').height($(window).height()-$('.topmenu').height()-20);
	
	$('.shift').css({left: $(window).width()});//начальная позиция элемента сдвигаемого при скролле
	//$('h2').css({height: 0.13*$(window).height(), 'line-height': 0.13*$(window).height()+"px"});//адаптивная высота заголовков
	
	$('.opacity').css({opacity: 0});//начальная прозрачность у плавно появляющихся элементов
	
//скролл до якоря
$('.topmenu a, .zakaz-button').click(function(event){
	event.preventDefault();
	var href = $(this).attr('href');
	var scrollTo = $(href).offset().top-$('.topmenu').height() + 1;
	//alert(href);
	$('html, body').animate({scrollTop: scrollTo}, 1000);
});

//сдиг при скролле
$('.shift').each(function(){
	moveblock($(this));
});

//прозрачность при скролле
$('.opacity').each(function(){
	opacityblock($(this));
});

//параллакс
parallaxFunc(50, 50, 0.05, 0.05);

//форма обратной связи аякс
$('.zakaz').submit(function(e){
	e.preventDefault();
	$('.message-form').css({'display': 'block'});
	var str = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "mail.php",
		data: str,
		success: function(data){
			$('.message-form').html(data);
		}
	});
	return false;
});

//функция для сдвига при скролле
function moveblock(onfront){
	var flag = 1; //флаг для проверки
	$(window).scroll(function(){
		
		if(flag == 1){
				if($(window).scrollTop() > (onfront.offset().top-0.9*$(window).height())){
					flag++;
					onfront.animate({left: 0}, 500);//изменяем положение блока при появлении блока на экране
					
				}//изменяем при достижении элемента его размеры
			
		}//end if flag
		
	}); //end scroll
} //end moveblock

//функция для изменения прозрачности при скролле
function opacityblock(onfront2){
	var flag2 = 1; //флаг для проверки
	$(window).scroll(function(){
		
		if(flag2 == 1){
				if($(window).scrollTop() > (onfront2.offset().top-0.75*$(window).height())){
					flag2++;
					onfront2.animate({opacity: 1}, 2000);//изменяем прозрачность блока при появлении блока на экране
					
				}//изменяем при достижении элемента его прозрачность
			
		}//end if flag
		
	}); //end scroll
} //end opacityblock

//функция для параллакса хидера
//posx - позиция фона по Х, posY - позиция фона по Y, shiftx и shifty - смещение фона по Х и Y соответственно при перемещении курсора
	function parallaxFunc(posx, posy, shiftx, shifty){
		
		var parallax = $('.header');
		var postpagex = 0;
		var postpagey = 0;
		
		parallax.mousemove(function(event){
			event.preventDefault();
			
			var bgpos = parallax.css('background-position');//позиция фона
			
			maxshiftx = parseInt(bgpos); //текущая позиция фона по х
			maxshifty = parseInt(bgpos.substr(maxshiftx.length+1)); //текущая позиция фона по y
			
			var pagex = event.pageX; //получаем позицию мыши x
			var pagey = event.pageY; //получаем позицию мыши y
			
			if(posx <= 3){
				parallax.css({'background-position': '5% '+posy+'%'}); //не даем двигаться если достигнут левый предел
				posx = 3;
			}
			
			if(posx >= 97){
				parallax.css({'background-position': '96% '+posy+'%'}); //не даем двигаться если достигнут правый предел
				posx = 97;
			}
			
			if(pagex>postpagex){
				posx += shiftx; //увеличиваем положение фона по х если текущее положение мыши больше предыдущего
				parallax.css({'background-position':  posx+'% '+posy+'%'});
			}else if(pagex<postpagex){
				posx-=shiftx;//уменьшаем положение фона по х если текущее положение мыши больше предыдущего
				parallax.css({'background-position':  posx+'%'+posy+'%'});
			}else if((pagex==postpagex) || (postpagex == 0)){
				parallax.css({'background-position':  posx+'%'+posy+'%'});//оставляем положение фона по х если текущее положение мыши равно предыдущему либо при первом наведении мыши
			}
			
			
			if(posy <= 3){
				parallax.css({'background-position': posx+'% '+'5%'}); //не даем двигаться если достигнут верхний предел
				posy = 4;
			}
			
			if(posy >= 97){
				parallax.css({'background-position': posx+'% '+'95%'}); //не даем двигаться если достигнут нижний предел
				posy = 97;
			}
			
			if(pagey>postpagey){
				posy += shifty; //увеличиваем положение фона по y если текущее положение мыши больше предыдущего
				parallax.css({'background-position':  posx+'% '+posy+'%'});
			}else if(pagey<postpagey){
				posy-=shifty;//уменьшаем положение фона по y если текущее положение мыши больше предыдущего
				parallax.css({'background-position':  posx+'% '+posy+'%'});
			}else if((pagey==postpagey) || (postpagey == 0)){
				parallax.css({'background-position':  posx+'% '+posy+'%'});//оставляем положение фона по Y если текущее положение мыши равно предыдущему либо при первом наведении мыши
			}

			postpagex = pagex;//фиксируем предыдущее положение мыши X
			postpagey = pagey;//фиксируем предыдущее положение мыши Y
		});
		
	}
	
	
});



