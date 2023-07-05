<?php

namespace App\Controllers;

use App\Services\UserService;
use Framework\Http\Request;
use Framework\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        return new Response([
            "status" => "ok"
        ]);
    }
}
