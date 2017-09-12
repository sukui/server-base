<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class DbTerminator implements RequestTerminator
{
    private $DbTerminator;

    public function __construct()
    {
        $this->DbTerminator = new \ZanPHP\ServerBase\Middleware\DbTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->DbTerminator->terminate($request, $response, $context);
    }
}