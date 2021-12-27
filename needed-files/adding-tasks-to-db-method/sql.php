<?php

	include("../connection.php");


	function all() {
		global $con;

		$all = $_POST['all'];
		echo $all;

		$sql = "INSERT INTO taskowo(allTask, proTask, endTask) VALUES ('$all', '', '')";
		$query = mysqli_query($con, $sql);
	}






	if(isset($_POST['all'])) {
		all();
	}


?>


