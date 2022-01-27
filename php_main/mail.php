<?php
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
	require 'PHPMailer/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


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
	$mail->Username = "jkolodziej@mytasks.pl";
	//mail password
	$mail->Password = "***";
	//email subject
	$mail->Subject = "Test send";
	//sender emial
	$mail->setFrom("jkolodziej@mytasks.pl");
	//emial body
	$mail->Body = "It works";
	//send emial to
	$mail->addAddress("jkolodziej@mytasks.pl");
	//send emial
	if($mail->Send()) {
		echo "Emial Send";
	}

	else {
		echo "Error";
	}

	$mail->smtpClose();
?>
