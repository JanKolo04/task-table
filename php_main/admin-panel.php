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
</head>
<body>

	<form method="POST">
		<input type="text" name="pole">
		<button type="submit" name="submit">Click</button>
	</form>


<?php

$komenda = $_POST['pole'];

$query = mysqli_query($con, $komenda);

foreach ($query as $row) {
	echo "<pre>";
	print_r($row);
}

?>


</body>
</html>