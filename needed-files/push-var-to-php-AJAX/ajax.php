<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Testy</title>
</head>
<body>

	<script type="text/javascript">
		var text = "siema";
		console.log(text);

		$.ajax({
			url: "sql.php",
			method: "post",
			data: {text: text},
			success: function() {
				return true;
			}
		})
	</script>

</body>
</html>