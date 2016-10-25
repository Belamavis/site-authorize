<?php

# #################################################
# Скрип для подключения к базе данных пользователей
# #################################################

	session_start();	# Запуск сессии
	error_reporting(E_ALL);		# Включение сообщений для отладки
	
	include_once("functions.php");
	
	$messages = array();	# Сообщения системы
	$dbhost = "localhost";	# Хост
	$dbuser = "reynold";	# Имя пользователя
	$dbpass = "belomor1945"; # Пароль
	$dbname = "authorize";	# Название БД
	
	connectToDB();
?>
