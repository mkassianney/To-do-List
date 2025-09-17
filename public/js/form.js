const showFormBtn = document.getElementById("showFormBtn");
const addTaskBtnContainer = document.getElementById("addTaskBtnContainer");
const formContainer = document.getElementById("formContainer");
const changeTask = document.getElementById("changeTask");

const cancelBtn = document.querySelector(".cancelBtn");
const checkBoxes = document.querySelectorAll(".task-checkbox");
const taskName = document.querySelector(".task-name");
const changeTaskContainer = document.querySelector(".changeTaskContainer");
const btnItems = document.querySelectorAll(".btn-items");
const editBtns = document.querySelectorAll(".edit-btn");
const taskInfo = document.querySelectorAll(".task-info");
const goBackBtns = document.querySelectorAll(".goBackBtn");
const addTask = document.querySelectorAll(".add-task");

addTaskBtnContainer.addEventListener("click", () => {
  addTaskBtnContainer.classList.add("hidden");
  formContainer.classList.remove("hidden");   
});


cancelBtn.addEventListener("click", () => {
  formContainer.classList.add("hidden");       
  addTaskBtnContainer.classList.remove("hidden"); 
  });

checkBoxes.forEach((checkbox) => {
  checkbox.addEventListener("change", () => {

    const taskName = checkbox.nextElementSibling;

    if (checkbox.checked) {
      taskName.classList.add("line-through", "text-gray-400");
    } else {
      taskName.classList.remove("line-through", "text-gray-400");
    }
  });
});

editBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const taskContainer = btn.closest(".task-container");

    taskContainer.querySelector(".task-info").classList.add("hidden");
    taskContainer.querySelector(".btn-items").classList.add("hidden");

    taskContainer.querySelector(".changeTaskContainer").classList.remove("hidden");
  });
});

goBackBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const taskContainer = btn.closest(".task-container");

    // show elements
    taskContainer.querySelector(".task-info").classList.remove("hidden");
    taskContainer.querySelector(".btn-items").classList.remove("hidden");

    taskContainer.querySelector(".changeTaskContainer").classList.add("hidden");
  });
});

document.querySelectorAll('.task-checkbox').forEach(cb => {
    cb.addEventListener('change', function() {
        const id = this.dataset.id;
        const completed = this.checked ? true : false;

        fetch('updateTask.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `id=${id}&completed=${true}`
        });
    });
});
