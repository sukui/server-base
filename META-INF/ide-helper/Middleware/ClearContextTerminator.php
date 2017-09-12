<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class ClearContextTerminator implements RequestTerminator
{
    private $ClearContextTerminator;

    public function __construct()
    {
        $this->ClearContextTerminator = new \ZanPHP\ServerBase\Middleware\ClearContextTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->ClearContextTerminator->terminate($request, $response, $context);
    }
}

