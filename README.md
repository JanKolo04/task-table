# task-table
Website with tasks


# Login page frontend

<img width="1792" alt="Zrzut ekranu 2021-10-14 o 19 08 27" src="https://user-images.githubusercontent.com/76879087/137364556-9575ea6a-6755-4539-97b2-52bbb51ca2ec.png">



# Actually website design

<img width="1792" alt="Zrzut ekranu 2021-10-13 o 23 57 15" src="https://user-images.githubusercontent.com/76879087/137218233-2020a9ee-90af-4d9c-8753-56c0f2ec5ae0.png">



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
- [x] frontend for login page
- [x] add task container to taskAll and make his center
- [x] make vertical middle text in task
- [ ] make static text div to task div 
