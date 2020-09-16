<?php

namespace task\Repository;

use task\Components\DB;
use task\Services\Paginator;

class AdminRepository
{
    private $db;
    private $paginator;

    public  function  __construct(DB $db, Paginator $paginator)
    {
        $this->db = $db->getConnection();
        $this->paginator = $paginator;
    }

    public function checkTask(int $id): bool
    {
        $stmt = $this->db->prepare("UPDATE tasks SET status = 1 WHERE id = :id");
        return  $stmt->execute([':id'=>$id]);
    }

    public function changeTask(int $id, string $task): bool
    {
        $stmt = $this->db->prepare("UPDATE tasks SET task = :task WHERE id = :id");
        return $stmt->execute([':task' => $task, ':id' => $id]);
    }
}