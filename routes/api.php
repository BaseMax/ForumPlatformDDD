<?php if (!LOADED) exit;

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ModerationController;
use App\Controllers\ReplyController;
use App\Controllers\SearchController;
use App\Controllers\ThreadController;


return [
    // Home Page
    ["GET", "/api", [HomeController::class, "index"]],

    // Register a new user
    ["POST", "/api/register", [AuthController::class, "register"]],

    // Login a user
    ["POST", "/api/login", [AuthController::class, "login"]],

    // Logout a user
    ["POST", "/api/logout", [AuthController::class, "logout"]],

    // Get a list of all threads
    ["GET", "/api/threads", [ThreadController::class, "index"]],

    // Get a specific thread by ID
    ["GET", "/api/threads/{id:\d+}", [ThreadController::class, "show"]],

    // Create a new thread
    ["POST", "/api/threads", [ThreadController::class, "store"]],

    // Update an existing thread
    ["PUT", "/api/threads/{id:\d+}", [ThreadController::class, "update"]],

    // Delete an existing thread
    ["DELETE", "/api/threads/{id:\d+}", [ThreadController::class, "destroy"]],

    // Get a list of all replies for a specific thread
    ["GET", "/api/threads/{thread_id:\d+}/replies", [ReplyController::class, "index"]],

    // Get a specific reply by ID for a specific thread
    ["GET", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", [ReplyController::class, "show"]],

    // Create a new reply for a specific thread
    ["POST", "/api/threads/{thread_id:\d+}/replies", [ReplyController::class, "store"]],

    // Update an existing reply for a specific thread
    ["PUT", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", [ReplyController::class, "update"]],

    // Delete an existing reply for a specific thread
    ["DELETE", "/api/threads/{thread_id:\d+}/replies/{id:\d+}", [ReplyController::class, "destroy"]],

    // Get a list of all moderators
    ["GET", "/api/moderators", [ModerationController::class, "index"]],

    // Add a new moderator
    ["POST", "/api/moderators", [ModerationController::class, "store"]],

    // Remove an existing moderator
    ["DELETE", "/api/moderators/{user_id:\d+}", [ModerationController::class, "destroy"]],

    // Search for threads and replies by keyword
    ["GET", "/api/search", [SearchController::class, "search"]]
];
