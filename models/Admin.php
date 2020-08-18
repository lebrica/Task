<?php

namespace task\Models;

use task\Repository\AdminRepository;

class Admin
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function checkTask(int $id): bool
    {
        return $this->adminRepository->checkTask($id);
    }

    public function changeTask(int $id, string $task): bool
    {
        return $this->adminRepository->changeTask($id, $task);
    }
}