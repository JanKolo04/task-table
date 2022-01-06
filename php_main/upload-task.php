<?php

	include("connection.php");

	$login = $_COOKIE['loginTask'];

	function all() {
		global $con, $login;

		$all = $_POST['all'];
		echo $all;

		$sql = "INSERT INTO taskowo(login, allTask, progressTask, endTask) VALUES
			('$login', '$all', NULL, NULL)";
		$query = mysqli_query($con, $sql);
	}


	function pro() {
		global $con;

		$pro = ($_POST['pro']);
		echo $pro;

		$sql = "UPDATE taskowo SET progressTask='$pro' WHERE allTask='$pro'";
		$query = mysqli_query($con, $sql);

		$deleteSql = "UPDATE taskowo SET allTask=NULL WHERE allTask='$pro'";
		$deleteQuery = mysqli_query($con, $deleteSql);
	}

	function endd() {
		global $con;

		$end = $_POST['end'];
		echo $end;

		$sql = "UPDATE taskowo SET endTask='$end' WHERE progressTask='$end'";
		$query = mysqli_query($con, $sql);

		$deleteSql = "UPDATE taskowo SET progressTask=NULL WHERE progressTask='$end'";
		$deleteQuery = mysqli_query($con, $deleteSql);
	}


	function remove() {
		global $con;

		$remove = $_POST['remove'];
		echo $remove;

		$sql = "DELETE FROM taskowo WHERE (allTask='$remove' OR progressTask='$remove' OR endTask='$remove')";

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