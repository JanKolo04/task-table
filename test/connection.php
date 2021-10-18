<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "tasktable";

    $mysqli = new mysqli($host, $user, $password, $db_name);

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
?>