<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style-veryfi.css">
</head>
<body>
	<?php

		function veryfi() {
			echo "
				<div class='baner'>
					<div class='textBaner'>
						<h1 id='banerText'>TASK BOARD</h1>
					</div>
				</div>

				<div id='mainVeryfi'>
					<div id='divText'>
						<div id='hiDiv'>
							<h1 style='font-size: 25px; margin: 0; margin-left: 10px;'>Veryfi code</h1>
						</div>

						<div id='infoDiv'>
							<p>Check your inbox for the email with the code. The code consists of 6 digits.</p>
						</div>

						<div id='emailDiv' style='margin-left: 10px;'>
							<p>Code was sended on email {{link}}</p>
						</div>
					</div>

					<div id='inputDiv'>
						<input type='text' name='code' id='code' placeholder='Code...'>
					</div>


					<div id='buttonDiv'>
						<a href='login' id='cancel'>Cancel</a>
						<button id='submit'>Submit</button>
					</div>
				</div>";

		}


	?>


</body>
</html>