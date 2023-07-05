<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ModerationController;
use App\Controllers\ReplyController;
use App\Controllers\SearchController;
use App\Controllers\ThreadController;

if (!LOADED) exit;

return [
    ["GET", "/", [HomeController::class, "index"]], // Home Page

    ["POST", "/api/register", [AuthController::class, "register"]], // Register a new user

    ["POST", "/api/login", [AuthController::class, "login"]], // Login a user

    ["POST", "/api/logout", [AuthController::class, "logout"]], // Logout a user

    ["GET", "/api/threads", [ThreadController::class, "index"]], // Get a list of all threads

    ["GET", "/api/threads/{id:\d+}", [ThreadController::class, "show"]], // Get a specific thread by ID

    ["POST", "/api/threads", [ThreadController::class, "store"]], // Create a new thread

    ["PUT", "/api/threads/{id:\d+}", [ThreadController::class, "update"]], // Update an existing thread

    ["DELETE", "/api/threads/{id:\d+}", [ThreadController::class, "destroy"]], // Delete an existing thread

    ["GET", "/api/threads/{thread_id:\d+}/replies", [ReplyController::class, "index"]], // Get a list of all replies for a specific thread

    ["GET", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", [ReplyController::class, "show"]], // Get a specific reply by ID for a specific thread

    ["POST", "/api/threads/{thread_id:\d+}/replies", [ReplyController::class, "store"]], // Create a new reply for a specific thread

    ["PUT", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", [ReplyController::class, "update"]], // Update an existing reply for a specific thread

    ["DELETE", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", [ReplyController::class, "destroy"]], // Delete an existing reply for a specific thread

    ["GET", "/api/moderators", [ModerationController::class, "index"]], // Get a list of all moderators

    ["POST", "/api/moderators", [ModerationController::class, "store"]], // Add a new moderator

    ["DELETE", "/api/moderators/{user_id:\d+}", [ModerationController::class, "destroy"]], // Remove an existing moderator

    ["GET", "/api/search", [SearchController::class, "search"]] // Search for threads and replies by keyword
];
