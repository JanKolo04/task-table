<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tasks</title>
	<link rel="stylesheet" type="text/css" href="style-profile.css">
	<script type="text/javascript" src="script-profile.js"></script>
</head>
<body>
	<div class="header">		
		<!---input bar---->
		<input type="text" id="myText" required size="1" placeholder="Task...">
		<!---add button--->
		<button class="add_button" id="add_button" onclick="add_task()">Add</button>
	</div>

	<div class="texts">
	<!---text--->
		<div class="text1">
			<h1 class="all_task_text" id="all_task_text">All tasks: 0</h1>
		</div>

		<div class="text2">
			<h1 class="tasks_in_progress" id="tasks_in_progress">Tasks in progress: 0</h1>
		</div>

		<div class="text3">
			<h1 class="end_tasks" id="end_tasks">End tasks: 0</h1>
		</div>
		
	</div>


	<!---taskt div--->
	<div class="tasks">
		<div id="tasks_all">
			<div id="tasksHolder1"></div>
		</div>

		<div id="progress_task">
			<div id="tasksHolder2"></div>
		</div>

		<div id="task_end">
			<div id="tasksHolder3"></div>
		</div>
	</div>


</body>
</html>