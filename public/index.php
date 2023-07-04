<?php

declare(strict_types=1);

require_once dirname(__DIR__) . "/vendor/autoload.php";


// request received
$request = Framework\Http\Request::createFromGlobals();

$kernel = new Framework\Http\Kernel();

// perform some logic
$response = $kernel->handle($request);


// send response (string of content)
$response->send();
