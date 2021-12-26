<?php

	include("connection.php");

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/t.png">
	<link rel="stylesheet" type="text/css" href="style-password.css">
	<title>Regenerate password</title>
</head>
<body>

	<div id="main">
		<div id="label">
			<h1 id="text1">Forgot password</h1>
		</div>
		<div id="textDiv">
			<p id="text2">Enter e-mail for send message with link to change password</p>
		</div>

		<form method="POST">
			<div id="inputDiv">
				<input type="text" name="email" id="input" placeholder="Enter e-mail...">
			</div>

			<div id="buttonDiv">
				<button id="button" type="submit" name="send">Send</button>
			</div>
		</form>
	</div>

	<?php

		if(array_key_exists("send", $_POST)) {
			printEmail();
		}

		function printEmail() {
			global $con;
			$email = $_POST['email'];

			$sql = "SELECT * FROM users WHERE email='$email'";
			$query = mysqli_query($con, $sql);

			$array;
			foreach($query as $key) {
				$array = $key;
			}

			if (isset($array)) {
				//wysłanie emaila
				echo "<script>console.log('send!')</script>";
				print_r($array);
			}

			else {
				//alert if empty
				echo "empty";
			}
		
	
		}

	?>

</body>
</html>

