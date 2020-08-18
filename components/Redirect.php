<?php

namespace task\Components;

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