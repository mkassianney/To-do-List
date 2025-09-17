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

    public function addTask(Tasks $tasks) : void
    {
        $sql = "INSERT INTO list (description, completed) VALUES (:description, :completed)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':description', $tasks->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':completed', $tasks->isCompleted(), PDO::PARAM_BOOL);
        $stmt->execute();
    }
    
    public function deleteTask(int $id) : void
    {
        $sql = "DELETE FROM list WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

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
        return $stmt->execute([
            ':completed' => $completed,
            ':id' => $id
        ]);
    }

    public function updateTask(Tasks $task)
    {
        $sql = "UPDATE list SET description = :description WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':description', $task->getDescription(), PDO::PARAM_STR);
        $stmt->execute();

    }

}