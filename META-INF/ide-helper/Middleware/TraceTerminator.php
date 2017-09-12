<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class TraceTerminator implements RequestTerminator
{
    private $TraceTerminator;

    public function __construct()
    {
        $this->TraceTerminator = new \ZanPHP\ServerBase\Middleware\TraceTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->TraceTerminator->terminate($request, $response, $context);
    }
}