function myFunction() {
    var div = document.getElementById("div1");
    var p2 = document.getElementById("textP");

    var p = document.createElement("p");
    p.className = "textP";
    p.id = "textP";
    p.innerHTML = "testy";

    var text = p.innerHTML;

    console.log("JS: ", typeof(text));

    div.appendChild(p);


}




function checking() {
    var holder = document.getElementById("holder");
    var elements = document.getElementsByClassName("textP");
    var task = document.getElementsByClassName("div1");

    var array = [];
    for (i = 0; i < elements.length; i++) {
        var text = elements[i].textContent;
        array[i] = text;
    }
    console.log(array);
    
}