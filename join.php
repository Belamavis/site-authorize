<?php 

# 
#
#

	include_once("config.php");
	checkLoggedIn("no");
	
	$title =  "Страница регистрации";
	
	if (isset($_POST["submit"])) {
			field_validator("login name", $_POST["login"], "alphanumeric", 4, 15);
			field_validator("password", $_POST["password"], "string", 4, 15);
			field_validator("confirmation password", $_POST["password2"], "string", 4, 15);
			if (strcmp($_POST["password"], $_POST["password2"])) {
				$messages[] = "Ваши пароли не совпадают";
			}
			
			$query = "SELECT login FROM users WHERE login = '".$_POST["login"]."'";
			
			$result = mysql_query($query, $link) or die("MySQL query $query failed. Error if any: ".mysql_error());
			
			if (($row = mysql_fetch_array($result))) {
				$messages[] = "Логин \"".$_POST["login"]."\" уже занят, попробуйте другой.";
			}
			if (empty($messages)) {
				newUser($_POST["login"], $_POST["password"]);
				cleanMemberSession($_POST["login"], $_POST["password"]);
				header("Location: members.php")
			}
		}
?>


