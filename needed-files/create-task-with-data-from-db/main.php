<?php

session_start();

include("../connection.php");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pobieranie z db</title>
</head>
<body>

	<div id="all">
		<h1 style="color: white">All</h1>
	</div>
	<div id="pro">
		<h1 style="color: white">Pro</h1>
	</div>
	<div id="end">
		<h1 style="color: white">End</h1>
	</div>

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

<script type="text/javascript">	
	function all() {
		//get array from php to js
	    var arrayAll = <?php echo json_encode($arrayAll); ?>;
	    //get array length 
	    var length = arrayAll.length;

	    var all = document.getElementById("all");
		for (var i=0; i<length; ++i) {
			if (arrayAll[i] != '') {

			    //create div in for beacouse he create
			    //as meany times as the for loop ca execute
			    var task = document.createElement("DIV");
			    task.className = "task";

			   	var p = document.createElement("p");
			    p.className = "textP";

			    //variable x is a element from array
			    var x = arrayAll[i];
			    //append element to p
			    p.innerHTML = x;

			    //append task to all
			    all.appendChild(task);
			    //append p to task
			    task.appendChild(p);

			}
		}
	}


	function pro() {
		//get array from php to js
	    var arrayPro = <?php echo json_encode($arrayPro); ?>;
	    //get array length 
	    var length = arrayPro.length;

	    var pro = document.getElementById("pro");
		for (var i=0; i<length; ++i) {
			if (arrayPro[i] != '') {

			    //create div in for beacouse he create
			    //as meany times as the for loop ca execute
			    var task = document.createElement("DIV");
			    task.className = "task";

			    var p = document.createElement("p");
			    p.className = "textP";

			    //variable x is a element from array
			    var x = arrayPro[i];
			    //append element to p
			    p.innerHTML = x;

			    //append task to pro
			    pro.appendChild(task);
			    //append p to task
			    task.appendChild(p);

			}
		}
	}


	function end() {
		//get array from php to js
	    var arrayEnd = <?php echo json_encode($arrayEnd); ?>;
	    //get array length 
	    var length = arrayEnd.length;

	    var end = document.getElementById("end");
		for (var i=0; i<length; ++i) {
			if (arrayEnd[i] != '') {

			    //create div in for beacouse he create
			    //as meany times as the for loop ca execute
			    var task = document.createElement("DIV");
			    task.className = "task";

			    var p = document.createElement("p");
			    p.className = "textP";

			    //variable x is a element from array
			    var x = arrayEnd[i];
			    //append element to p
			    p.innerHTML = x;

			    //append task to end
			    end.appendChild(task);
			   	//append p to task
			    task.appendChild(p);

			}
		}
	}

	window.onload = function() {
		all();
		pro();
		end();
	}


</script>

<style type="text/css">
	#all {
		position: absolute;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: 150px;
		background-color: blue;
	}

	#pro {
		position: absolute;
		left: 180px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: 150px;
		background-color: green;
	}

	#end {
		position: absolute;
		left: 360px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: 150px;
		background-color: hotpink;
	}


	.task {
		margin: 10px;
		width: 100px; 
		height: 80px; 
		background-color: red; 
		text-align: center;
	}

</style>


</body>
</html>

