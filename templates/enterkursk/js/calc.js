$(document).ready(function(){
//калькулятор
	$('.summa input').val('5900');
	$('.summa input').attr("value", '5900');
	
	$('.calc input[type=checkbox]').click(function(){
		
		if($(this).prop('checked')){
			var sum = parseInt($('.summa input').val());
			sum += parseInt($(this).val());
			$('.summa input').val(sum);
			$('.summa input').attr("value", sum);
			
			$(this).attr("checked", "checked");
		}
		else{
			var sum = parseInt($('.summa input').val());
			sum -= parseInt($(this).val());
			$('.summa input').val(sum);
			$('.summa input').attr("value", sum);
			
			$(this).removeAttr("checked");
		}
	});
	
	
	var radio1val = parseInt($('.radio-calc-wrap-1 input:checked').val());
	$('.radio-calc-wrap-1 input').click(function(){
		var sum = parseInt($('.summa input').val());
		sum -= radio1val;
		sum += parseInt($(this).val());
		$('.summa input').val(sum);
		$('.summa input').attr("value", sum);
		radio1val = parseInt($('.radio-calc-wrap-1 input:checked').val());
		
		$('.radio-calc-wrap-1 input').each(function(){
			$(this).removeAttr("checked");
		});
			
		$(this).attr("checked", "checked");
	});
	
	var i;
	var numarr = $('.num-calc-wrap input')
	var numval = 0;
	var numprice=[150,500, 100, 50, 50];
	$('.num-calc-wrap input').change(function(){
		var valNum = $(this).val()
		
		if(valNum < 0){
			$(this).val(0);
		}
		
		var sum = parseInt($('.summa input').val());
		sum -= numval;
		
		numval = 0;
		for (i = 0; i < numarr.length; i++){
			numval += (parseInt(numarr.eq(i).val())*numprice[i]);
		}
		
		sum += numval;
		$('.summa input').val(sum);
		$('.summa input').attr("value", sum);
		
		$(this).attr("value", valNum);
	});	
	
	//кнопка сохранить результат
	$(".button_calc_save").click(function(){
		var resultCalc = $('.calc').html();
		
		$.ajax({
			url: "/calc.php",
			type: "POST",
			data: {resultCalc: resultCalc},
			success: function(data) {
				var htmlVal = "<a download href='"+data+"'>Скачать результат в формате html (открывается в браузере)</a>";
				$(".calc_result").html(htmlVal);
			}
		});
		
	});
	
});
