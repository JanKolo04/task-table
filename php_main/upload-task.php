<?php

	include("connection.php");

	$login = $_COOKIE['cookieTask'];


	function all() {
		global $con, $login;

		$all = $_POST['all'];

		$sql = "INSERT INTO taskowo(login, allTask, progressTask, endTask) VALUES
			('$login', '$all', NULL, NULL)";
		$query = mysqli_query($con, $sql);
	}


	function pro() {
		global $con;

		//variables
		$proPrimary = $_POST['pro'];
		$pro = $_POST['pro'];

		//standrat update
		$sql = "UPDATE taskowo SET progressTask='$pro' WHERE allTask='$pro'";
		$query = mysqli_query($con, $sql);

		$deleteSql = "UPDATE taskowo SET allTask=NULL WHERE allTask='$pro'";
		$deleteQuery = mysqli_query($con, $deleteSql);

		//functions for primary update
		$sqlPrimary = "UPDATE taskowo SET progressTaskPrimary='$pro' WHERE allTaskPrimary='$pro'";
		$queryPrimary = mysqli_query($con, $sqlPrimary);

		$deleteSqlPrimary = "UPDATE taskowo SET allTaskPrimary=NULL WHERE allTaskPrimary='$pro'";
		$deleteQueryPriimary = mysqli_query($con, $deleteSqlPrimary);

	}

	function endd() {
		global $con;

		//variables
		$endPrimary = $_POST['end'];
		$end = $_POST['end'];

		//standart update
		$sql = "UPDATE taskowo SET endTask='$end' WHERE progressTask='$end'";
		$query = mysqli_query($con, $sql);

		$deleteSql = "UPDATE taskowo SET progressTask=NULL WHERE progressTask='$end'";
		$deleteQuery = mysqli_query($con, $deleteSql);

		//functions for primary update
		$sqlPrimary = "UPDATE taskowo SET endTaskPrimary='$end' WHERE progressTaskPrimary='$end'";
		$queryPrimary = mysqli_query($con, $sqlPrimary);

		$deleteSqlPrimary = "UPDATE taskowo SET progressTaskPrimary=NULL WHERE progressTaskPrimary='$end'";
		$deleteQueryPriimary = mysqli_query($con, $deleteSqlPrimary);
	}


	function remove() {
		global $con;

		$remove = $_POST['remove'];

		$sql = "DELETE FROM taskowo WHERE (allTask='$remove' OR progressTask='$remove' OR endTask='$remove' OR allTaskPrimary='$remove' OR progressTaskPrimary='$remove' OR endTaskPrimary='$remove')";

		$query = mysqli_query($con, $sql);
	}

	//function to add task to primary
	function primaryAdd() {
		global $con;
		//get text from task
		$taskP = $_POST['addPrimaryTask'];
		//check in wich holder is 
		$checkTask = "SELECT allTask, progressTask, endTask FROM taskowo WHERE (allTask='$taskP' OR progressTask='$taskP' OR endTask='$taskP')";
		$query = mysqli_query($con, $checkTask);
		//move to array results from query
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



	function primaryRemove() {
		global $con;

		$taskP = $_POST['removePrimaryTask'];

		$checkTask = "SELECT allTaskPrimary, progressTaskPrimary, endTaskPrimary FROM taskowo WHERE (allTaskPrimary='$taskP' OR progressTaskPrimary='$taskP' OR endTaskPrimary='$taskP')";
		$query = mysqli_query($con, $checkTask);

		$arrayP = [];
		foreach ($query as $key) {
			$arrayP = $key;
		}

		if($arrayP['allTaskPrimary'] != "") {
			$moveToAll = "UPDATE taskowo SET allTask='$taskP' WHERE allTaskPrimary='$taskP'";
			$moveToAllQuery = mysqli_query($con, $moveToAll);

			$deleteOldAll = "UPDATE taskowo SET allTaskPrimary=NULL WHERE allTaskPrimary='$taskP'";
			$deleteOldAllQuery = mysqli_query($con, $deleteOldAll);
		}

		else if($arrayP['progressTaskPrimary'] != "") {
			$moveToPro = "UPDATE taskowo SET progressTask='$taskP' WHERE progressTaskPrimary='$taskP'";
			$moveToProQuery = mysqli_query($con, $moveToPro);

			$deleteOldPro = "UPDATE taskowo SET progressTaskPrimary=NULL WHERE progressTaskPrimary='$taskP'";
			$deleteOldProQuery = mysqli_query($con, $deleteOldPro);
		}

		else if($arrayP['endTaskPrimary'] != "") {
			$moveToEnd = "UPDATE taskowo SET endTask='$taskP' WHERE endTaskPrimary='$taskP'";
			$moveToAllQuery = mysqli_query($con, $moveToEnd);

			$deleteOldEnd = "UPDATE taskowo SET endTaskPrimary=NULL WHERE endTaskPrimary='$taskP'";
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

	if(isset($_POST['removePrimaryTask'])) {
		primaryRemove();
	}

?>