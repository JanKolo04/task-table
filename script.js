function myFunction() {
	//get tasks div
	var tasks_div = document.getElementById("tasks");
	//create new div
  	var new_div = document.createElement("DIV");
  	//get value from text input
  	new_div.innerHTML = document.querySelector('#myText').value;
  	//append text from input text to new div
  	tasks_div.appendChild(new_div);
  	
  	//clear text input
	document.getElementById('myText').value = '';

}
