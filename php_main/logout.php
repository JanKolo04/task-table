<?php

	include("login.php");


	if(isset($_SESSION['login'])) {
		unset($_SESSION['login']);
	}
	
	//set global var on 0
	$logged = 0;
	//move to login page after logout
	header("Location: login.php");

?>