var taskNumber = 0;

function add_task() {

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
	  	tasksHolder1.appendChild(task);

	}

	//add class to task
	task.className = "taskBody";

	//create text div
	var textDiv = document.createElement("DIV");
	task.appendChild(textDiv);
	//add class to span
	textDiv.className = "textDiv";
	textDiv.id = "textDiv";

	//append text from text input to task
	textDiv.innerHTML = document.querySelector('#myText').value;

	
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


	//Inscruction for take button
	takeButton.onclick = function() {
		//remove take button from task belt
		takeButton.remove();
		//append end button to task belt
		taskBelt.appendChild(completeButton);
		//append task to progress
		tasksHolder2.appendChild(task);
		//remove task from all
		tasksHolder1.removeChild(task);
	}


	//instruction for complete button
	completeButton.onclick = function() {
		//remove end complete button from task belt
		completeButton.remove();
		//append task to end task
		tasksHolder3.appendChild(task);
		//remove task from progress
		tasksHolder2.removeChild(task);
	}



	//inscruction for delete button
	removeButton.onclick = function() {
		//delete task
		task.remove();
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



//load function when page has loaded
window.onload = function() {
	disableAdd();
	disableTab();
}

//function fot disable add button
function disableAdd() {

	setInterval(function(){
		//add button
		var addButton = document.getElementById("add_button");
		//input text value
	  	var inputLenght = document.getElementById('myText').value.length;

	  	var taskHolder1 = document.getElementById("tasksHolder1");
	  	var countTask = tasksHolder1.children.length;

	  	if ((inputLenght > 0) && (countTask == 10)) {
	  		addButton.disabled = true;
	  	}
	  	
	  	else if (inputLenght == 0) {
	  		//disable Add button
	  		addButton.disabled = true;
	  	}

	  	else if (inputLenght > 0) {
	  		//activae button
	  		addButton.disabled = false;
	  	}

		//refresh function always in 1 sec
	}, 1);
}


















