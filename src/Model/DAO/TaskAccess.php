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
    public function addTask(int $id, string $description) : void
    {
        $sql = "INSERT INTO list (id, description) VALUES (:id, :description)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
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
            return new Tasks($tasks['id'], $tasks['description']);
        }, $result);

        return $data;
    }
}