<?php

namespace task\Models;

class Auth
{
    public function auth(string $name): bool
    {
        //var_dump($_SESSION['name'] = $name);
        $_SESSION['name'] = $name;
        return true;
    }
}