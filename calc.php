<?php

if (isset($_POST['resultCalc'])) {
	$resultCalc = $_POST['resultCalc'];
}
else {
	echo "ошибка";
	return false;
}

$unicHash = substr(uniqid(),0,8);

file_put_contents($_SERVER['DOCUMENT_ROOT']."/calc/".$unicHash."-calc.html", "<html><head><meta charset='UTF-8'></head><body><div class='calc'>".$resultCalc."</div><style>p{text-align: center;}div{clear: both;overflow: hidden;}.calc-subtitle{margin: 10px 80px;padding: 20px;background:#8FBC8F;}label{float: left;}input{float: right;}.radio-calc-wrap, .checkbox-calk-wrap, .num-calc-wrap, .summa, .message-form{width: 420px;margin: 10px auto;padding: 20px;background:#ADD8E6;}.num-calc-wrap input{width: 100px;}.summa {width: 200px; font-size: 1.6em;}.summa input {width: 80px; height: 30px; font-size: 16px; float: none; padding: 5px;}.button_calc_save{padding: 10px 20px;font-size: 1.2em;background: #5b94a7;border: none;outline: none;color: #ffffff;cursor: pointer;}.button_calc_save:hover{background: #487686;}.calc_result{text-align: center;padding: 20px 0 0 0;}</style></body>");

echo "/calc/".$unicHash."-calc.html";