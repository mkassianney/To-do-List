<?php

namespace List\Model\Entities;

class Tasks
{
    private ?int $id;
    private string $description;
    private bool $completed; 

    public function __construct(?int $id, string $description, bool $completed = false)
    {
        $this->id = $id;
        $this->description = $description;
        $this->completed = $completed;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): void
    {
        $this->completed = $completed;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}