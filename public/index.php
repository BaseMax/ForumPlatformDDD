<?php declare(strict_types=1);

require_once dirname(__DIR__) . "/vendor/autoload.php";




$request = Framework\Http\Request::createFromGlobals();


// request received

// perform some logic

// send response (string of content)

$content = "<h1>hello world</h1>";

$response = new Framework\Http\Response(content: $content, status: 200, headers: []);


$response->send();