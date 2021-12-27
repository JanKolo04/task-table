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
		
		function create() {
			var input = document.getElementById("input");
			var value = input.value;
			var all = document.getElementById("all");

			var task = document.createElement("DIV");
			task.className = "task";
			all.appendChild(task);


			var p = document.createElement("p");
			p.className = "text";
			p.innerHTML = value;
			task.appendChild(p);


			//create delete button
			var removeButton = document.createElement("BUTTON");
			//add name into button
			removeButton.innerHTML = "Remove";
			//id for delete button
			removeButton.id = "removeButton";
			//class name
			removeButton.className = "removeButton";

			//append delete button to taskBelt
			task.appendChild(removeButton);


			//create progress button
			var takeButton = document.createElement("BUTTON");
			//add name into button
			takeButton.innerHTML = "Take";
			//id for progress button
			//class name 
			takeButton.className = "takeButton";

			//append button to taskBelt
			task.appendChild(takeButton);

			var text = p.textContent;
			$.ajax({
				url: "index.php",
				method: "post",
				data: {all: text},
				success: function(res) {
					console.log(res);
				}
			})


			var comButton = document.createElement("BUTTON");
			comButton.className = "completeButton";
			comButton.innerHTML = "Complete";


			input.value = "";
			takeButton.onclick = function() {
				takeButton.remove();
				task.appendChild(comButton);

				var pro = document.getElementById("progress");
				pro.appendChild(task);

				$.ajax({
					url: "index.php",
					method: "post",
					//pro mozemy nazwac inaczej bo to nazwa do
					//znalezienia przez POST
					data: {pro: text},
					success: function(res) {
						console.log(res);
					}
				})
			}


		}


	</script>	

	<input type="text" name="input" id="input">
	<button onclick="create()">Create</button>

	<div id="all"></div>
	<div id="progress"></div>
	<div id="end"></div>




	<style type="text/css">
		.task {
			margin: 20px;
			width: 120px;
			height: 60px;
			background-color: blue;
		}
		.text {
			text-align: center;
			margin: 0px;
		}

	</style>

</body>
</html>