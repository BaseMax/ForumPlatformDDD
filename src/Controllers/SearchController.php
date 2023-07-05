<?php

namespace App\Controllers;

use Framework\Http\Request;
use Framework\Http\Response;

class SearchController extends Controller
{
    public function search(Request $request): Response
    {
      return new Response([
        "q" => $request->getParams["q"]
      ]);   
    }
    
}