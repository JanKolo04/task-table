<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style-input-passwd.css">
	<link rel="shortcut icon" href="images/t.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
	<title>Register password</title>
</head>
<body>

	<?php

		function input_passwd_function() {
			echo "
				<div class='baner'>
					<div class='textBaner'>
						<h1 id='banerText'>TASK BOARD</h1>
					</div>
				</div>


				<div id='content'>
					<div id='textHolder'>
						<div id='textDiv1'>
							<h1 id='text1'>Enter password</h1>
						</div>

						<div id='textDiv2'>
							<p id='text2'>Create new password</p>
						</div>
					</div>

					<div id='stuff'>
						<form method='POST'>
							<div id='inputsDiv'>
								<center>
									<input class='input' id='first' required type='password' name='first' placeholder='Password'>
									<i class='bi bi-eye-slash' id='togglePassword1'></i>
								</center>


								<center>
									<input class='input' id='second' required type='password' name='second' placeholder='Repeat password'>
									<i class='bi bi-eye-slash' id='togglePassword2'></i>
								</center>
							</div>

							<script>
								//input2
								var button1 = document.getElementById('togglePassword1');
								var input1 = document.getElementById('first');

								//input 2
								var button2 = document.getElementById('togglePassword2');
								var input2 = document.getElementById('second');


								button1.onclick = function() {
									if(input1.type == 'password') {
										input1.setAttribute('type', 'text');
										button1.className = 'bi bi-eye';
									}

									else {
										input1.setAttribute('type', 'password');
										button1.className = 'bi bi-eye-slash';
									}
								}

								button2.onclick = function() {
									if(input2.type == 'password') {
										input2.setAttribute('type', 'text');
										button2.className = 'bi bi-eye';
									}

									else {
										input2.setAttribute('type', 'password');
										button2.className = 'bi bi-eye-slash';
									}
								}
							</script>

							<div id='submitDiv'>
								<button id='button' type='submit' name='submitInput'>Submit</button>
							</div>
						</form>
					</div>
				</div>";
		}

	?>


</body>
</html>








