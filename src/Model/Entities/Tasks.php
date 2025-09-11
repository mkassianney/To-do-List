<?php

class Tasks
{
    private ?int $id;
    private string $description;

    public function __construct(?int $id, string $description)
    {
        $this->id = $id;
        $this->description = $description;
    }

}