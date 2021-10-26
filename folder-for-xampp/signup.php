<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style-register.css">
	<script type="text/javascript" src="login-script.js"></script>
</head>
<body>

	<div class="main">
		<div class="white-background">


		
			<h1 id="text1">Register</h1>
			<p id="text2">Enter login e-mail and password to create account</p>

			<div class="allStuff">
				<form method="post">

					<div class="login-email">
						<div class="Login">
							<center><input type="text" id="login" required placeholder="Login"></center>
						</div>

						<div class="Email">
							<center><input type="text" id="email" required placeholder="E-mail"></center>
						</div>
					</div>


					<div class="passwords">
						<div class="passwd1">
							<center><input type="password" id="passwd" required placeholder="Password"></center>
						</div>

						<div class="passwd2">
							<center><input type="password" id="rPasswd" required placeholder="Repeat Password"></center>
						</div>
					</div>


					<div class="submit-login">
						<div id="submit-div">
							<input type="submit" value="Submit" class="submit" id="submit">
						</div>

						<div id="login-div">
							<p id="loginText">If you have an account? <a id="loginLink" href="login.php">Login</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>