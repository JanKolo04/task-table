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

		function input_passwd() {
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








