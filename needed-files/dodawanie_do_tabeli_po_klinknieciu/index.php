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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
</head>
<body>
<?php
$html =  <<<HTML
<form method="POST">
	<div id="div1" style="width: 100px; height: 80px; background-color: red; text-align: center;">
		<p id="text1">Siema</p>
		<input type="submit" id="input1" name="input1" value="Click me!">
	</div>


	<div id="div2" style="width: 100px; height: 80px; background-color: green; text-align: center;">
		<p id="text2">Div2</p>
		<input type="submit" id="input2" name="input2" value="Click me!">
	</div>


	<div id="div3" style="width: 100px; height: 80px; background-color: blue; text-align: center;">
		<p id="text3">Div3</p>
		<input type="submit" id="input3" name="input3" value="Click me!">
	</div>
</form>
HTML;

echo $html;

?>

</body>
</html>



<?php
$doc = new DOMDocument();
$doc->loadHTML($html);

$text = $doc->getElementById('text1');
$output = $text->textContent;


if(array_key_exists('input1', $_POST)) {
	adding();

}
        


function adding() {
	global $output;
	global $con;
	$sql = "INSERT INTO tasks (login) VALUES ('$output')";
	$query = mysqli_query($con, $sql);
	echo "Done";
}



?>




