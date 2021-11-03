<?php 

session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$login = $_POST['login'];
		$password = $_POST['passwd'];

		if(!empty($login) && !empty($password))
		{

			//read from database
			$query = "select * from users where login = '$login' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						header("Location: profile.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style-login.css">
</head>
<body>

	<div class="main">
		<div class="white-background">
		
			<h1 id="text1">Login</h1>
			<p id="text2">Enter your e-mail and password to login</p>

			<div class="allStuff">
				
				<form method="post">
					<center><input type="text" name="login" class="login" required placeholder="Login" maxlength="20"></center>
					<center><input type="password" name="passwd" class="passwd" required placeholder="Password" maxlength="30"></center>

					<div id="forgot">
						<a id="forgot-text" href="signup.php">Forgot password</a>
					</div>


					<div id="submit-div">
						<input type="submit" value="Submit" class="submit" id="submit">
					</div>

					<div id="register-div">
						<p id="register">Don't have an account? <a id="registerLink" href="main.html">Sing up here</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>