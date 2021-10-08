function add_task() {

	//get tasks div
	var tasks_div = document.getElementById("tasks_all");
	var tasks_progress = document.getElementById("progress_task");
	var tasks_end = document.getElementById("task_end")

	var text1 = document.getElementById("all_task_text");
	var text2 = document.getElementById("tasks_in_progress");
	var text3 = document.getElementById("end_tasks");


  	for (var i=0; i<1; ++i) {
	 	//create new div
	  	var task = document.createElement("DIV");

	  	//id name
	  	task.id = "task" + i;

	  	//append text from text input to task
	  	task.innerHTML = document.querySelector('#myText').value;

	  	//append task to all tasks
	  	tasks_div.appendChild(task);

	}



  	//div to task
	var taskBelt = document.createElement("DIV");
	//flex button id 
	taskBelt.id = "taskBelt";

	//append to task
	task.appendChild(taskBelt);


	//create delete button
	var deleteButton = document.createElement("BUTTON");
	//add name into button
	deleteButton.innerHTML = "Delete";
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
	endButton.innerHTML = "End";


	//Inscruction for progress button
	progressButton.onclick = function() {
		//append end button
		taskBelt.appendChild(endButton);
		//append task to progress
		tasks_progress.appendChild(task);
		//remove task from all
		tasks_div.removeChild(task);
	}


	//instruction for end button
	endButton.onclick = function() {
		//append task to end task
		tasks_end.appendChild(task);
		//remove task from progress
		tasks_progress.removeChild(task);
	}



	//inscruction for delete button
	deleteButton.onclick = function() {
		//delete task
		task.remove();
	}



	//this code runs every second 
	setInterval(function(){ 

	  	//all data from all tasks
	  	var numberOfTasks = tasks_div.children.length;
	  	text1.innerHTML = "All tasks: " + numberOfTasks;
	  	//all data from div progress
	  	var progressTaskNumber = tasks_progress.children.length;
	  	text2.innerHTML = "Tasks in progress: " + progressTaskNumber;
	  	//all data from end task
	  	var endTaskNumber = tasks_end.children.length;
	  	text3.innerHTML = "End tasks: " + endTaskNumber;


		//disable add button
		var addButton = document.getElementById("add_button");
		//if task count is == 14 button has been disable
		if (numberOfTasks == 14) {
			//disable
			addButton.disabled = true;
		}

		//chech if task is in progress div
		if (tasks_progress.contains(task)) {
			//remove progress button
			progressButton.remove();
		} 

		//check if task is in end div
		if (tasks_end.contains(task)) {
			//remove end button
			endButton.remove();
		}

	}, 1);
}



window.onload = function() {
	disableAdd();
}


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






