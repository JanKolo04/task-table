var taskNumber = 0;

function add_task() {

	//get tasks div
	var tasks_div = document.getElementById("tasks_all");
	var tasks_progress = document.getElementById("progress_task");
	var tasks_end = document.getElementById("task_end");


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
	  	tasksHolder1.appendChild(task);

	}

	//add class to task
	task.className = "taskClass";

	//create text div
	var textDiv = document.createElement("DIV");
	task.appendChild(textDiv);
	//add class to span
	textDiv.className = "textDiv";

	//append text from text input to task
	textDiv.innerHTML = document.querySelector('#myText').value;

	
  	//cerate task belt
	var taskBelt = document.createElement("DIV");
	//add class to belt
	taskBelt.className = "taskBelt";

	//append to task
	task.appendChild(taskBelt);


	//create delete button
	var deleteButton = document.createElement("BUTTON");
	//add name into button
	deleteButton.innerHTML = "Remove";
	//id for delete button
	deleteButton.id = "deleteButton";

	//append delete button to taskBelt
	taskBelt.appendChild(deleteButton);


	//create progress button
	var progressButton = document.createElement("BUTTON");
	//add name into button
	progressButton.innerHTML = "Take";
	//id for progress button
	progressButton.id = "progressButton";

	//append button to taskBelt
	taskBelt.appendChild(progressButton);


  	//clear text input
	document.getElementById('myText').value = '';


	//create end task button
	var endButton = document.createElement("BUTTON");
	//get id for end button
	endButton.id = "endButton";
	//append text 
	endButton.innerHTML = "Complete";


	//Inscruction for progress button
	progressButton.onclick = function() {
		//add class to task
		task.className = "taskClass"; 
		//append end button
		taskBelt.appendChild(endButton);
		//append task to progress
		tasksHolder2.appendChild(task);
		//remove task from all
		tasksHolder1.removeChild(task);
	}


	//instruction for end button
	endButton.onclick = function() {
		//add class to task
		task.className = "taskClass"; 
		//append task to end task
		tasksHolder3.appendChild(task);
		//remove task from progress
		tasksHolder2.removeChild(task);
	}



	//inscruction for delete button
	deleteButton.onclick = function() {
		//delete task
		task.remove();
	}



	//this code runs every second 
	setInterval(function(){ 

	  	//all data from all tasks
	  	var allTaskNumber = tasksHolder1.children.length;
	  	text1.innerHTML = "All tasks: " + allTaskNumber;
	  	//all data from div progress
	  	var progressTaskNumber = tasksHolder2.children.length;
	  	text2.innerHTML = "Tasks in progress: " + progressTaskNumber;
	  	//all data from end task
	  	var endTaskNumber = tasksHolder3.children.length;
	  	text3.innerHTML = "End tasks: " + endTaskNumber;


		//disable add button
		var addButton = document.getElementById("add_button");
		//if task count is == 14 button has been disable
		if (allTaskNumber == 10) {
			//disable
			addButton.disabled = true;
		}

		//chech if task is in progress div
		if (tasksHolder2.contains(task)) {
			//remove progress button
			progressButton.remove();
		} 

		//check if task is in end div
		if (tasksHolder3.contains(task)) {
			//remove end button
			endButton.remove();
		}

	}, 1);
}



//load function when page has loaded
window.onload = function() {
	disableAdd();
}


//function fot disable add button
function disableAdd() {

	setInterval(function(){
		//add button
		var addButton = document.getElementById("add_button");
		//input text value
	  	var inputLenght = document.getElementById('myText').value.length;
	  	
	  	if (inputLenght == 0) {
	  		//disable Add button
	  		addButton.disabled = true;
	  	}

	  	else if (inputLenght > 0) {
	  		//activae button
	  		addButton.disabled = false;
	  	}

	}, 1);
}






