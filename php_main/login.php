<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/t.png">
	<!-------LINK TO LOGIN VAR-------->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-------LINK TO PROF VAR---------->
	
	<title>Task Table</title>
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
			global $logged;
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
			if(isset($_COOKIE["login"]) && isset($_COOKIE["password"])) {
				//run functinon on click
				$logged = 1;
			} 
		}
		set();
		deleteCookies();
		check();


		function page() {
			global $logged, $login;

			if ($logged == 0) {
				loginFunction();
			}

			else {
				profileFunction($login);
			}
		}

		page();


	?>


</body>
</html>

