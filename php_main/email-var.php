<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style-email.css">
</head>
<body>

	<?php

		function email() {
			echo "
				<div class='baner'>
					<div class='textBaner'>
						<h1 id='banerText'>TASK BOARD</h1>
					</div>
				</div>

				<div id='mainEmail'>
					<div id='label'>
						<h1 id='text1'>Forgot password</h1>
					</div>
					<div id='textDiv'>
						<p id='text2'>Enter e-mail for send message with link to change password</p>
					</div>

					<form method='POST'>
						<div id='inputDiv'>
							<input type='text' name='email' id='input' placeholder='Enter e-mail...' required>
						</div>

						<div id='buttonsDiv'>
							<div id='backDiv'>
								<a id='back' href='login'>back</a>
							</div>

							<div id='submitDiv'>
								<button id='submit' type='submit' name='send'>Send</button>
							</div>
						</div>
					</form>
				</div>";
		}


	?>


</body>
</html>