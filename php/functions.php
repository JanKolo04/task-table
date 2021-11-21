<?php

session_start();

include("connection.php");



if (session_status() == PHP_SESSION_ACTIVE) {
	echo "Session start";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>


<?php
$html = <<<HTML
	<form method="POST">	
		<div id="holder">
			<div id="div1" style="width: 100px; height: 80px; background-color: red; text-align: center;">
				<p class="textP">Na przycisk1</p>
			</div>

			<div id="div2" style="width: 100px; height: 80px; background-color: red; text-align: center;">
				<p class="textP">Na przycisk2</p>
			</div>

			<div id="div3" style="width: 100px; height: 80px; background-color: red; text-align: center;">
				<p class="textP">Na przycisk3</p>
			</div>

			<div id="div4" style="width: 100px; height: 80px; background-color: red; text-align: center;">
				<p class="textP">Na przycisk4</p>
			</div>
		</div>

		<input type="submit" id="input1" name="input1" value="Click me!">
	</form>
HTML;
echo $html;

if(array_key_exists('input1', $_POST)) {
	adding();

}


function adding() {
	global $con;
	global $html;
    $classname = "textP";
    $domdocument = new DOMDocument();
    $domdocument->loadHTML($html);
    $a = new DOMXPath($domdocument);
    $spans = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

    for ($i = $spans->length - 1; $i > -1; $i--) {
        $result[] = $spans->item($i)->firstChild->nodeValue;  
    }

    echo "<pre>";
    print_r($result);



  	$len = count($result);

    for($y=$len-1; $y>=0; $y--){
      	echo $result[$y]."<br>";
	    $sql = "INSERT INTO tasks (tasks, progress, endTask) VALUES ('$result[$y]', NULL, NULL)";
		$query = mysqli_query($con, $sql);
    }
}


	/*
	    $sql = "INSERT INTO tasks (tasks, progress, endTask) VALUES ('$result[$y]', NULL, NULL)";
		$query = mysqli_query($con, $sql);
	*/

?>
</body>
</html>






