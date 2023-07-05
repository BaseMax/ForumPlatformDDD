<?php

namespace App\Controllers;

use App\Services\ThreadService;
use Framework\Http\Request;
use Framework\Http\Response;

class ThreadController extends Controller
{
    public function index(Request $request): Response
    {
        $threads = (new ThreadService())->all();

        return new Response($threads);
    }

    public function show(Request $request, int $id): Response
    {
        $thread = (new ThreadService())->get($id);

        return new Response($thread);
    }

    public function store(Request $request): Response
    {
        $user_id = $request->postParams["user_id"];
        // int $user_id, string $title, string $body, int $upvotes, int $downvotes
        $title = $request->postParams["title"];
        $body = $request->postParams["body"];
        $upvotes = $request->postParams["upvotes"];
        $downvotes = $request->postParams["downvotes"];

        $threadId = (new ThreadService())->createThread($user_id, $title, $body, $upvotes, $downvotes);

        return new Response([
            "status" => "OK",
            "thread_id" => $threadId
        ]);
    }

    public function update(Request $request, int $id): Response
    {
    }

    public function destroy(Request $request, int $id): Response
    {
    }
}
