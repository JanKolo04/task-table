<?php

	include("connection.php");


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

	function endd() {
		global $con;

		$end = $_POST['end'];
		echo $end;

		$sql = "UPDATE taskowo SET endTask='$end' WHERE proTask='$end'";
		$query = mysqli_query($con, $sql);

		$deleteSql = "UPDATE taskowo SET proTask='' WHERE proTask='$end'";
		$deleteQuery = mysqli_query($con, $deleteSql);
	}


	function remove() {
		global $con;

		$remove = $_POST['remove'];
		echo $remove;

		$sql = "DELETE FROM taskowo WHERE (allTask='$remove' OR proTask='$remove' OR endTask='$remove')";

		$query = mysqli_query($con, $sql);
	}




	if(isset($_POST['all'])) {
		all();
	}

	if(isset($_POST['pro'])) {
		pro();
	}

	if(isset($_POST['end'])) {
		endd();
	}

	if(isset($_POST['remove'])) {
		remove();
	}
?>