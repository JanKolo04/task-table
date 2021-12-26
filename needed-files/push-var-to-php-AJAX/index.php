<?php

	include("../connection.php");

	$post = ($_POST['text']);
	echo $post;

	$sql = "INSERT INTO test(login, password) VALUES ('$post', 'root123')";
	$query = mysqli_query($con, $sql);

?>

