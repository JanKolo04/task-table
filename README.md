# task-table
Website with tasks


# Actually website design

<img width="1792" alt="Zrzut ekranu 2021-10-11 o 20 18 19" src="https://user-images.githubusercontent.com/76879087/136836271-ba40121e-8623-49cc-9112-a18670757e91.png">




# NOTES
```txt
Dodac klase dla taska. Po czym dodac dla taska
przycisk DELETE.

TWORZENIE KLASY DLA DIVA
div.className = "ClassName";

-------------------
dodac for loop do nazw tasków 

for (i=0; ++1)

var task = document.createElement("DIV");
task.id = ("task" + i);

--------------------------------
ile jest taskow w divie

Scirpt:
function myFunction() {
  var element = document.getElementById("all");
  var numberOfChildren = element.children.length

  var text = document.getElementById("text");
  text.innerHTML = "Div count: " + numberOfChildren;
}


Html:
<div id="all">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>

<p id="text"></p>
    
<script>
  window.onload=myFunction;
</script>


All task: 2  |  In progress: 1  |  End task: 0  |
             |                  |               |
             |                  |               |
             |                  |               |
             |                  |               |


Odświeżanie ilości taskow co sekundę


Dodać for loop do id przycisku
```




## TASKS
- [x] if input text is empty add was block
- [x] make delete button in task
- [x] make working porgress and delete button
- [ ] add SQL and PHP session for user
- [x] chnage text in button
- [ ] frontend for login page
- [ ] change task posittion for responsive
- [x] make vertical middle text in task





