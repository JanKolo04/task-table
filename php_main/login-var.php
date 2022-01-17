<?php
	
	include("connection.php");
	
?>


<!DOCTYPE html>
<html>

<body>

	<?php

		function loginFunction() {

			echo "
				<div id='main'>
					<div class='white-background'>
					
						<h1 id='text1'>Login</h1>
						<p id='text2'>Enter your e-mail and password to login</p>

						<div class='allStuff'>
							
							<form method='post'>
								<input type='text' name='login' class='login' required placeholder='Login' maxlength='20'>
								
								<input type='password' name='passwd' class='passwd' id='password' required placeholder='Password' maxlength='30'>

								<i class='bi bi-eye-slash' id='togglePassword'></i>

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

									<div id='checkDiv'>
										<input type='checkbox' name='checkbox' id='checkbox'>
										<label for='checkbox'>Remember Me</label>
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
					</div>
				</div>";

		}

	?>

</body>
</html>














































