<?php
	
	include("connection.php");
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<?php


			$loginPage = "
				<div id='main'>
					<div class='white-background'>
					
						<h1 id='text1'>Login</h1>
						<p id='text2'>Enter your e-mail and password to login</p>

						<div class='allStuff'>
							
							<form method='POST'>
								<center>
									<input type='text' name='login' class='login' required placeholder='Login' maxlength='20'>
								</center>
								
								<center>
									<input type='password' name='passwd' class='passwd' id='password' required placeholder='Password' maxlength='30'>

									<i class='bi bi-eye-slash' id='togglePassword'></i>
								</center>

								<script>
									var button = document.getElementById('togglePassword');
									var input = document.getElementById('password');


									button.onclick = function() {

										if(input.type == 'password') {
											input.setAttribute('type', 'text');
											button.className = 'bi bi-eye';
										}

										else {
											input.setAttribute('type', 'password');
											button.className = 'bi bi-eye-slash';

										}

									}
								</script>


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




	?>

</body>
</html>














































