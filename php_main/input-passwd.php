<?php 
	session_start();

	include("connection.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style-input-passwd.css">
	<link rel="shortcut icon" href="images/t.png">
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
					<input class="input" id="first" required type="password" name="first" placeholder="Password">
					<input class="input" id="second" required type="password" name="second" placeholder="Repeat password">
				</div>

				<div id="submitDiv">
					<button id="button" type="submit" name="submit" onclick="checking()">Submit</button>
				</div>
			</form>
		</div>
	</div>


	<script type="text/javascript">
		function checking() {
			var first = document.getElementById("first").value;
			var second = document.getElementById("second").value;

			if(first != second) {
				alert("password is diffrents!");
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




