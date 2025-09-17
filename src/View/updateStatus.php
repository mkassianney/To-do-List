<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use List\Model\DAO\TaskAccess;

$completed = isset($_POST['completed']) && $_POST['completed'] == 1 ? true : false;
$task = new TaskAccess();
$task->updateStatus($_POST['id'], $_POST['completed']);

header("Location: index.php");