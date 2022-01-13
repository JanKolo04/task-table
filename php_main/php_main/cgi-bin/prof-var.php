<!DOCTYPE html>
<html>

<body>

	<?php
		include("connection.php");

		function profileFunction() {
			global $con, $login;

			//get all elements from allTask column where login is LOGIN USER
			$sqlAll = "SELECT allTask FROM taskowo WHERE login='$login'";
			$queryAll = mysqli_query($con, $sqlAll);

			//array
			$arrayAll;
			//append to array $row elements from query
			while ($row = mysqli_fetch_row($queryAll)) {
				//get elements from array
				$convert = implode($row);
				//and append to arrayAll
				$arrayAll[] = $convert;
			}

			$sqlPro = "SELECT progressTask FROM taskowo WHERE login='$login'";
			$queryPro = mysqli_query($con, $sqlPro);

			$arrayPro;
			while ($row = mysqli_fetch_row($queryPro)) {
				$convert = implode($row);
				$arrayPro[] = $convert;
			}

			$sqlEnd = "SELECT endTask FROM taskowo WHERE login='$login'";
			$queryEnd = mysqli_query($con, $sqlEnd);

			$arrayEnd;
			while ($row = mysqli_fetch_row($queryEnd)) {
				$convert = implode($row);
				$arrayEnd[] = $convert;
			}
		
			
	
	?>

			<script type="text/javascript">	
				var taskNumber = 0;

				function createTask(taskText, holder) {

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

					//create text div
					var textDiv = document.createElement("DIV");
					task.appendChild(textDiv);
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
						    var arrayAll = <?php echo json_encode($arrayAll); ?>;
						    //get array length 
						    var length = arrayAll.length;

						    var all = document.getElementById("tasksHolder1");
							for (var i=0; i<length; ++i) {
								if (arrayAll[i] != '') {
								    //variable text is a element from array (text)
								    var text = arrayAll[i];
								    createTask(text, all);
								}
							}
						}


						function pro() {
							//get array from php to js
						    var arrayPro = <?php echo json_encode($arrayPro); ?>;
						    //get array length 
						    var length = arrayPro.length;

						    var pro = document.getElementById("tasksHolder2");
							for (var i=0; i<length; ++i) {
								if (arrayPro[i] != '') {
								    //variable text is a element from array (text)
								    var text = arrayPro[i];
								    createTask(text, pro);

								}
							}
						}


						function end() {
							//get array from php to js
						    var arrayEnd = <?php echo json_encode($arrayEnd); ?>;
						    //get array length 
						    var length = arrayEnd.length;

						    var end = document.getElementById("tasksHolder3");
							for (var i=0; i<length; ++i) {
								if (arrayEnd[i] != '') {
								    //variable text is a element from array (text)
								    var text = arrayEnd[i];
								    createTask(text, end);

								}
							}
						}

					window.onload = function() {
						all();
						pro();
						end();
					}


			</script>


	<?php
		

		echo  "
			<script>
				disableAdd();
				disableProgressTask();
				disableCompleteTask();
			</script>

			<div class='baner'>
				<div class='textBaner'>
					<h1 id='banerText'>TASK BOARD</h1>
				</div>

				<div class='linkBaner'>
					<form action="login.php" method="POST">
						<input type="submit" name="logout" id="logoutLink" value="Logout">
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
			</div>
			";
		
		}
	?>

</body>
</html>






























