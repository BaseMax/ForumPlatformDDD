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
        $replies = (new ReplyService())->get($thread_id, $id);

        return new Response([
            "status" => "ok",
            "thread_id" => $thread_id,
            "reply_id" => $id,
            "replies" => $replies
        ]);
    }

    public function store(Request $request, int $thread_id): Response
    {
        $user_id = $request->postParams["user_id"];
        $body = $request->postParams["body"];
        $upvotes = $request->postParams["upvotes"];
        $downvotes = $request->postParams["downvotes"];

        $replyId = (new ReplyService())->add($user_id, $thread_id, $body, $upvotes, $downvotes);

        return new Response(
            [
                "status" => "ok",
                "reply_id" => $replyId
            ]
        );
    }

    public function update(Request $request, int $thread_id, int $id): Response
    {
        (new ReplyService())->update($id, $thread_id, $request->postParams);

        return new Response([
            "status" => "ok"
        ]);
    }

    public function destroy(Request $request, int $thread_id, int $id): Response
    {
        (new ReplyService())->delete($id, $thread_id);

        return new Response([
            "status" => "ok"
        ]);
    }
}
