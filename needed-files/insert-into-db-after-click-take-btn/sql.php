<?php

	include("../connection.php");

	function all() {
		global $con;

		$post = ($_POST['pro']);
		echo $post;

		$sql = "INSERT INTO taskowo(allTask, proTask, endTask) VALUES ('$post', '', '')";
		$query = mysqli_query($con, $sql);
	}

	if(isset($_POST['pro'])) {
		all();
	}
?>


