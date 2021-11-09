<?php

session_start();

include("connection.php");

$doc = new DomDocument();
$doc->loadHTMLFile('main.html');
$thediv = $doc->getElementById('div1');
$text = $thediv->textContent;


$sql = "INSERT INTO test (nazwa) VALUES ('$text')";



if (session_status() == PHP_SESSION_ACTIVE) {
	echo "Session start";
}


session_destroy();
$query = mysqli_query($con, $sql);


?>
