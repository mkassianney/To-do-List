// Seleciona elementos
const showFormBtn = document.getElementById("showFormBtn");
const addTaskBtnContainer = document.getElementById("addTaskBtnContainer");
const formContainer = document.getElementById("formContainer");
const cancelBtn = document.getElementById("cancelBtn"); // cancel button in form
const checkBoxes = document.querySelectorAll(".task-checkbox");
const taskName = document.querySelector(".task-name");

// Show form when you click on "Add new task"
showFormBtn.addEventListener("click", () => {
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
    // pega o elemento <p> que está logo ao lado da checkbox
    const taskName = checkbox.nextElementSibling;

    if (checkbox.checked) {
      taskName.classList.add("line-through", "text-gray-400");
    } else {
      taskName.classList.remove("line-through", "text-gray-400");
    }
  });
});