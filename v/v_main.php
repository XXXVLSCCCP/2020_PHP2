
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Главная страница</a> |
		<a href="index.php?c=page&act=edit">Страница для редактирования</a>
		<?php
			if ($user) {
				echo '<a href="index.php?c=user&act=info">Личный кабинет</a> | <a href="index.php?c=user&act=logout">Выйти('. $user .')</a>';
			} else {
				echo '<a href="index.php?c=user&act=login">|Войти</a> | <a href="index.php?c=user&act=reg">Регистрация</a>';
			}
		?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		2020 Все права защищены
	</div>
</body>
</html>