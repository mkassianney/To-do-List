
const showFormBtn = document.getElementById("showFormBtn");
const addTaskBtnContainer = document.getElementById("addTaskBtnContainer");
const formContainer = document.getElementById("formContainer");
const cancelBtn = document.querySelector(".cancelBtn"); // cancel button in form
const checkBoxes = document.querySelectorAll(".task-checkbox");
const taskName = document.querySelector(".task-name");
const changeTaskContainer = document.querySelector(".changeTaskContainer");
const changeTask = document.getElementById("changeTask");
const btnItems = document.querySelectorAll(".btn-items");
const editBtns = document.querySelectorAll(".edit-btn");
const taskInfo = document.querySelectorAll(".task-info");
const goBackBtns = document.querySelectorAll(".goBackBtn");

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