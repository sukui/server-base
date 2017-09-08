<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class AsyncTaskTerminator implements RequestTerminator
{
    private $AsyncTaskTerminator;

    public function __construct()
    {
        $this->AsyncTaskTerminator = new \ZanPHP\ServerBase\Middleware\AsyncTaskTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->AsyncTaskTerminator->terminate($request, $response, $context);
    }
}
