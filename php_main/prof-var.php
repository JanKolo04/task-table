<?php

	include("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/t.png">
	<script type="text/javascript" src="script-profile.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style-profile.css">
</head>
<body>

	<?php


		$profilePage = <<<HTML

			<script>
				disableAdd();
				disableTab();
				disableTab2();
			</script>

			<div class='baner'>
				<div class='textBaner'>
					<h1 id='banerText'>TASK BOARD</h1>
				</div>

				<div class='linkBaner'>
					<a href='logout.php' id='logoutLink'>Logout</a>
				</div>
			</div>


			<div class='header'>		
				<!---input text---->
				<div class='inputDiv'>
					<input type='text' id='myText' required size='1' placeholder='Task...'>
				</div>

				<!---add button--->
				<div class='buttonDiv'>
					<button class='add_button' id='add_button' onclick='add_task()'>Add</button>
				</div>
			</div>

			<div id='divHolder'>

				<div class='texts'>
				<!---text--->
					<div class='text1'>
						<h1 class='all_task_text' id='all_task_text'>All tasks 0</h1>
					</div>

					<div class='text2'>
						<h1 class='tasks_in_progress' id='tasks_in_progress'>Tasks in progress 0</h1>
					</div>

					<div class='text3'>
						<h1 class='end_tasks' id='end_tasks'>End tasks 0</h1>
					</div>
					
				</div>


				<!---taskt div--->
				<div class='tasks'>
					<div id='tasks_all'>
						<div id='tasksHolder1'></div>
					</div>

					<div id='progress_task'>
						<div id='tasksHolder2'></div>
					</div>

					<div id='task_end'>
						<div id='tasksHolder3'></div>
					</div>
				</div>
			</div>
			HTML;

	?>



</body>
</html>






























