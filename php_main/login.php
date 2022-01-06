<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="script-profile.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style-profile.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
	<link rel="stylesheet" type="text/css" href="style-login.css">
	<title>Task Table</title>
	<link rel="shortcut icon" href="images/t.png">
</head>
<body>


	<?php

		session_start();

		include("connection.php");
		include("prof-var.php");
		include("login-var.php");

		$logged = 0;

		if(array_key_exists("submit", $_POST)) {
			login();
		}

		function deleteCookies() {
			if(isset($_POST['logout'])) {

				//unset cookie
				unset($_COOKIE['login']);
				//set null variable for cookies login
				setcookie('login', '', time() - 3600, '/');

				//unset cookies
				unset($_COOKIE['password']);
				//set null variable for cookies password
				setcookie('password', '', time() - 3600, '/');

			}
		}


		function login() {
			global $con, $logged, $login, $passwd;
			$login = $_POST['login'];
			$passwd = $_POST['passwd'];

			$sql = "SELECT login, password FROM users WHERE login='$login'";

			$query = mysqli_query($con, $sql);

			$array = mysqli_fetch_row($query);

			if(!empty($array)) {
				$loginDB = $array[0];
				$passwdDB = $array[1];

					
				if(($login == $loginDB) & ($passwd == $passwdDB)) {
					$logged = 1;
				}

				else {
					echo "<script> alert('Password is uncorrect'); </script>";
				}
			}

			else {
				echo "<script> alert('Login is wrong'); </script>";
			}
		}

		function loginTask() {
			global $login, $logged;
			//set login Task cookie
			//if user was loged cookies for loginTask was set
			//and if user check auto login
			//cookies dosent chnage
			if ($logged == 1) {
				setcookie("loginTask", "$login", time() + (86400 * 30), "/"); // 86400 = 1 day
			}	
		}


		function set() {
			global $login, $passwd;

			if(isset($_POST['checkbox'])) {
				//set login cookie
				setcookie("login", "$login", time() + (86400 * 30), "/"); // 86400 = 1 day

				//set password cookie
				setcookie("password", "$passwd", time() + (86400 * 30), "/"); // 86400 = 1 day

				//after create cokkies main page has been loaded
			}
		}


		function check() {
			global $logged;
			//if cookies dosent exist 
			if(!isset($_COOKIE["login"]) & !isset($_COOKIE["password"])) {
				//run functinon on click
				if(array_key_exists("submit", $_POST)) {
					set();
				}
			} 

			//if coockies exist main page has been auto loaded
			else {
			     $logged = 1;
			}
		}

		deleteCookies();
		loginTask();
		check();


		function page() {
			global $logged, $con, $login;

			if ($logged == 0) {
				loginFunction();
			}

			else {
				profileFunction();
			}
		}

		page();


	?>


</body>
</html>

