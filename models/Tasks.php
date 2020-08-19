<?php

namespace task\Models;

use task\Services\Paginator;
use task\Repository\TaskRepository;

class Tasks
{
    private $paginator;
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository, Paginator $paginator)
    {
        $this->paginator = $paginator;
        $this->taskRepository = $taskRepository;
    }

    public function viewTasks(int $id): array
    {
        return  $this->taskRepository->findTasksPaginate($id, 3);
    }

    public function pagesCountPaginate(): int
    {
        $count = $this->taskRepository->findCountTasks();

        return  $this->paginator->countPages($count, 3);
    }

    public function addTask(string $name, string $email, string $task): bool
    {
        return  $this->taskRepository->addTask($name, $email, $task);
    }

}