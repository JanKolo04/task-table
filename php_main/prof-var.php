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
			//function for allTask
			$sqlAll = "SELECT allTask, allTaskPrimary FROM taskowo WHERE login='$login'";
			$queryAll = mysqli_query($con, $sqlAll);

			//array
			$arrayAll = [""];
			//append to array $row elements from query
			$i=0;
			while ($row = mysqli_fetch_row($queryAll)) {
				foreach($queryAll as $key=>$value) {
					$arrayAll[$i] = $value;
					$i++;
				}
			}



			//array for progressTask
			$sqlPro = "SELECT progressTask, progressTaskPrimary FROM taskowo WHERE login='$login'";
			$queryPro = mysqli_query($con, $sqlPro);

			//array
			$arrayPro = [""];
			//append to array $row elements from query
			$x=0;
			while ($row = mysqli_fetch_row($queryPro)) {
				foreach($queryPro as $key=>$value) {
					$arrayPro[$x] = $value;
					$x++;
				}
			}

			//array for endTask
			$sqlEnd = "SELECT endTask, endTaskPrimary FROM taskowo WHERE login='$login'";
			$queryEnd = mysqli_query($con, $sqlEnd);

			//array
			$arrayEnd = [""];
			//append to array $row elements from query
			$y=0;
			while ($row = mysqli_fetch_row($queryEnd)) {
				foreach($queryEnd as $key=>$value) {
					$arrayEnd[$y] = $value;
					$y++;
				}
			}
		
	
	?>

			<script type="text/javascript">	
				var taskNumber = 0;

				function createTask(taskText, holder, buttonFlag1, buttonFlag2,checkVar, numberHolder) {
					//get tasks div
					const tasksHolder1 = document.getElementById("tasksHolder1");
					const tasksHolder2 = document.getElementById("tasksHolder2");
					const tasksHolder3 = document.getElementById("tasksHolder3");

					const text1 = document.getElementById("all_task_text");
					const text2 = document.getElementById("tasks_in_progress");
					const text3 = document.getElementById("end_tasks");

				  	for (let i=0; i<1; ++i) {
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
					let holderForTextAndFlag = document.createElement("DIV");
					holderForTextAndFlag.id = "holderTask";
					holderForTextAndFlag.className = "holderTask";
					task.appendChild(holderForTextAndFlag);


					//get flag and flagButtonFirst
					let flag = document.createElement("DIV");
					flag.id = "flag";
					flag.className = "flag";
					holderForTextAndFlag.appendChild(flag);
					//append button to flag
					flag.append(buttonFlag1);

					//create text div
					let textDiv = document.createElement("DIV");
					//add class
					textDiv.className = "textDiv";
					textDiv.id = "textDiv";
					holderForTextAndFlag.appendChild(textDiv);

					let p = document.createElement("p");
					p.className = "text";
					//append text from text input to task
					p.innerHTML = taskText;
					textDiv.appendChild(p);

					
				  	//cerate task belt
					let taskBelt = document.createElement("DIV");
					//add class to belt
					taskBelt.className = "taskBelt";
					//append to task
					task.appendChild(taskBelt);


					//button remove div
					let buttonRemoveDiv = document.createElement("DIV");
					//id
					buttonRemoveDiv.id = "buttonRemoveDiv";
					//class name
					buttonRemoveDiv.className = "buttonRemoveDiv";
					//append button remove Div to holder 
					holderForTextAndFlag.appendChild(buttonRemoveDiv);

					//create delete button
					let removeButton = document.createElement("BUTTON");
					//add name into button
					removeButton.innerHTML = "X";
					//id for delete button
					removeButton.id = "removeButton";
					//class name
					removeButton.className = "removeButton";
					//append to div
					buttonRemoveDiv.appendChild(removeButton);

					//back button
					//after click this button task will back to previous holder
					let backButton = document.createElement("BUTTON");
					//id
					backButton.id = "backButton";
					//className
					backButton.className = "backButton";
					//text in button
					backButton.innerHTML = "Back";
					//append to taskBelt
					//I append here this button because this buttin be allways
					taskBelt.appendChild(backButton);

					setInterval(function() {
						if(tasksHolder1.contains(task)) {
							backButton.disabled = true;
							backButton.style = "color:#bfbfbf;";
						}
						else {
							backButton.disabled = false;
							backButton.style = "color:black";
						}
					});

					backButton.addEventListener('click', function() {
						//if task is in progress then back to all
						if(tasksHolder2.contains(task)) {
							//turn on button
							//remove task from progress
							tasksHolder2.removeChild(task);
							//apend task to all
							tasksHolder1.appendChild(task);
							//remove complete button
							taskBelt.removeChild(completeButton);
							//append take button
							taskBelt.appendChild(takeButton);
						}
						//if task is in end then back to progress
						else if(tasksHolder3.contains(task)) {
							//remove task from end
							tasksHolder3.removeChild(task);
							//append task to progress
							tasksHolder2.appendChild(task);
							//remove add complete button
							taskBelt.appendChild(completeButton);
						}

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {taskBack: text},
							success: function() {
								return true;
							}
						});
					});

					//text from task
					const text = p.textContent;

					//inscruction for delete button
					removeButton.addEventListener('click', function() {
						//delete task
						task.remove();

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {remove: text},
							success: function() {
								return true;
							}

						});
					});
			

					//create progress button
					let takeButton = document.createElement("BUTTON");
					//add name into button
					takeButton.innerHTML = "Take";
					//id for progress button
					takeButton.id = "takeButton";
					//class name 
					takeButton.className = "takeButton";

					//Inscruction for take button
					takeButton.addEventListener('click', function() {
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
						});
					});

					//create end task button
					let completeButton = document.createElement("BUTTON");
					//get id for end button
					completeButton.id = "completeButton";
					//class name
					completeButton.className = "completeButton";
					//append text 
					completeButton.innerHTML = "Complete";


					//instruction for complete button
					completeButton.addEventListener('click', function() {
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
						});
					})
					


					if(numberHolder == 1) {
						taskBelt.appendChild(takeButton);
					}
					else if(numberHolder == 2) {
						taskBelt.appendChild(completeButton);
					}


					//variable for use to replace buttons
					let replaceVar1 = buttonFlag1;
					let replaceVar2 = buttonFlag2;

					//if checkVar == 0 buttons won't replace
					if(checkVar == 0) {
						buttonFlag1 = buttonFlag1;
						buttonFlag2 = buttonFlag2;
					}
					//but if checkvar == 1 buttons will replace
					else if(checkVar == 1) {
						buttonFlag1 = replaceVar2;
						buttonFlag2 = replaceVar1;
					}



					//function to replace buttons and run animation
					//for flagButtonFirst
					buttonFlag1.addEventListener('click', function() {
						//remove flagButtonFirst
						flag.removeChild(buttonFlag1);
						//append flagButtonSecond
						flag.appendChild(buttonFlag2);

						//change color and set animation
						buttonFlag2.style = "animation-name: flagButtonSecond;";


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
					buttonFlag2.addEventListener('click', function() {
						flag.removeChild(buttonFlag2);
						flag.appendChild(buttonFlag1);

						buttonFlag1.style = "animation-name: flagButtonFirst;";

						$.ajax ({
							url: "upload-task.php",
							method: "post",
							data: {removePrimaryTask: text},
							success: function() {
								return true;
							}
						})
					});

					//clear text input
					document.getElementById('myText').value = '';

					//this code runs every second 
					setInterval(function(){ 

					  	//all data from all tasks
					  	let allTaskNumber = tasksHolder1.children.length;
					  	text1.innerHTML = "All tasks " + allTaskNumber;
					  	//all data from div progress
					  	let progressTaskNumber = tasksHolder2.children.length;
					  	text2.innerHTML = "Tasks in progress " + progressTaskNumber;
					  	//all data from end task
					  	let endTaskNumber = tasksHolder3.children.length;
					  	text3.innerHTML = "End tasks " + endTaskNumber;

					}, 1);
				}


				//functions to create buttons
				function buttonFlagFirst() {
					//create flagButtonFirst
					const flagButtonFirst = document.createElement("BUTTON");
					//set id for button
					flagButtonFirst.className = 'flagButtonFirst';
					//set className 
					flagButtonFirst.id = 'flagButtonFirst';
					//return button because when i pass this function as argument in createTask func I can use this button in createTask func
					return flagButtonFirst;
				}

				//this function will doing same like previous function
				function buttonFlagSecond() {
					const flagButtonSecond = document.createElement("BUTTON");

					flagButtonSecond.className = "flagButtonSecond";
					flagButtonSecond.id = 'flagButtonSecond';

					return flagButtonSecond;
				}


				//function to tun main function and append tasks to allTask
				function all() {
					//get array from php to js
				    const arrayAll = <?php echo json_encode($arrayAll); ?>;

				    //primary number
				    let numberPrimary = 1;

				    //function for basics tasks
				    //len of array
				    let len = arrayAll.length;
				    //not primary
				    let numberBasic = 0;
				    //holder number
				    let numberHolder = 1;


				    let all = document.getElementById("tasksHolder1");
					for (let i=0; i<len; ++i) {
						if(arrayAll[i]["allTask"] != null) {
						    //variable text is a element from array (text)
						    let textBasic = arrayAll[i]["allTask"];
						    createTask(textBasic, all, buttonFlagFirst(), buttonFlagSecond(), numberBasic, numberHolder);
						}

						else if(arrayAll[i]["allTaskPrimary"] != null) {
						    //variable text is a element from array (text)
						    let textPrimary = arrayAll[i]["allTaskPrimary"];
						    createTask(textPrimary, all, buttonFlagSecond(), buttonFlagFirst(), numberPrimary, numberHolder);
						}
					}
				}

				//function to tun main function and append tasks to proTask
				function pro() {
					//get array from php to js
				    const arrayPro = <?php echo json_encode($arrayPro); ?>;
				    //get array length 
				    let len = arrayPro.length;
				    //not primary task
				    let numberBasic = 0;
				    //holder number
				    let numberHolder = 2;

				    //primary task
				    let numberPrimary = 1;

				    let pro = document.getElementById("tasksHolder2");
					for (let i=0; i<len; ++i) {
						if(arrayPro[i]["progressTask"] != null) {
						    //variable text is a element from array (text)
						    let textBasic = arrayPro[i]["progressTask"];
						    createTask(textBasic, pro, buttonFlagFirst(), buttonFlagSecond(), numberBasic, numberHolder);
						}

						else if(arrayPro[i]["progressTaskPrimary"] != null) {
						    //variable text is a element from array (text)
						    let textPrimary = arrayPro[i]["progressTaskPrimary"];
						    createTask(textPrimary, pro, buttonFlagSecond(), buttonFlagFirst(), numberPrimary, numberHolder);
						}
					}
				}

				//function to tun main function and append tasks to endTask
				function end() {
					//get array from php to js
				    const arrayEnd = <?php echo json_encode($arrayEnd); ?>;
				    //get array length 
				    let len = arrayEnd.length;
				    //not primary task
				    let numberBasic = 0;
				    //primary task
				    let numberPrimary = 1;
				    //holder number
				    let numberHolder = 3;

				    let end = document.getElementById("tasksHolder3");
					for (let i=0; i<len; ++i) {
						if(arrayEnd[i]["endTask"] != null) {
						    //variable text is a element from array (text)
						    let textBasic = arrayEnd[i]["endTask"];
						    createTask(textBasic, end, buttonFlagFirst(), buttonFlagSecond(), numberBasic, numberHolder);
						}

						else if(arrayEnd[i]["endTaskPrimary"] != null) {
						    //variable text is a element from array (text)
						    let textPrimary = arrayEnd[i]["endTaskPrimary"];
						    createTask(textPrimary, end, buttonFlagSecond(), buttonFlagFirst(), numberPrimary, numberHolder);
						}
					}
				}


			window.onload = function() {
				//fucntions
				all();
				pro();
				end();
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





























