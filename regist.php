<?php 

	session_start();

	$userLogin = htmlspecialchars(trim($_POST['login']));
	$userPass = htmlspecialchars(trim($_POST['pass']));
	$userConfPass = htmlspecialchars(trim($_POST['confirm_pass']));
	$userEmail = htmlspecialchars(trim($_POST['email']));
	$userName = htmlspecialchars(trim($_POST['userName']));
	
	$_SESSION['login'] = $userLogin;
	$_SESSION['pass'] = $userPass;
	$_SESSION['email'] = $userEmail;
	$_SESSION['userName'] = $userName;
	$_SESSION['confirm_pass'] = $userConfPass;

	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	unset($_SESSION['email']);
	unset($_SESSION['userName']);
	unset($_SESSION['userConfPass']);

	unset($_SESSION['error_login']);
	unset($_SESSION['error_userPass']);
	unset($_SESSION['error_email']);
	unset($_SESSION['error_userName']);
	unset($_SESSION['error_userConfPass']);
	
	
	function redirect(){
		header('Location: index.php');
		exit;
	};
	
	
	if(strlen($userLogin) < 6) {
		$_SESSION['error_login'] = 'Введите корректно логин';
		redirect();
		;} 
		elseif(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/u",$userPass)) {
			$_SESSION['error_userPass'] = '(пароль должен состоять из строчных и прописных букв латиницы + цифры(минимум 6)';
			redirect();
		}	
		elseif(strlen($userPass) < 6 ) {
			$_SESSION['error_userPass'] = 'Пароль слишком короткий';
			redirect();
		}	
		elseif($userConfPass !== $userPass) {
			$_SESSION['error_userConfPass'] = 'Пароли не совпадают';
			redirect();
		}
		elseif(strlen($userEmail) < 5) {
			$_SESSION['error_email'] = 'Введите корректно почтовый адресс';
			redirect();
		}
		elseif(strlen($userName) < 2 || preg_match("/^([А-ЯЁ]{1}[а-яё]{29})|([A-Z]{1}[a-z]{29})$/u",$userName)) {
			$_SESSION['error_userName'] = 'Некорректное имя(с большой буквы, минимум 2';
			redirect();
		}
		else {
			$userPass = md5($pass."ASD32131234adsa");

			if(file_exists('bd.json')){
				$file = file_get_contents('bd.json');
				$userList = json_decode($file, true);
			};
			unset($file);

			
			$userList[] = array(
				'login'=>array($userLogin),
				'pass'=>array($userPass),
				'email'=>array($userEmail),
				'name'=>array($userName),
			);
			
			foreach($userList as $key => $value) {
				if(in_array('login', $value));{
					if(in_array($userLogin, $value)) {
					$_SESSION['error_login'] = 'Такой пользователь уже существует';
					redirect();
					} else {foreach($userList as $key => $value) {
						if(in_array('email', $value));{
							if(in_array($userEmail, $value)) {
								$_SESSION['error_email'] = 'Данная почта уже занята';
								redirect();
							} else if ($userList) {
								$file[] = $userList;
								file_put_contents('bd.json', json_encode($userList, JSON_UNESCAPED_UNICODE));
								header("Location: index.php");
								};
							}
						}
					}
				}}};

?>