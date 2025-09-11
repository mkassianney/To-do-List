// Seleciona elementos
const showFormBtn = document.getElementById("showFormBtn");
const addTaskBtnContainer = document.getElementById("addTaskBtnContainer");
const formContainer = document.getElementById("formContainer");
const cancelBtn = document.getElementById("cancelBtn"); // cancel button in form

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
