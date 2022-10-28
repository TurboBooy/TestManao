<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestManao</title>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>

	<?php
	session_start();
	if($_COOKIE['user'] == ''):
	?>
		
		<div class="main__container">
			<div class="register">
				<form action="regist.php" method="post">
					<h1>Регистрация</h1><br>
					<label>Логин</label>
					<span><?=$_SESSION['error_login']?></span> <br>
					<input type="text"  require placeholder="введите логин" name="login"><br>
					<label>Пароль</label>
					<span><?=$_SESSION['error_userPass']?></span> <br>
					<input type="password"  require placeholder="придумайте пароль" name="pass"><br>
					<label>Подтверждение пароля</label>
					<span><?=$_SESSION['error_userConfPass']?></span> <br>
					<input type="password"  require placeholder="введите пароль повторно" name="confirm_pass"><br>
					<label>Почтовый адрес(email)</label>
					<span><?=$_SESSION['error_email']?></span> <br>
					<input type="email"  require placeholder="введите email" name="email"><br>
				<label>Имя пользователя</label>
				<span><?=$_SESSION['error_userName']?></span> <br>
				<input type="text" require  placeholder="ведите имя" name="userName"><br>
				<button type="submit">Зарегистрироваться</button>
				</form>
				</div>
				<div class="autolog">
				<form action="auth.php" method="post">
				<h1>Авторизация</h1><br>
				<label>Логин</label>
				<span><?=$_SESSION['error_authLogin']?></span> <br>
				<input type="text" require  placeholder="введите логин" name="login"><br>
				<label>Пароль</label>
				<span><?=$_SESSION['error_authPass']?></span> <br>
				<input type="password" require placeholder="введите пароль" name="pass"><br>
				<button type="submit">Войти</button>
				</div>
				</div>
				<?php else: ?>
				<p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажми - <a href="/exit.php">ВЫХОД</a></p>
				<?php endif;?>
				
				</body>
				
				</html>