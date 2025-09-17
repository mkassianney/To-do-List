const showFormBtn = document.getElementById("showFormBtn");
const addTaskBtnContainer = document.getElementById("addTaskBtnContainer");
const formContainer = document.getElementById("formContainer");
const changeTask = document.getElementById("changeTask");
const counter = document.getElementById('taskCounter');

const cancelBtn = document.querySelector(".cancelBtn"); 
const checkBoxes = document.querySelectorAll(".task-checkbox");
const taskName = document.querySelector(".task-name");
const changeTaskContainer = document.querySelector(".changeTaskContainer");
const btnItems = document.querySelectorAll(".btn-items");
const editBtns = document.querySelectorAll(".edit-btn");
const taskInfo = document.querySelectorAll(".task-info");
const goBackBtns = document.querySelectorAll(".goBackBtn");
const addTask = document.querySelectorAll(".add-task");

// Show form when you click on "Add new task"
addTaskBtnContainer.addEventListener("click", () => {
  addTaskBtnContainer.classList.add("hidden"); // hide the button
  formContainer.classList.remove("hidden");    // show form
});

// Cancel and go back to the button
cancelBtn.addEventListener("click", () => {
  formContainer.classList.add("hidden");       // hide form
  addTaskBtnContainer.classList.remove("hidden"); // show button again
  });

// Add a line-through style to the task name when checkbox is marked
checkBoxes.forEach((checkbox) => {
  checkbox.addEventListener("change", () => {
    // get the <p> element that is right next to the checkbox
    const taskName = checkbox.nextElementSibling;

    if (checkbox.checked) {
      taskName.classList.add("line-through", "text-gray-400");
    } else {
      taskName.classList.remove("line-through", "text-gray-400");
    }
  });
});

// Show form when you click on "Edit" button
editBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const taskContainer = btn.closest(".task-container");

    // hide elements
    taskContainer.querySelector(".task-info").classList.add("hidden");
    taskContainer.querySelector(".btn-items").classList.add("hidden");

    // show form
    taskContainer.querySelector(".changeTaskContainer").classList.remove("hidden");
  });
});

// Cancel and go back to the task name
goBackBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const taskContainer = btn.closest(".task-container");

    // show elements
    taskContainer.querySelector(".task-info").classList.remove("hidden");
    taskContainer.querySelector(".btn-items").classList.remove("hidden");

    // hide form
    taskContainer.querySelector(".changeTaskContainer").classList.add("hidden");
  });
});

document.querySelectorAll('.task-checkbox').forEach(cb => {
    cb.addEventListener('change', function() {
        const id = this.dataset.id;
        const completed = this.checked ? true : false;

        // Send to the PHP
        fetch('updateTask.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `id=${id}&completed=${true}`
        });
    });
});
