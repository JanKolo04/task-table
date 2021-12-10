<?php


include("connection.php");
include("login.php");


$doc = new DOMDocument();
$doc->loadHTML($html);

$text = $doc->getElementById('textDiv');
$output = $text->textContent;


if(array_key_exists('add_button', $_POST)) {
	addto();
}
        

function addto() {
	$sql = "INSERT INTO tasks (tasks, progress, endTask) VALUES ('$output', NULL, NULL)";
	$query = mysqli_query($con, $sql);
	echo "Done";
}




?>




