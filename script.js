function add_task() {
	//get tasks div
	var tasks_div = document.getElementById("tasks_all");
	var text1 = document.getElementById("all_task_text");


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
  	
  	//clear text input
	document.getElementById('myText').value = '';


}







function add_remove_button() {


	var all_tasks = document.getElementById("tasks_all");

	var task = document.getElementById("task");

	var in_progress = document.getElementById("progress_task");



	in_progress.appendChild(task);

	all_tasks.removeChild(task);

}