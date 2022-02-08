<?php
	
	include("connection.php");
	
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
</head>
<body>

	<?php

		function loginFunction() {

			echo "
				<div class='baner'>
					<div class='textBaner'>
						<h1 id='banerText'>TASK BOARD</h1>
					</div>
				</div>

				<div class='white-background'>
				
					<div id='textHolder'>
						<div id='text1Div'>
							<h1 id='text1'>Login</h1>
						</div>
						<div id='text2Div'>
							<p id='text2'>Enter your e-mail and password to login</p>
						</div>
					</div>

					<div class='allStuff'>
						
						<form method='post'>
							<div id="inputsDiv">
								<div id='inputLoginDiv'>
									<input type='text' name='login' class='input' required placeholder='Login' maxlength='20'>
								</div>

								<div id='inputPasswdDiv'>	
									<input type='password' name='passwd' class='input' id='password' required placeholder='Password' maxlength='30'>

									<i class='bi bi-eye-slash' id='togglePassword'></i>
								</div>
							</div>

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
									<a id='forgot-text' href='email'>Forgot password</a>
								</div>

								<div class='d-flex justify-content-end align-items-center' id='checkDiv'>
									<input type='checkbox' name='checkbox' id='checkbox'>
									<p id='label'>Remember Me</p>
								</div>
							</div>


							<div id='submit-div'>
								<button type='submit' name='submit' class='submit' id='submit'>Submit</button>
							</div>

							<div id='register-div'>
								<p id='register'>Don't have an account? <a id='registerLink' href='register'>Sign up here</a></p>
							</div>
						</form>
					</div>
				</div>";

		}

	?>

</body>
</html>














































