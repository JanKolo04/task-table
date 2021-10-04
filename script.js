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

		//append button to task
		task.appendChild(button);

  	}


  	var numberOfTasks = tasks_div.children.length;
  	text1.innerHTML = "All tasks: " + numberOfTasks;

  	var progressTaskNumber = tasks_progress.children.length;
  	text2.innerHTML = "Tasks in progress: " + progressTaskNumber;

  	var endTaskNumber = tasks_end.children.length;
  	text3.innerHTML = "End tasks: " + endTaskNumber;

  	
  	
  	//clear text input
	document.getElementById('myText').value = '';


}




function add_remove_button() {


	var all_tasks = document.getElementById("tasks_all");

	var task = document.getElementById("task0");

	var in_progress = document.getElementById("progress_task");



	in_progress.appendChild(task);

	all_tasks.removeChild(task);

}