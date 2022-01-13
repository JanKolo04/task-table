<?php
  
$servername = "192.168.101.63";
$username = "olciak_admin";
$password = "Kobie098";
$database = "olciak_tasktable";

//connectiong with database
$con = mysqli_connect($servername, $username, $password, $database);


//checking conection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>