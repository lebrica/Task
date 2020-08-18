<?php


namespace task\Controllers;


class RedirectController
{
    public function redirectNotFound()
    {
        return require_once ('view/redirect/404.php');
    }
}