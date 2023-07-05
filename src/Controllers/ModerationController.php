<?php

namespace App\Controllers;

use App\Services\ModeratorService;
use Framework\Http\Request;
use Framework\Http\Response;

class ModerationController extends Controller
{
    public function index(Request $request): Response
    {
        $moderators = (new ModeratorService())->all();

        return new Response([
            "status" => "ok",
            "moderators" => $moderators
        ]);
    }

    public function store(Request $request): Response
    {
        $moderatorId = (new ModeratorService())->add($request->postParams);

        return new Response([
            "status" => "ok",
            "moderator_id" => $moderatorId
        ]);
    }

    public function destroy(Request $request, int $user_id): Response
    {
        (new ModeratorService())->delete($user_id);
        return new Response([
            "status" => "ok"
        ]);
    }
}
