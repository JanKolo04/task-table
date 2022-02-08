<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
							<h1 style='font-size: 30px; margin: 0px; font-weight: bold;'>Forgot Password</h1>
						</div>

						<div id='infoDiv'>
							<p style='margin: 0px;'>Enter e-mail for send message with link to change password</p>
						</div>

					</div>

					<form method='POST'>
						<div id='inputDiv'>
								<input type='text' name='email' id='input' placeholder='Email...'>
						</div>


						<div class='d-flex justify-content-end align-items-center' id='buttonDiv'>

							<a href='login' id='undo'>Cancel</a>
							<button id='submit' name='send' type='submit'>Send</button>
						</div>

					</form>
				</div>";
		}


	?>


</body>
</html>