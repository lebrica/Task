<?php

namespace task\Components;

use DI\ContainerBuilder;

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    private function serarchRoute ()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $controllerName = '\\task\\Controllers\\' . $controllerName;
                $actionName = array_shift($segments);
                $parameters = $segments;
                return ["controller" => $controllerName,
                    "action" => $actionName,
                    "parameters" => $parameters
                ];
            }
        }
    }

    public function run()
    {
        $route = $this->serarchRoute();
        if ($route == null) {
            header("Location: http://task/notfound");
        }
        $builder = new ContainerBuilder();
        $container  = $builder->build();
        $container->call([$route['controller'], $route['action']], $route['parameters']);
    }

}