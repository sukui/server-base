<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class DebuggerTraceTerminator implements RequestTerminator
{
    private $DebuggerTraceTerminator;

    public function __construct()
    {
        $this->DebuggerTraceTerminator = new \ZanPHP\ServerBase\Middleware\DebuggerTraceTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->DebuggerTraceTerminator->terminate($request, $response, $context);
    }
}