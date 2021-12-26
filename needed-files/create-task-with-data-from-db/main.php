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
<?php

	$html = <<<HTML
		<div id="holder">
			
		</div>


	HTML;

	echo $html;

	
	$sql = "SELECT tasks FROM tasks";
	$query = mysqli_query($con, $sql);


	$array;
	while ($row = mysqli_fetch_row($query)) {
		$convert = implode($row);
		$array[] = $convert;
	}

	print_r($array);



	/*
	//download data if session start
	if (session_status() == PHP_SESSION_ACTIVE) {
		echo "Session start";
		adding();
	}
	*/

?>

<script type="text/javascript">	
	function funkcja() {
		//get array from php to js
	    var tablica = <?php echo json_encode($array); ?>;
	    //get array length 
	    var length = tablica.length;
	    console.log(length);

	    var holder = document.getElementById("holder");


	    for (var i=0; i<length; ++i) {
	    	//create div in for beacouse he create
	    	//as meany times as the for loop ca execute
	    	var div = document.createElement("DIV");
	    	div.className = "div";

	    	var p = document.createElement("p");
	    	p.className = "textP";

	    	//variable x is a element from array
	    	var x = tablica[i];
	    	//append element to p
	    	p.innerHTML = x;

	    	//append div(task) to holder
	    	holder.appendChild(div);
	    	//append p to div(task)
	    	div.appendChild(p);

	    }

	}

	funkcja();
</script>

<style type="text/css">
	.div {
		width: 100px; 
		height: 80px; 
		background-color: red; 
		text-align: center;
	}

</style>


</body>
</html>

