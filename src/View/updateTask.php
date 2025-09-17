<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use List\Model\DAO\TaskAccess;
use List\Model\Entities\Tasks;

    $task = new TaskAccess();
    $new = new Tasks($_POST['id'], $_POST['description']);
    
    $task->updateTask($new);
    header("Location: index.php");
    exit();