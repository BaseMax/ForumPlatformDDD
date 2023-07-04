<?php

namespace Framework\Http;


class Kernel
{
    public function handle(Request $request): Response
    {
        $content = "<h1>hello from kernel</h1>";


        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $routeCollector) {
            // Register a new user
            $routeCollector->addRoute("POST", "/api/register", function () {
            });

            // Login a user
            $routeCollector->addRoute("POST", "/api/login", function () {
            });

            // Logout a user
            $routeCollector->addRoute("POST", "/api/logout", function () {
            });

            // Get a list of all threads
            $routeCollector->addRoute("GET", "/api/threads", function () {
            });

            // Get a specific thread by ID
            $routeCollector->addRoute("GET", "/api/threads/{id:\d+}", function () {
            });

            // Create a new thread
            $routeCollector->addRoute("POST", "/api/threads", function () {
            });

            // Update an existing thread
            $routeCollector->addRoute("PUT", "/api/threads/{id:\d+}", function () {
            });

            // Delete an existing thread
            $routeCollector->addRoute("DELETE", "/api/threads/{id:\d+}", function () {
            });

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
        return new Response(content: $content);
    }
}
