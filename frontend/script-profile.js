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

	var p = document.createElement("p");
	p.className = "text";
	textDiv.appendChild(p);

	//append text from text input to task
	p.innerHTML = document.querySelector('#myText').value;

	
  	//cerate task belt
	var taskBelt = document.createElement("DIV");
	//add class to belt
	taskBelt.className = "taskBelt";

	//append to task
	task.appendChild(taskBelt);

	var text = p.textContent;
	$.ajax({
		url: "upload-task.php",
		method: "post",
		data: {all: text},
		success: function(res) {
			console.log("Add: ",res);
		}
	})


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
			success: function(res) {
				console.log("Pro: ",res);
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


window.onload = function() {
	disableAdd();
	disableTab();
	disableTab2();
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
	  		addButton.style = "background-color: #66a3ff";
	  	}
	  	
	  	else if (inputLenght == 0) {
	  		//disable Add button
	  		addButton.disabled = true;
	  		addButton.style = "background-color: #66a3ff";
	  	}

	  	else if (inputLenght > 0) {
	  		//activae button
	  		addButton.disabled = false;
	  		addButton.style = "background-color: #0066ff";
	  	}

		//refresh function always in 1 sec
	}, 1);
}


//function to disable adding to progress tab
function disableTab() {
	setInterval(function() {

		//holder1
		var taskHolder1 = document.getElementById("tasksHolder1");
		//count elements in holder 1
		var countHolder1 = tasksHolder1.children.length;

		//holder2
		var taskHolder2 = document.getElementById("tasksHolder2");
		//count elements in holder 2
		var countHolder2 = tasksHolder2.children.length;

		//holder3
		var taskHolder3 = document.getElementById("tasksHolder3");
		//count elements in holder 3
		var countHolder3 = tasksHolder3.children.length;

		//take buttons
		var take = document.getElementsByClassName("takeButton");
		var complete = document.getElementsByClassName("completeButton");

		//number of take button
		var buttonCount1 = take.length;

		for(var i=0; i<buttonCount1; ++i) {
			//if progress holder have 10 tasks take button will be disabled
			if(countHolder2 == 10) {
				//off button
				take[i].disabled = true;
			}

			else {
				//on button
				take[i].disabled = false;
			}	
		}

		//refresh function always in 1 sec
	},1)
}

function disableTab2() {
	setInterval(function() {
		//complete button
		var complete = document.getElementsByClassName("completeButton");
		
		//holder3
		var taskHolder3 = document.getElementById("tasksHolder3");
		//count elements in holder 3
		var countHolder3 = tasksHolder3.children.length;

		//number of complete button
		var buttonCount2 = complete.length;
		
		for (var y=0; y<buttonCount2; ++y) {
			//if holder have 10 tasks complete button will be disabled
			if(countHolder3 == 10) {
				//off button
				complete[y].disabled = true;
			}

			//but when holder have less than 10 tasks button still be on
			else {
				//on button
				complete[y].disabled = false;
			}
		}

		//refresh function always in 1 sec
	}, 1)
}

function checkWhiteSpace() {
	var input = document.getElementById("myText").value;
	var lenString = input.length;

	var array = [];
	for(var i=0; i<lenString; ++i) {
		x = input[i];
		array[i] = x;
	}

	if(array.at(0) == ' ') {
		console.log("Spacja na pocz??tku");
	}

	if(array.at(-1) == ' ') {
		console.log("Spacja na koncu");
	}
}












