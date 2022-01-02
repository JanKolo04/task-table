<?php

	include("login.php");

	
	//set global var on 0
	$logged = 0;
	
	if(isset($_COOKIE["login"]) & isset($_COOKIE["password"])) {
		//unset cookie
		unset($_COOKIE['login']);
		//set null variable for cookies login
		setcookie('login', '', time() - 3600, '/');

		//unset cookies
		unset($_COOKIE['password']);
		//set null variable for cookies password
		setcookie('password', '', time() - 3600, '/');
	}

	//move to login page after logout
	header("Location: login.php");

?>