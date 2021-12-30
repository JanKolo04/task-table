<?php

	session_start();

	include("connection.php");

?>



<?php 

	$logged = 0;

	if(array_key_exists("submit", $_POST)) {
		login();
	}

	function login() {
		global $con, $logged;

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
		global $cookie_name;

		$login = $_POST['login'];
		$passwd = $_POST['passwd'];

		if(isset($_POST['checkbox'])) {
			//set login cookie
			setcookie("login", "$login", time() + (86400 * 30), "/"); // 86400 = 1 day

			//set password cookie
			setcookie("password", "$passwd", time() + (86400 * 30), "/"); // 86400 = 1 day

			//after create cokkies main page has been loaded
			header("Location: profile.html");
		}
	}


	function check() {
		//if cookies dosent exist 
		if(!isset($_COOKIE["login"]) & !isset($_COOKIE["password"])) {
			//run functinon on click
			if(array_key_exists("submit", $_POST)) {
				set();
			}
		} 

		//if coockies exist main page has been auto loaded
		else {
		     header("Location: profile.html");
		}
	}

	check();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style-login.css">
	<link rel="stylesheet" type="text/css" href="style-profile.css">
	<link rel="shortcut icon" href="images/t.png">
	<script type="text/javascript" src="script-profile.js"></script>
</head>
<body>
	<?php

	if ($logged == 0) {
		echo "
		<div id='main'>
			<div class='white-background'>
			
				<h1 id='text1'>Login</h1>
				<p id='text2'>Enter your e-mail and password to login</p>

				<div class='allStuff'>
					
					<form method='post'>
						<center><input type='text' name='login' class='login' required placeholder='Login' maxlength='20'></center>
						<center><input type='password' name='passwd' class='passwd' required placeholder='Password' maxlength='30'></center>

						<div id='forgotAndCkeckDiv'>
							<div id='forgotDiv'>
								<a id='forgot-text' href='main.html'>Forgot password</a>
							</div>

							<div id='checkDiv'>
								<input type='checkbox' name='checkbox' id='checkbox'>
								<label for='checkbox'>Remember Me</label>
							</div>
						</div>


						<div id='submit-div'>
							<input type='submit' name='submit' value='Submit' class='submit' id='submit'>
						</div>

						<div id='register-div'>
							<p id='register'>Don't have an account? <a id='registerLink' href='register.php'>Sing up here</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>";
	}

	else {

		echo "
		<form method='POST'>
			<script>
				disableAdd();
				disableTab();
				disableTab2();
			</script>

			<div class='baner'>
				<div class='textBaner'>
					<h1 id='banerText'>TASK BOARD</h1>
				</div>

				<div id='savebDiv'>
					<button id='savebutton'>Save</button>
				</div>

				<div class='linkBaner'>
					<a href='logout.php' id='logoutLink'>Logout</a>
				</div>
			</div>


			<div class='header'>		
				<!---input text---->
				<div class='inputDiv'>
					<input type='text' id='myText' required size='1' placeholder='Task...'>
				</div>

				<!---add button--->
				<div class='buttonDiv'>
					<button class='add_button' id='add_button' onclick='add_task()'>Add</button>
				</div>
			</div>

			<div class='main'>

				<div id='pos'>
					<div class='texts'>
					<!---text--->
						<div class='text1'>
							<h1 id='all_task_text'>All tasks 0</h1>
						</div>

						<div class='text2'>
							<h1 id='tasks_in_progress'>Tasks in progress 0</h1>
						</div>

						<div class='text3'>
							<h1 id='end_tasks'>End tasks 0</h1>
						</div>
						
					</div>


					<!---taskt div--->
					<div class='tasks'>
						<div id='tasks_all'>
							<div id='tasksHolder1'></div>
						</div>

						<div id='progress_task'>
							<div id='tasksHolder2'></div>
						</div>

						<div id='task_end'>
							<div id='tasksHolder3'></div>
						</div>
					</div>

			</div>
		</form>";
	}
	?>

</body>
</html>

