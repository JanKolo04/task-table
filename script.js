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


		//create button
		var button = document.createElement("BUTTON");
		//add name into button
		button.innerHTML = "Add";

		button.id = "progressButton";

		//append button to task
		task.appendChild(button);

  	}

  	//all data from all tasks
  	var numberOfTasks = tasks_div.children.length;
  	text1.innerHTML = "All tasks: " + numberOfTasks;
  	//all data from div progress
  	var progressTaskNumber = tasks_progress.children.length;
  	text2.innerHTML = "Tasks in progress: " + progressTaskNumber;
  	//all data from end task
  	var endTaskNumber = tasks_end.children.length;
  	text3.innerHTML = "End tasks: " + endTaskNumber;

  	
  	
  	//clear text input
	document.getElementById('myText').value = '';

	//disable add button
	var addButton = document.getElementById("add_button");
	//if task count is == 14 button has been disable
	if (numberOfTasks == 14) {
		//disable
		addButton.disabled = true;
	}

	//this code runs every second 
	setInterval(function(){ 

		//button in task
		var progresButton = document.getElementById("progressButton");
		progresButton.onclick = function() {

			//all tasks div
			var all_tasks = document.getElementById("tasks_all");
			//task
			var task = document.getElementById("task0");
			//progress div
			var in_progress = document.getElementById("progress_task");


			//append task to progress
			in_progress.appendChild(task);
			//remove task from all
			all_tasks.removeChild(task);

		}
	}, 1000);



}









