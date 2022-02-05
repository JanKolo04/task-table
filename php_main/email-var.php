<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style-email.css">
</head>
<body>

	<?php

		function emailFunction() {
			echo "
				<div class='baner'>
					<div class='textBaner'>
						<h1 id='banerText'>TASK BOARD</h1>
					</div>
				</div>

				<div id='mainEmail'>
					<div id='divText'>
						<div id='hiDiv'>
							<h1 style='font-size: 30px; margin: 0px;'>Forgot Password</h1>
						</div>

						<div id='infoDiv'>
							<p>Enter e-mail for send message with link to change password</p>
						</div>

					</div>

					<form method='POST'>
						<div id='inputDiv'>
								<input type='text' name='email' id='input' placeholder='Email...'>
						</div>


						<div id='buttonDiv'>
							<a href='login' id='undo'>Cancel</a>
							<button id='submit' name='send' type='submit'>Send</button>
						</div>

					</form>
				</div>";
		}


	?>


</body>
</html>