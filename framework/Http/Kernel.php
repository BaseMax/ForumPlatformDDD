<?php

namespace Framework\Http;


class Kernel
{
    public function handle(Request $request): Response
    {

        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $routeCollector) {
            $routes = include BASE_PATH . "/routes/api.php";

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });


        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()
        );


        // switch ($routeInfo[0]) {
        //     case \FastRoute\Dispatcher::NOT_FOUND:
        //         // ... 404 Not Found
        //         break;

        //     case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        //         $allowedMethods = $routeInfo[1];
        //         // ... 405 Method Not Allowed
        //         break;

        //     case \FastRoute\Dispatcher::FOUND:
        //         $handler = $routeInfo[1];
        //         $vars = $routeInfo[2];
        //         // ... call $handler with $vars
        //         break;
        // }

        [$status, [$controller, $method], $vars] = $routeInfo;

        // $response = (new $controller)->$method($request, $vars);
        $response = call_user_func_array([new $controller, $method], [$request, ...$vars]);

        return $response;
    }
}
