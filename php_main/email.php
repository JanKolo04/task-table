<?php

	include("connection.php");

	session_start();

	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
	require 'PHPMailer/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/t.png">
	<link rel="stylesheet" type="text/css" href="css/style-email.css">
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
				<input type="text" name="email" id="input" placeholder="Enter e-mail..." required>
			</div>

			<div id="buttonsDiv">
				<div id="backDiv">
					<a id="back" href="login"> back</a>
				</div>

				<div id="submitDiv">
					<button id="submit" type="submit" name="send">Send</button>
				</div>
			</div>
		</form>
	</div>

	<?php

		if(array_key_exists("send", $_POST)) {
			printEmail();
		}

		function printEmail() {
			global $con, $html;
			$email = $_POST['email'];

			$sql = "SELECT * FROM users WHERE email='$email'";
			$query = mysqli_query($con, $sql);

			$array;
			foreach($query as $key) {
				$array = $key;
			}


			if (isset($array)) {
				//create email
				$mail = new PHPMailer();
				//use SMTP
				$mail->isSMTP();
				//SMTP host
				$mail->Host = "wn13.webd.pl";
				//enable SMTP authorization
				$mail->SMTPAuth = "true";
				//type of encryption ssl
				$mail->SMTPSecure = "ssl";
				//port SMTP
				$mail->Port = "465";
				//emial user
				$mail->Username = "test@mytasks.pl";
				//mail password
				$mail->Password = "Kobie098";
				//email subject
				$mail->Subject = "Test send";
				//sender emial
				$mail->setFrom("test@mytasks.pl");
				//set chars
				$mail->CharSet = "UTF-8";
				//set body on HTML
				$mail->isHTML(true);
				//emial body
				$mail->msgHTML(file_get_contents("email-window.html"));
				//send emial to
				$mail->addAddress($email);
				//send emial
				if($mail->Send()) {
					echo "<script>alert('Email Send');</script>";
				}

				else {
					echo "Error";
				}

				$mail->smtpClose();
			}

			else {
				//alert if empty
				echo "<script> alert('Email dosent exist'); </script>";
			}
		
	
		}

	?>

</body>
</html>

