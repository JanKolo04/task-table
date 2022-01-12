<?php 
	session_start();

	include("connection.php");
?>


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

	<div id="content">
		<div id="textHolder">
			<div id="textDiv1">
				<h1 id="text1">Enter password</h1>
			</div>

			<div id="textDiv2">
				<p id="text2">Create new password</p>
			</div>
		</div>

		<div id="stuff">
			<form method="POST">
				<div id="inputsDiv">
					<center>
						<input class="input" id="first" required type="password" name="first" placeholder="Password">
						<i class="bi bi-eye-slash" id="togglePassword1"></i>
					</center>


					<center>
						<input class="input" id="second" required type="password" name="second" placeholder="Repeat password">
						<i class="bi bi-eye-slash" id="togglePassword2"></i>
					</center>
				</div>

				<div id="submitDiv">
					<button id="button" type="submit" name="submit" onclick="checking()">Submit</button>
				</div>
			</form>
		</div>
	</div>


	<script type="text/javascript">
		function checking() {
			//fisrt password
			var first = document.getElementById("first").value;
			//repeat passwd
			var second = document.getElementById("second").value;

			//if passwords is differents show error
			if(first != second) {
				alert("password is diffrents!");
			}
		}

		var button1 = document.getElementById("togglePassword1");
		var button2 = document.getElementById("togglePassword2");
		
		var input1 = document.getElementById("first");
		var input2 = document.getElementById("second");

		button1.onclick = function() {

			if(input1.type == "password") {
				input1.setAttribute("type", "text");
				button1.className = "bi bi-eye";
			}

			else {
				input1.setAttribute("type", "password");
				button1.className = "bi bi-eye-slash";

			}

		}


		button2.onclick = function() {

			if(input2.type == "password") {
				input2.setAttribute("type", "text");
				button2.className = "bi bi-eye";
			}

			else {
				input2.setAttribute("type", "password");
				button2.className = "bi bi-eye-slash";

			}

		}
	</script>


	<?php

		if(array_key_exists("submit", $_POST)) {
			run();
		}


		function run() {
			global $con;

			$first = $_POST['first'];
			$second = $_POST['second'];

			//table name and data
			$sql = "UPDATE test SET password='$first' WHERE login='janek'";
			$query = mysqli_query($con, $sql);
		}

	?>

</body>
</html>








