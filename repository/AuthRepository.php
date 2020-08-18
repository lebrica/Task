<?php

namespace task\Repository;

use task\Components\DB;
use task\Components\Paginator;

class AuthRepository
{
    private $db;
    private $paginator;

    public  function  __construct(DB $db, Paginator $paginator)
    {
        $this->db = $db->getConnection();
        $this->paginator = $paginator;
    }

    public function findUserForName(string $name)
    {
        $stmt = $this->db->prepare("SELECT  * FROM users WHERE  name = :name");
        $stmt->execute([':name' => $name]);
        return $stmt->fetch();
    }
}