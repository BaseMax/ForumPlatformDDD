<?php

namespace Framework\Http;

use App\Controllers\AuthController;
use App\Controllers\ThreadController;

class Kernel
{
    public function handle(Request $request): Response
    {

        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $routeCollector) {
            // Register a new user
            $routeCollector->addRoute("POST", "/api/register", [AuthController::class, "register"]);

            // Login a user
            $routeCollector->addRoute("POST", "/api/login", [AuthController::class, "login"]);

            // Logout a user
            $routeCollector->addRoute("POST", "/api/logout", [AuthController::class, "logout"]);

            // Get a list of all threads
            $routeCollector->addRoute("GET", "/api/threads", [ThreadController::class, "index"]);

            // Get a specific thread by ID
            $routeCollector->addRoute("GET", "/api/threads/{id:\d+}", [ThreadController::class, "show"]);

            // Create a new thread
            $routeCollector->addRoute("POST", "/api/threads", [ThreadController::class, "store"]);

            // Update an existing thread
            $routeCollector->addRoute("PUT", "/api/threads/{id:\d+}", [ThreadController::class, "update"]);

            // Delete an existing thread
            $routeCollector->addRoute("DELETE", "/api/threads/{id:\d+}", [ThreadController::class, "destroy"]);

            // Get a list of all replies for a specific thread
            $routeCollector->addRoute("GET", "/api/threads/{thread_id:\d+}/replies", function () {
            });

            // Get a specific reply by ID for a specific thread
            $routeCollector->addRoute("GET", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", function () {
            });

            // Create a new reply for a specific thread
            $routeCollector->addRoute("POST", "/api/threads/{thread_id:\id+}/replies", function () {
            });

            // Update an existing reply for a specific thread
            $routeCollector->addRoute("PUT", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", function () {
            });

            // Delete an existing reply for a specific thread
            $routeCollector->addRoute("DELETE", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", function () {
            });

            // Get a list of all moderators
            $routeCollector->addRoute("GET", "/api/moderators", function () {
            });

            // Add a new moderator
            $routeCollector->addRoute("POST", "/api/moderators", function () {
            });

            // Remove an existing moderator
            $routeCollector->addRoute("DELETE", "/api/moderators/{user_id:\id+}", function () {
            });
        });


        $routeInfo = $dispatcher->dispatch(
            $request->server["REQUEST_METHOD"], 
            $request->server["REQUEST_URI"]
        );

        switch($routeInfo[0]){
            case \FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                break;
            
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;

            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                // ... call $handler with $vars
                break;
        }


        return $handler();
    }
}
