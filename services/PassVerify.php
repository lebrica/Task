<?php

namespace task\Services;

use task\Repository\AuthRepository;

class PassVerify
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function verify(string $name, string $pass): bool
    {
        $userData = $this->authRepository->findUserForName($name);

        if ($userData['password'] === $pass) {
            return true;
        }
        return  false;
    }
}