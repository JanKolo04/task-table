<?php

	include("../connection.php");


	function all() {
		global $con;

		$all = $_POST['all'];
		echo $all;

		$sql = "INSERT INTO taskowo(allTask, proTask, endTask) VALUES ('$all', '', '')";
		$query = mysqli_query($con, $sql);
	}


	function pro() {
		global $con;

		$pro = ($_POST['pro']);
		echo $pro;

		$sql = "UPDATE taskowo SET proTask='$pro' WHERE allTask='$pro'";
		$query = mysqli_query($con, $sql);

		$deleteSql = "UPDATE taskowo SET allTask='' WHERE allTask='$pro'";
		$deleteQuery = mysqli_query($con, $deleteSql);
	}






	if(isset($_POST['all'])) {
		all();
	}

	if(isset($_POST['pro'])) {
		pro();
	}

?>


