<?php

include("../connection.php");

session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
	echo "Session has started";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form method="POST">
		<input type="text" name="pole">
		<button type="submit" name="submit">Click</button>
	</form>


<?php

//get keys form array

if(array_key_exists('submit', $_POST)) {
	printTable();
}

function printTable() {
	global $con;

	$komenda = $_POST['pole'];
	$query = mysqli_query($con, $komenda);

	echo("<table border='1'>");
	$first_row = true;

	while ($row = mysqli_fetch_assoc($query)) {
		if ($first_row) {
			$first_row = false;


			// Output header row from keys.
			
			echo '<tr>';
			foreach ($row as $key => $field) {
				echo '<th class="head">' . htmlspecialchars($key) . '</th>'; 
			}

			echo '</tr>';
		}

		echo '<tr>';
		foreach($row as $key => $field) {
			echo '<td class="id">' . htmlspecialchars($field) . '</td>';
		}

		echo '</tr>';
	}
	echo("</table>");

}
?>


</body>
</html>





