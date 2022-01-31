<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/t.png">
	<title>Regenerate password</title>
</head>
<body>

	<?php

		session_start();

		include("connection.php");
		include("email-var.php");
		include("input-passwd.php");

		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
		require 'PHPMailer/Exception.php';

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		

		//global varaible for pages
		$send = 0;
		$codeStatus = 0;


		//run functions sections
		if(array_key_exists("send", $_POST)) {
			printEmail();
		}

		if(array_key_exists("submit", $_POST)) {
			getCode();
		}

		if(array_key_exists("submitInput", $_POST)) {
			run();
		}


		//function  to send email and generate code
		function printEmail() {
			global $con, $send, $emailDB, $numbers;

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

			//random numbers
			$numbers = "";
			for($i=0; $i<6; $i++) {
				$random = rand(0,9);
				$numbers = $numbers.$random;
			}


			//repalce data in email message
			$emailWindow = file_get_contents("email-window.php");
			//array for data to change
			$editsData = [
				"{{login}}" => $array['login'],
				"{{code}}" => $numbers
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
				$mail->Password = "***";
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


		//code for change 
		function veryfi() {
			global $emailDB;
			$codePage = file_get_contents("veryfi-var.php");
			$codePage = str_replace("{{email}}", $emailDB, $codePage);

			echo $codePage;
		}

		//function for get code
		function getCode() {
			global $code, $numbers, $codeStatus;
			$code = $_POST['code'];

			if($code == $numbers) {
				$codeStatus = 1;
			}
		}

		//funciton to change password
		function run() {
			global $con, $emailDB;
			//get input passwords
			$first = $_POST['first'];
			$second = $_POST['second'];

			//table name and data
			$sql = "UPDATE users SET password='$first' WHERE login='$emailDB'";
			$query = mysqli_query($con, $sql);
		}


		//function to show pages

		//if send==1 show veryfi page
		if($send == 1) {
			veryfi();
		}

		else if($codeStatus == 1) {
			input_passwd();
		}

		else {
			email();
		}

	?>

</body>
</html>

