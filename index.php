<?php

use task\Components\Router;

session_start();

//1 общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//2 подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once (ROOT. '/vendor/autoload.php');
require_once (ROOT . '/components/Router.php');

//3 вызов роутер
$router = new Router();
$router->run();
