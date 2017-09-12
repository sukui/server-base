<?php
namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class CacheTerminator implements RequestTerminator
{
    private $CacheTerminator;

    public function __construct()
    {
        $this->CacheTerminator = new \ZanPHP\ServerBase\Middleware\CacheTerminator();
    }

    public function terminate(Request $request, Response $response, Context $context)
    {
        $this->CacheTerminator->terminate($request, $response, $context);
    }
}