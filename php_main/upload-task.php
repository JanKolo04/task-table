<?php

	include("connection.php");

	$login = $_COOKIE['cookieTask'];


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


	function primaryAdd() {
		global $con;

		$taskP = $_POST['addPrimaryTask'];

		$checkTask = "SELECT allTask, progressTask, endTask FROM taskowo WHERE (allTask='$taskP' OR progressTask='$taskP' OR endTask='$taskP')";
		$query = mysqli_query($con, $checkTask);

		$arrayP = [];
		foreach ($query as $key) {
			$arrayP = $key;
		}

		if($arrayP['allTask'] != "") {
			$moveToAll = "UPDATE taskowo SET allTaskPrimary='$taskP' WHERE allTask='$taskP'";
			$moveToAllQuery = mysqli_query($con, $moveToAll);

			$deleteOldAll = "UPDATE taskowo SET allTask=NULL WHERE allTask='$taskP'";
			$deleteOldAllQuery = mysqli_query($con, $deleteOldAll);
		}

		else if($arrayP['progressTask'] != "") {
			$moveToPro = "UPDATE taskowo SET progressTaskPrimary='$taskP' WHERE progressTask='$taskP'";
			$moveToProQuery = mysqli_query($con, $moveToPro);

			$deleteOldPro = "UPDATE taskowo SET progressTask=NULL WHERE progressTask='$taskP'";
			$deleteOldProQuery = mysqli_query($con, $deleteOldPro);
		}

		else if($arrayP['endTask'] != "") {
			$moveToEnd = "UPDATE taskowo SET endTaskPrimary='$taskP' WHERE endTask='$taskP'";
			$moveToAllQuery = mysqli_query($con, $moveToEnd);

			$deleteOldEnd = "UPDATE taskowo SET endTask=NULL WHERE endTask='$taskP'";
			$deleteOldEndQuery = mysqli_query($con, $deleteOldEnd);
		}
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


	if(isset($_POST['addPrimaryTask'])) {
		primaryAdd();
	}

?>