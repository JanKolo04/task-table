<?php

	include("login.php");


	if(isset($_SESSION['login'])) {
		unset($_SESSION['login']);
	}
	
	//set global var on 0
	$logged = 0;
	
	if(isset($_COOKIE["login"]) & isset($_COOKIE["password"])) {
		//unset cookie
		unset($_COOKIE['login']);
		//delete cookies
		setcookie('login', null, -1, '/');

		//unset cookies
		unset($_COOKIE['password']);
		//delete cookies
		setcookie('password', null, -1, '/'); 
	}

	//move to login page after logout
	header("Location: login.php");

?>