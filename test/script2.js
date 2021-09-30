function myFunction() {
  var element = document.getElementById("all");
  var numberOfChildren = element.children.length

  var text = document.getElementById("text");
  text.innerHTML = "Div count: " + numberOfChildren;
}