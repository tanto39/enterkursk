

<?php
if (isset($_POST['name'])) {$name = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['name']))));}
if (isset($_POST['surname'])) {$surname = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['surname']))));}
if (isset($_POST['phone'])) {$phone = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['phone']))));}
if (isset($_POST['email'])) {$email = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['email']))));}
if (isset($_POST['mess'])) {$mess = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['mess']))));}
if (isset($_POST['capcha'])) {$capcha = htmlspecialchars(trim(stripcslashes(strip_tags($_POST['capcha']))));}

if ($capcha != 4) {echo "<p>Вы ввели неправильное число - 2+2=4. Попробуйте еще раз!</p>";}
else
{
    if (empty($name) || empty($surname) || empty($phone) || empty($email)) 
{echo "<p>Пожалуйста, заполните все поля.</p>";} 
else
{
$to = "tanto39@mail.ru"; /*Укажите ваш адрес электоронной почты*/
$headers = "Content-type: text/plain; charset = utf-8";
$subject = "Сообщение с вашего сайта";
$message = "Имя пославшего: $name \nФамилия: $surname \nТелефон: $phone \nЭлектронный адрес: $email \nСообщение: $mess";
$send = mail ($to, $subject, $message, $headers);

if ($send == 'true')
{
echo "<p>Спасибо за отправку вашего сообщения!</p>";
}
else 
{
echo "<p>Сообщение не отправлено! Попробуйте еще раз!</p>";
}
}
}
?>
