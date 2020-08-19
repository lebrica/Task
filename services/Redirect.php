<?php

namespace task\Services;

class Redirect
{
    public function main()
    {
        return 'http://task';
    }

    public function referer()
    {
        return $_SERVER['HTTP_REFERER'];
    }

}