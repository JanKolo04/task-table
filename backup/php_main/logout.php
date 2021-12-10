<?php

include("login.php");


if(isset($_SESSION['login']))
{
	unset($_SESSION['login']);

}

$logged = 0;

header("Location: login.php");

?>