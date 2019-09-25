

<?php
if (isset($_POST['name'])) {$name = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['name']))));}
if (isset($_POST['phone'])) {$phone = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['phone']))));}



if (empty($name) || empty($phone)) {
	echo "<p>Пожалуйста, заполните все поля.</p>";
}else{
	$to = "tanto39@mail.ru"; /*Укажите ваш адрес электоронной почты*/
	$headers = "Content-type: text/plain; charset = utf-8";
	$subject = "Сообщение с вашего сайта";
	$message = "Имя пославшего: $name \nТелефон: $phone";
	
	$send = mail($to, $subject, $message, $headers);

	if ($send == 'true'){
		echo "<p>Спасибо за отправку вашего сообщения!</p>";
	}else{
		echo "<p>Сообщение не отправлено! Попробуйте еще раз!</p>";
	}
}

?>
