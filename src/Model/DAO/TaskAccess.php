<?php

namespace List\Model\DAO;

use List\Model\Connection\ConnectionFactory;
use List\Model\Entities\Tasks;
use PDO;

class TaskAccess
{
    private PDO $connection;

    // Initialize the data base connection
    public function __construct()
    {
        $this->connection = ConnectionFactory::getInstance();
    }

    // Create a new task
    public function addTask(Tasks $tasks) : void
    {
        $sql = "INSERT INTO list (description, completed) VALUES (:description, :completed)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':description', $tasks->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':completed', $tasks->isCompleted(), PDO::PARAM_BOOL);
        $stmt->execute();
    }
    
    // Delete a task by id
    public function deleteTask(int $id) : void
    {
        $sql = "DELETE FROM list WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Get all tasks
    public function getAllTasks() : Array
    {
        $sql = "SELECT * FROM list ORDER BY id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = array_map(function ($tasks) {
            return new Tasks($tasks['id'], $tasks['description'], $tasks['completed']);
        }, $result);

        return $data;
    }

    public function updateStatus(int $id, bool $completed): bool
    {
    $sql = "UPDATE list SET completed = :completed WHERE id = :id";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue(':completed', $completed ? 'true' : 'false', PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
    }

    public function updateTask(Tasks $task)
    {
        $sql = "UPDATE list SET description = :description WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':description', $task->getDescription(), PDO::PARAM_STR);
        $stmt->execute();

    }

    private function hydrateList(\PDOStatement $stmt): array
    {
        $tasksList = $stmt->fetchAll(fetch_style: PDO::FETCH_ASSOC);
        $tasksData = [];

        foreach ($tasksList as $data) {
            $tasksData[] = new Tasks(
                $data['id'],
                $data['description']
            );
        }

        return $tasksData;
    }
}