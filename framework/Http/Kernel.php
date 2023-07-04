<?php

namespace Framework\Http;

class Kernel
{
    public function handle(Request $request): Response
    {
        $content = "<h1>hello from kernel</h1>";

        return new Response(content: $content);
    }
}