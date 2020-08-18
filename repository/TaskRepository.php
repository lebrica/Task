<?php

namespace task\Repository;

use task\Components\DB;
use task\Components\Paginator;

class TaskRepository
{
    private $db;
    private $paginator;

    public  function  __construct(DB $db, Paginator $paginator)
    {
        $this->db = $db->getConnection();
        $this->paginator = $paginator;
    }

    public function findCountTasks(): int
    {
        $stmt = $this->db->query("SELECT  COUNT(*)  as count FROM tasks");
        return $stmt->fetchColumn();
    }

    public function findTasksPaginate(int $page, int $countOnPage): array
    {
        $paginator = $this->paginator->paginate($page, $countOnPage);

        $stmt = $this->db->query("SELECT * FROM tasks  ORDER BY  id DESC  LIMIT $paginator ");
        return $stmt->fetchAll();
    }

    public function addTask(string $name, string $email, string $task): bool
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (name, email, task) VALUES (:name, :email, :task)");
        return $stmt->execute([':name' => $name, ':email' => $email, ':task' => $task]);
    }
}