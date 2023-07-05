<?php

namespace App\Controllers;

use App\Services\ReplyService;
use Framework\Http\Request;
use Framework\Http\Response;

class ReplyController extends Controller
{
    public function index(Request $request, int $thread_id): Response
    {
        $replies = (new ReplyService())->all($thread_id);

        return new Response([
            "status" => "ok",
            "replies" => $replies
        ]);
    }

    public function show(Request $request, int $thread_id, int $id): Response
    {
        return new Response([
            "thread" => $thread_id,
            "id" => $id
        ]);
    }

    public function store(Request $request, int $thread_id): Response
    {

    }

    public function update(Request $request, int $thread_id, int $id): Response
    {

    }

    public function destroy(Request $request, int $thread_id, int $id): Response
    {

    }
}