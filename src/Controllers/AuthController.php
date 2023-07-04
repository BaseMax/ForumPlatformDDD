<?php

namespace App\Controllers;
use Framework\Http\Response;

class AuthController extends Controller
{
    public static function register(){
        return new Response("hello from controller register");
    }

    public static function login(){

    }

    public static function logout(){
        
    }
}