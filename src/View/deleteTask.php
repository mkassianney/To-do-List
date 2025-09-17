<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use List\Model\DAO\TaskAccess;

    $task = new TaskAccess();
    $task->deleteTask($_POST['id']);

    header("Location: index.php");