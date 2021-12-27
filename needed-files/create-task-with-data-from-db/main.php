<?php

session_start();

include("connection.php");

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



?>

<script type="text/javascript">	
	function all() {
		//get array from php to js
	    var arrayAll = <?php echo json_encode($arrayAll); ?>;
	    //get array length 
	    var length = arrayAll.length;

	    //div all
	    var all = document.getElementById("all");
	  	//for loop to get all elemetns from array
		for (var i=0; i<length; ++i) {
			//create task when have some text
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


	//run functions
	window.onload = function() {
		all();
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

