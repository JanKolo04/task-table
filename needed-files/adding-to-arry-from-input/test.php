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

	<input type="text" name="input" id="input">
	<button type="submit" name="submit" id="submit" onclick="add()">Submit</button>

	<div id="holder"></div>

	<script type="text/javascript">

		var array = [];
		function add() {
			var input = document.getElementById("input");
			var text = input.value;
			var holder = document.getElementById("holder");

			var div = document.createElement("DIV");
			div.className = "div";
			div.innerHTML = text;
			holder.appendChild(div);

			array.push(text);
			console.log(array);
			input.value = "";
		}
 			

	</script>

</body>
</html>