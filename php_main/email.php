<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/t.png">
	<!---bootsptrap---->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-----LINKS FOR EMAIL PAGE----->
	<link rel="stylesheet" type="text/css" href="css/style-email.css">
	
	<!-----LINKS FOR CODE PAGE------>
	<link rel="stylesheet" type="text/css" href="css/style-veryfi.css">

	<!-----LINKS FOR INPUT PAGE----->
	<link rel="stylesheet" type="text/css" href="css/style-input-passwd.css">
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
			global $con, $send, $emailDB;

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

			//add random numbers into data base
			//add into db for security
			/*
				1.Stowrzyc kolumne code w bazie danych user
				2.Dodać do tej kolumny stworzony kod
				3.Stworzyć warunek:
					if(zawartość_kolumny == NULL) {
						dodac wartośc
					}
					else {
						update wartość
					}
				4.W funkcji getCode pobrać zawartośc kolumny
				  i stworzyć instrukcje z porównaniem

			*/

			//set cookie for mail
			setcookie("reset", "$emailDB", time() + (86400 * 1), "/"); 

			//update column kod
			$insert_code = "UPDATE users SET kod='$numbers' WHERE email='$emailDB'";
			$mysqli_insert_code = mysqli_query($con, $insert_code);


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
		function veryfiFunction() {
			global $emailDB;
			$codePage = file_get_contents("veryfi-var.php");
			$codePage = str_replace("{{email}}", $emailDB, $codePage);

			echo $codePage;
		}

		//function for get code
		function getCode() {
			global $codeStatus, $con, $send;
			$code = $_POST['code'];

			//get cookie
			$mailCookie = $_COOKIE['reset'];

			//get code from database
			$get_code_DB = "SELECT kod FROM users WHERE email='$mailCookie'";
			$mysqli_get_code_DB = mysqli_query($con, $get_code_DB);
			$codeDB = mysqli_fetch_row($mysqli_get_code_DB);

			if($code == $codeDB[0]) {
				$codeStatus = 1;
			}
			else {
				$send = 1;
			}
		}

		//funciton to change password
		function run() {
			global $con;
			//get input passwords
			$first = $_POST['first'];
			$second = $_POST['second'];

			/*

			1.add alsert if password is diffrents and if is diffresnts stay on page
			  $codeStatus = 1;

			*/

			//get cookie
			$mailCookie = $_COOKIE['reset'];			

			//table name and data
			$sql = "UPDATE users SET password='$first' WHERE email='$mailCookie'";
			$query = mysqli_query($con, $sql);
		}


		//function to show pages
		function page() {
			global $send, $codeStatus;

			//if send==1 show veryfi page
			if($send == 1) {
				veryfiFunction();
			}

			else if($codeStatus == 1) {
				input_passwd_function();
			}

			else {
				emailFunction();
			}
		}

		page();

	?>

</body>
</html>

