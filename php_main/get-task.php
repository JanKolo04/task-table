<?php

	//get all elements from allTask column where login is LOGIN USER
	$sqlAll = "SELECT allTask FROM test WHERE login='admin'";
	$queryAll = mysqli_query($con, $sqlAll);

	//array
	$arrayAll;
	//append to array $row elements from query
	while ($row = mysqli_fetch_row($queryAll)) {
		//get elements from array
		$convert = implode($row);
		//and append to arrayAll
		$arrayAll[] = $convert;
	}


	$sqlPro = "SELECT proTask FROM test WHERE login='admin'";
	$queryPro = mysqli_query($con, $sqlPro);

	$arrayPro;
	while ($row = mysqli_fetch_row($queryPro)) {
		$convert = implode($row);
		$arrayPro[] = $convert;
	}


	$sqlEnd = "SELECT endTask FROM test WHERE login='admin'";
	$queryEnd = mysqli_query($con, $sqlEnd);

	$arrayEnd;
	while ($row = mysqli_fetch_row($queryEnd)) {
		$convert = implode($row);
		$arrayEnd[] = $convert;
	}

?>