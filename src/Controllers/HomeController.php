<?php

namespace App\Controllers;

use App\Services\UserService;
use Framework\Http\Request;
use Framework\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        (new UserService())->createUser("Ali", "ali@gmail.com", "1234");

        

        return new Response([
            "status" => "ok"
        ]);
    }
}
