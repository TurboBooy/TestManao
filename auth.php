<?php
session_start();

$userLogin = htmlspecialchars(trim($_POST['login']));
$userPass = htmlspecialchars(trim($_POST['pass']));

$_SESSION['login'] = $userLogin;
$_SESSION['pass'] = $userPass;

$userPass = md5($pass."ASD32131234adsa");

function redirect(){
	header('Location: index.php');
	exit;
};

if(file_exists('bd.json')){
	$file = file_get_contents('bd.json');
	$userList = json_decode($file, true);
};
unset($file);

foreach($userList as $key => $value) {
	if(in_array('login', $value));{
		if(in_array($userLogin, $value)) {
			foreach($userList as $key => $value) {
				if(in_array('pass', $value));{
					if(in_array($userPass, $value)) {
						header('Location: index.php');
						setcookie('user', $userList['name'], time() + 3600, "/");
					} else {
						$_SESSION['error_authPass'] = 'Неверный пароль';
						redirect();
					}
				}		
			}
		}else {
			$_SESSION['error_authLogin'] = 'Пользователь не найден';
			redirect();
			}
		} 
	}
?>