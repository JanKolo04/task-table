<?php

	session_start();

	include("connection.php");
	include("email-var.php");
	include("veryfi-var.php");

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
	<link rel="shortcut icon" href="images/t.ico" type="image/x-icon">
	<title>Regenerate password</title>
</head>
<body>

	<?php

		$send = 0;

		if(array_key_exists("send", $_POST)) {
			printEmail();
		}

		function printEmail() {
			global $con, $send;

			$email = $_POST['email'];

			//get id,login and emaik from db where is email from POST
			$sql = "SELECT id,login,email FROM users WHERE email='$email'";
			$query = mysqli_query($con, $sql);
			
			$array = [];
			foreach($query as $key) {
				$array = $key;
			}
			//email from db for check if is correct
			$emailDB = $array['email'];



			/*----------------replace data in email message----------------*/
			//replace data in email message
			//create new array with information to url
			$linkArray = [
				"id" => $array['id'],
				"login" => $array['login']
			];

			//create url with data from array
			$queryString = http_build_query($linkArray);
			//put all together
			$link = "https://www.mytasks.pl/input-passwd?".$queryString;


			//repalce data in email message
			$emailWindow = file_get_contents("email-window.php");
			//array for data to change
			$editsData = [
				"{{login}}" => $linkArray['login'],
				"{{link}}" => $link
			];

			//replcae data
			foreach($editsData as $key => $value) {
				$emailWindow = str_replace($key, $value, $emailWindow);
			}

			if ($email == $emailDB) {
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
				$mail->Username = "janek@mytasks.pl";
				//mail password
				$mail->Password = "Kobie098";
				//email subject
				$mail->Subject = "Password reset";
				//sender emial
				$mail->setFrom("janek@mytasks.pl");
				//set chars
				$mail->CharSet = "UTF-8";
				//set body on HTML
				$mail->isHTML(true);
				//emial body
				$mail->msgHTML($emailWindow);
				//send emial to
				$mail->addAddress($email);
				//send emial
				if(!$mail->Send()) {
					echo "<script>alert('Message cano't bee send');</script>";
				}

				else {
					$mail->smtpClose();
					$send = 1;
				}
			}

			else {
				//alert if empty
				echo "<script> alert('Email dosent exist'); </script>";
			}
		}

		function page() {
			global $send;

			if($send == 1) {
				veryfi();
			}
			else {
				email();
			}
		}

		page();
		

	?>

</body>
</html>

