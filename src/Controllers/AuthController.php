<?php

namespace App\Controllers;

use App\Services\UserService;
use Framework\Http\Request;
use Framework\Http\Response;

class AuthController extends Controller
{
    public function register(Request $request): Response
    {
        $name = $request->postParams["name"];
        $email = $request->postParams["email"];
        $password = $request->postParams["password"];

        $user_id = (new UserService())->createUser($name, $email, $password);

        return new Response([
            "status" => "ok",
            "user_id" => $user_id
        ]);
    }

    public function login(Request $request): Response
    {
        
    }

    public function logout(Request $request): Response
    {
    }
}
