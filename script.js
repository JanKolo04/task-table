function add_task() {
	//get tasks div
	var tasks_div = document.getElementById("tasks_all");

	//create new div
  	var task = document.createElement("DIV");

  	//class name
  	task.id = "task";

  	//append text from text input to task
  	task.innerHTML = document.querySelector('#myText').value;

  	//append task to all tasks
  	tasks_div.appendChild(task);
  	
  	//clear text input
	document.getElementById('myText').value = '';



	//get task
	var task = document.getElementById("task");
	//create button
	var button = document.createElement("BUTTON");
	//add name into button
	button.innerHTML = "Add";

	//append button to task
	task.appendChild(button);

}







function add_remove_button() {


	var all_tasks = document.getElementById("tasks_all");

	var task = document.getElementById("task");

	var in_progress = document.getElementById("progress_task");



	in_progress.appendChild(task);

	all_tasks.removeChild(task);

}