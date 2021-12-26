<?php
  
$servername = "localhost";
$username = "root";
$password = "";
$database = "tasktable";

//connectiong with database
$con = mysqli_connect($servername, $username, $password, $database);


//checking conection
if (!$con) {
  die("Connection failed: " . mysql_connect_error());
}

?>