<?php
$mail = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$backUpPhone = $_POST['backUpPhone'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$fathersName = $_POST['fathersName'];
$dayOfBirth = $_POST['dayOfBirth'];
$monthOfBirth = $_POST['monthOfBirth'];
$yearOfBirth = $_POST['yearOfBirth'];
$gender = $_POST['pendalf'];
$error='';

$mailRegExp = '/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/';
$nameRegExp = '/^[А-ЯЁ][а-яё]*$/u';
$numberRegExp = '/((\+7|7|8)+([0-9]){10})$/';

if (trim($mail) == '') 
{
	echo json_encode([
		'Введите E-mail'
	]);
	
	exit;
}
elseif(!preg_match($mailRegExp,$email))
{
	echo json_encode([
		'Не коректно ввеедён E-mail'
	]);
	
	exit;
}
elseif (trim($phoneNumber) == '') 
{
	echo json_encode([
		'Введите ваш номер телефона'
	]);
	
	exit;
}
elseif(!preg_match($numberRegExp,$phoneNumber))
{
	echo json_encode([
		'Не коректно ввеедён номер телефона'
	]);
	
	exit;
}
elseif (trim($surname) == '') 
{
	echo json_encode([
		'Введите вашу фамилию'
	]);
	
	exit;
}
elseif(!preg_match($nameRegExp,$surname))
{
	echo json_encode([
		'Не коректно ввеедина ваша фамилия'
	]);
	
	exit;
}
elseif (strlen($surname) < 2 && strlen($surname) > 40) 
{
	echo json_encode([
		'Фамилия должна быть от 2 до 40 символов длинной'
	]);
	
	exit;
}
elseif (trim($name) == '') 
{
	echo json_encode([
		'Введите ваше имя'
	]);
	
	exit;
}
elseif(!preg_match($numberRegExp,$name))
{
	echo json_encode([
		'Не коректно ввеедёно ваше имя'
	]);
	
	exit;
}
elseif (strlen($name) < 2 && strlen($name) > 20) 
{
	echo json_encode([
		'Имя должно быть от 2 до 20 символов длинной'
	]);
	
	exit;
}

elseif(!preg_match($numberRegExp,$fathersName))
{
	echo json_encode([
		'Не коректно ввеедёно ваше отчество'
	]);
	
	exit;
}

elseif(!preg_match($numberRegExp,$phoneNumber))
{
	echo json_encode([
		'Не коректно ввеедён второй номер телефона'
	]);
	
	exit;
}

$message="Почта: {$mail};\r\nНомер телефона: {$phoneNumber};
Дополнительный номер: {$backUpPhone};\r\nФамилия: {$surname};\r\nИмя: {$name};
Отчество: {$fathersName};\r\nДень рождения: {$dayOfBirth};
Месяц рождения: {$monthOfBirth};\r\nГод рождения: {$yearOfBirth};
Пол: {$gender}\r\n";
$subject = 'Test';
$headers = "From: example@mail.ru\r\nReply-to: example@mail.ru
Content-type: text/html;charset=utf-8\r\n";

mail($mail, $subject, $message, $headers);