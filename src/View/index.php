<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use List\Model\DAO\TaskAccess;

$taskAccess = new TaskAccess();
$tasks = $taskAccess->getAllTasks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/form.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            full_white: '#FFFFFF', // pure white
            white: '#E7F2EF', // soft white
            purple: '#EBD6FB', // light purple
            pink: '#FFDFEF', // light pink
            blue: '#1e13f2',
            baby_blue: '#3f63f2', // vivid blue
            medium_blue: '#7307f7',
            purple_text: '#c414ff',
            red: '#a31010',
            green: '#0f8c1e',
            btn_light_green: '#12b839', // vivid green
            btn_green: '#0b7823'

          },
          fontFamily: {
            'montserrat': ['Montserrat', 'sans-serif'],
            'oswald': ['Oswald', 'sans-serif'],
            'open_sans': ['Open Sans', 'sans-serif'],
            'ibm_plex_sans': ['IBM Plex Sans', 'sans-serif']
          }
        }
      }
    }
  </script>
</head>
<body>
    <section class="flex flex-col justify-center items-center min-h-screen px-4 bg-[radial-gradient(circle_at_top_left,#EBD6FB_0%,#E7F2EF_50%,transparent_70%),radial-gradient(circle_at_bottom_right,#FFDFEF_0%,#E7F2EF_50%,transparent_70%)]">
  
      <!-- header -->
      <div class="flex flex-col items-center gap-4 mb-12 text-center">
        <div class="flex items-center gap-4 ">
          <div class="flex justify-center items-center bg-gradient-to-r from-blue via-medium_blue to-purple_text w-14 h-14 rounded-xl">
            <svg class="size-10" fill="none" stroke="current">
              <use xlink:href="../../public/assets/checklist.svg"></use>
            </svg>
          </div>
          <h1 class="py-4 text-4xl sm:text-5xl md:text-6xl align-middle font-bold bg-gradient-to-r from-blue via-medium_blue to-purple_text bg-clip-text text-transparent">
            My Tasks
          </h1>
        </div>
        <div class="flex items-center gap-2 text-gray-700">
          <img src="../../public/assets/progress.svg" alt="progress.svg" class="size-5">
          <p class="text-sm sm:text-base md:text-lg">x of x tasks concluded</p>
        </div>
      </div>

      <!-- content / tasks -->
      <?php foreach ($tasks as $task): ?> 

      <div class="task-container flex justify-between items-center bg-full_white border border-gray-200 rounded-md w-full max-w-2xl px-4 py-3 hover:shadow-2xl transition duration-300 hover:border-baby_blue mb-4">
        
        <div class="task-info flex items-center gap-2">
          <input type="checkbox" class="task-checkbox w-5 h-5 accent-baby_blue rounded border-baby_blue transition duration-300">
          <p class="task-name text-base sm:text-lg md:text-xl"><?= $task->getDescription() ?></p>
        </div>
        <div class="btn-items flex gap-2">
          <button class="edit-btn flex justify-center items-center cursor-pointer hover:bg-baby_blue hover:bg-opacity-10 rounded-md w-8 h-8">
            <img src="../../public/assets/write.svg" alt="edit">
          </button>
          <button class="delete-btn flex justify-center items-center cursor-pointer hover:bg-red hover:bg-opacity-10 rounded-md w-8 h-8">
            <img src="../../public/assets/delete.svg" alt="delete">
          </button>
        </div>
        
        <!-- hidden option -->
          <div class="changeTaskContainer hidden flex-col bg-full_white w-full max-w-2xl px-4 py-6 mt-6">
            <input id="changeTask" type="text" placeholder="Digite sua tarefa..."
            class="w-full border rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4">
              <div class="flex justify-end gap-4 font-semibold">
              <button class="goBackBtn flex items-center bg-full_white text-sm rounded-full px-4 py-2 border border-gray-200 gap-2">
                <img src="../../public/assets/close.svg" alt="cancel-icon" class="size-5">
                Cancel
              </button>
              <button class="flex items-center bg-gradient-to-r from-btn_light_green to-btn_green rounded-full text-sm text-full_white px-4 py-2 gap-2">
                <img src="../../public/assets/check.svg" alt="check-icon" class="size-5">
                Add Task
              </button>
            </div>
          </div>
      </div>
      
        <?php endforeach; ?>

      <!-- bottom -->
      <div id="addTaskBtnContainer"
      class="flex justify-center items-center bg-gradient-to-r from-blue via-medium_blue to-purple_text mt-8 w-48 sm:w-60 h-12 rounded-full hover:scale-105 transition duration-300 cursor-pointer">
        <button id="showFormBtn" class="flex items-center gap-2 text-full_white font-bold">
          <img src="../../public/assets/add.svg" alt="add-icon" class="size-6">
          Add new task
        </button>
      </div>

      <!-- hidden form -->
      <div id="formContainer" class="hidden flex-col bg-full_white w-full max-w-2xl px-4 py-6 mt-6 shadow-2xl rounded-md">
        <input id="taskInput" type="text" placeholder="Digite sua tarefa..."
          class="w-full border rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4">
        <div class="flex justify-end gap-4 font-semibold">
          <button class="cancelBtn flex items-center bg-full_white text-sm rounded-full px-4 py-2 border border-gray-200 gap-2">
            <img src="../../public/assets/close.svg" alt="cancel-icon" class="size-5">
            Cancel
          </button>
          <button id="AddTaskBtn" class="flex items-center bg-gradient-to-r from-btn_light_green to-btn_green rounded-full text-sm text-full_white px-4 py-2 gap-2">
            <img src="../../public/assets/check.svg" alt="check-icon" class="size-5">
            Add Task
          </button>
        </div>
      </div>

      <script src="../../public/js/form.js"></script>
  </section>

</body>
</html>