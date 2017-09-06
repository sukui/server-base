<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class WorkerTerminator implements RequestTerminator
{
    private $WorkerTerminator;

    public function __construct()
    {
        $this->WorkerTerminator = new \ZanPHP\ServerBase\Middleware\WorkerTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->WorkerTerminator->terminate($request, $response, $context);
    }
}