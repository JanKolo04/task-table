<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="script-profile.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style-profile.css">
</head>
<body>

	<?php
		include("connection.php");

		function profileFunction($login) {
			global $con;

			if(empty($login)) {
				$login = $_COOKIE['login'];
			}

			//get all elements from allTask column where login is LOGIN USER
			$sqlAll = "SELECT allTask FROM taskowo WHERE login='$login'";
			$queryAll = mysqli_query($con, $sqlAll);

			//array
			$arrayAll = [""];
			//append to array $row elements from query
			while ($row = mysqli_fetch_row($queryAll)) {
				//get elements from array
				$convert = implode($row);
				//and append to arrayAll
				$arrayAll[] = $convert;
			}

			//array for progressTask
			$sqlPro = "SELECT progressTask FROM taskowo WHERE login='$login'";
			$queryPro = mysqli_query($con, $sqlPro);

			$arrayPro = [""];
			while ($row = mysqli_fetch_row($queryPro)) {
				$convert = implode($row);
				$arrayPro[] = $convert;
			}

			//array for endTask
			$sqlEnd = "SELECT endTask FROM taskowo WHERE login='$login'";
			$queryEnd = mysqli_query($con, $sqlEnd);

			$arrayEnd = [""];
			while ($row = mysqli_fetch_row($queryEnd)) {
				$convert = implode($row);
				$arrayEnd[] = $convert;
			}

			//array for allTasksPrimary
			$sqlAllPrimary = "SELECT allTaskPrimary FROM taskowo WHERE login='$login'";
			$queryAllPrimary = mysqli_query($con, $sqlAllPrimary);

			$arrayAllPrimary = [""];
			while ($row = mysqli_fetch_row($queryAllPrimary)) {
				$convert = implode($row);
				$arrayAllPrimary[] = $convert;
			}

		
	
	?>

			<script type="text/javascript">	
				var taskNumber = 0;

				//create flagButtonFirst
				const flagButtonFirst = document.createElement("BUTTON");
				flagButtonFirst.className = 'flagButtonFirst';
				flagButtonFirst.id = 'flagButtonFirst';

				//create second button
				const flagButtonSecond = document.createElement("BUTTON");
				flagButtonSecond.className = "flagButtonSecond";
				flagButtonSecond.id = 'flagButtonSecond';


				function createTask(taskText, holder, buttonFlag) {
					//get tasks div
					var tasksHolder1 = document.getElementById("tasksHolder1");
					var tasksHolder2 = document.getElementById("tasksHolder2");
					var tasksHolder3 = document.getElementById("tasksHolder3");

					var text1 = document.getElementById("all_task_text");
					var text2 = document.getElementById("tasks_in_progress");
					var text3 = document.getElementById("end_tasks");

				  	for (var i=0; i<1; ++i) {
					 	//create new div
					  	var task = document.createElement("DIV");

					  	if (taskNumber == 0)
					  	{
					  		//id name
					  		task.id = "task" + taskNumber;
					  		taskNumber = taskNumber + 1;
					  	}
					  	else
					  	{
					  		task.id = "task" + taskNumber;
					  		taskNumber = taskNumber + 1;
					  	}

					  	//append task to all tasks
					  	holder.appendChild(task);

					}

					//add class to task
					task.className = "taskBody";

					//create holder in task
					const holderForTextAndFlag = document.createElement("DIV");
					holderForTextAndFlag.id = "holderTask";
					holderForTextAndFlag.className = "holderTask";
					task.appendChild(holderForTextAndFlag);
					

					//create text div
					var textDiv = document.createElement("DIV");
					holderForTextAndFlag.appendChild(textDiv);
					//add class to span
					textDiv.className = "textDiv";
					textDiv.id = "textDiv";

					var p = document.createElement("p");
					p.className = "text";
					textDiv.appendChild(p);

					//append text from text input to task
					p.innerHTML = taskText;

					
				  	//cerate task belt
					var taskBelt = document.createElement("DIV");
					//add class to belt
					taskBelt.className = "taskBelt";

					//append to task
					task.appendChild(taskBelt);


					//create delete button
					var removeButton = document.createElement("BUTTON");
					//add name into button
					removeButton.innerHTML = "Remove";
					//id for delete button
					removeButton.id = "removeButton";
					//class name
					removeButton.className = "removeButton";

					//append delete button to taskBelt
					taskBelt.appendChild(removeButton);


					//create progress button
					var takeButton = document.createElement("BUTTON");
					//add name into button
					takeButton.innerHTML = "Take";
					//id for progress button
					takeButton.id = "takeButton";
					//class name 
					takeButton.className = "takeButton";

					//append button to taskBelt
					taskBelt.appendChild(takeButton);


					//get flag and flagButtonFirst
					const flag = document.createElement("DIV");
					flag.id = "flag";
					flag.className = "flag";
					holderForTextAndFlag.appendChild(flag);

					//append button 
					flag.appendChild(buttonFlag);


				  	//clear text input
					document.getElementById('myText').value = '';


					//create end task button
					var completeButton = document.createElement("BUTTON");
					//get id for end button
					completeButton.id = "completeButton";
					//class name
					completeButton.className = "completeButton";
					//append text 
					completeButton.innerHTML = "Complete";


					var text = p.textContent;
					//Inscruction for take button
					takeButton.onclick = function() {
						//remove take button from task belt
						takeButton.remove();
						//append end button to task belt
						taskBelt.appendChild(completeButton);
						//remove task from all
						tasksHolder1.removeChild(task);
						//append task to progress
						tasksHolder2.appendChild(task);

						$.ajax({
							url: "upload-task.php",
							method: "post",
							//pro mozemy nazwac inaczej bo to nazwa do
							//znalezienia przez POST
							data: {pro: text},
							success: function() {
								return true;
							}
						})
					}


					//instruction for complete button
					completeButton.onclick = function() {
						//remove end complete button from task belt
						completeButton.remove();
						//remove task from progress
						tasksHolder2.removeChild(task);
						//append task to end task
						tasksHolder3.appendChild(task);

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {end: text},
							success: function() {
								return true;
							}
						})
					}



					//inscruction for delete button
					removeButton.onclick = function() {
						//delete task
						task.remove();

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {remove: text},
							success: function() {
								return true;
							}

						})
					}



					//function to replace buttons and run animation
					//for flagButtonFirst
					flagButtonFirst.addEventListener('click', function() {
						//remove flagButtonFirst
						flag.removeChild(flagButtonFirst);
						//append flagButtonSecond
						flag.appendChild(flagButtonSecond);

						//change color and set animation
						flagButtonSecond.style = "background-color: #FC0; animation-name: flagButtonSecond;";

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {addPrimaryTask: text},
							success: function() {
								return true;
							}

						})
					});

					//exactly same like in previous function but after 
					//flagButtonSecond click
					flagButtonSecond.addEventListener('click', function() {
						flag.removeChild(flagButtonSecond);
						flag.appendChild(flagButtonFirst);

						flagButtonFirst.style = "background-color: #e6e6e6; animation-name: flagButtonFirst;";

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {removePrimaryTask: text},
							success: function() {
								return true;
							}

						})
					});

					//this code runs every second 
					setInterval(function(){ 

					  	//all data from all tasks
					  	var allTaskNumber = tasksHolder1.children.length;
					  	text1.innerHTML = "All tasks " + allTaskNumber;
					  	//all data from div progress
					  	var progressTaskNumber = tasksHolder2.children.length;
					  	text2.innerHTML = "Tasks in progress " + progressTaskNumber;
					  	//all data from end task
					  	var endTaskNumber = tasksHolder3.children.length;
					  	text3.innerHTML = "End tasks " + endTaskNumber;

					}, 1);
				}


				function all() {
					//get array from php to js
				    let arrayAll = <?php echo json_encode($arrayAll); ?>;

				    //get array length 
				    let length = arrayAll.length;

				    let all = document.getElementById("tasksHolder1");
					for (let i=0; i<length; ++i) {
						if (arrayAll[i] != '') {
						    //letiable text is a element from array (text)
						    let text = arrayAll[i];
						    createTask(text, all, flagButtonFirst);
						}
					}
				}


				function pro() {
					//get array from php to js
				    let arrayPro = <?php echo json_encode($arrayPro); ?>;
				    //get array length 
				    let length = arrayPro.length;

				    let pro = document.getElementById("tasksHolder2");
					for (let i=0; i<length; ++i) {
						if (arrayPro[i] != '') {
						    //variable text is a element from array (text)
						    let text = arrayPro[i];
						    createTask(text, pro, flagButtonFirst);

						}
					}
				}


				function end() {
					//get array from php to js
				    let arrayEnd = <?php echo json_encode($arrayEnd); ?>;
				    //get array length 
				    let length = arrayEnd.length;

				    let end = document.getElementById("tasksHolder3");
					for (let i=0; i<length; ++i) {
						if (arrayEnd[i] != '') {
						    //variable text is a element from array (text)
						    let text = arrayEnd[i];
						    createTask(text, end, flagButtonFirst);

						}
					}
				}


				//PRIMARY FUNCTIONS 
				function allPrimary() {

					//get array from php to js
				    let arrayAllPrimary = <?php echo json_encode($arrayAllPrimary); ?>;
				    //get array length 
				    let length = arrayAllPrimary.length;

				    let all = document.getElementById("tasksHolder1");
					for (let i=0; i<length; ++i) {
						if (arrayAllPrimary[i] != '') {
						    //variable text is a element from array (text)
						    let text = arrayAllPrimary[i];
						    createTask(text, all, flagButtonSecond);

						}
					}
				}

			window.onload = function() {
				//basic functions
				//primary functions
				allPrimary();
			}


			</script>


	<?php

		echo "
			<script>
				disableAdd();
				disableProgressTask();
				disableCompleteTask();
			</script>

			<div class='baner'>
				<div class='textBaner'>
					<h1 id='banerText'>TASK BOARD</h1>
				</div>

				<div class='d-flex justify-content-end align-items-center' id='linkBaner'>
					<form action='login' method='POST'>
						<input type='submit' name='logout' id='logoutLink' value='Logout'>
					</form>
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
			</div>";
		
		}
	?>

</body>
</html>





























