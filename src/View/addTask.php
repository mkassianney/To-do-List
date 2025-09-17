<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use List\Model\DAO\TaskAccess;
use List\Model\Entities\Tasks;


    $taskAccess = new TaskAccess();
    $newTask = new Tasks(null, $_POST['new-description']); // id = null
    $taskAccess->addTask($newTask);

    header("Location: index.php");
    exit();

