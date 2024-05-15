/**
* Template Name: toDoList
* Author: Richa Parekh
*/
// Function to add a new task
function addTask(task) {
    const todoList = document.getElementById("todo-list");
    const li = document.createElement("li");
    li.className = "list-group-item d-flex justify-content-between align-items-center";
    li.innerHTML = `
<span class="task-text">${task}</span>
<input type="text" class="form-control edit-input" style="display: none;" value="${task}">
<div class="btn-group">
<button class="btn btn-danger btn-sm delete-btn">✕</button>
<button class="btn btn-primary btn-sm edit-btn">✎</button>
</div>
`;
    todoList.appendChild(li);
}

// Event listener for form submission
document.getElementById("todo-form").addEventListener("submit",
    function (event) {
        event.preventDefault();
        const taskInput = document.getElementById("todo-input");
        const task = taskInput.value.trim();
        if (task !== "") {
            addTask(task);
            taskInput.value = "";
        }
    });

// Event listener for delete button click
document.getElementById("todo-list").addEventListener("click",
    function (event) {
        if (event.target.classList.contains("delete-btn")) {
            event.target.parentElement.parentElement.remove();
        }
    });

// Event listener for edit button click
document.getElementById("todo-list").addEventListener("click", function (event) {
    if (event.target.classList.contains("edit-btn")) {
        const taskText = event.target.parentElement
            .parentElement.querySelector(".task-text");
        const editInput = event.target.parentElement
            .parentElement.querySelector(".edit-input");
        if (taskText.style.display !== "none") {
            taskText.style.display = "none";
            editInput.style.display = "block";
            editInput.focus();
            event.target.innerHTML = "";
        } else {
            taskText.textContent = editInput.value;
            taskText.style.display = "inline";
            editInput.style.display = "none";
            event.target.innerHTML = "✎";
        }
    }
});

// Add default tasks
const defaultTasks = ["HTML", "CSS", "JS", "Bootstrap"];
defaultTasks.forEach(task => addTask(task));