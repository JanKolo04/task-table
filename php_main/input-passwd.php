<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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


				<div id='InputDivMain'>
					<div id='textHolder'>
						<div id='DivMainText'>
							<h1 id='mainText'>Enter password</h1>
						</div>

						<div id='DivInfo'>
							<p id='infoText'>Create new password</p>
						</div>
					</div>

					<form method='POST'>
						<div id='inputsDiv'>
							<div id='divInputFirst'>
								<input class='input' id='first' required type='password' name='first' placeholder='Password'>
								<i class='bi bi-eye-slash' id='togglePassword1'></i>
							</div>
						
							<div id='divInputSecond'>
								<input class='input' id='second' required type='password' name='second' placeholder='Repeat password'>
								<i class='bi bi-eye-slash' id='togglePassword2'></i>
							</div>	
							
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

						<div class='d-flex justify-content-end align-items-center' id='divButton'>					
							<a href='login' id='cancelButton'>Cancel</a>
					
							<button id='submitButton' type='submit' name='submitInput'>Submit</button>
						</div>

					</form>
				</div>";
		}

	?>


</body>
</html>








