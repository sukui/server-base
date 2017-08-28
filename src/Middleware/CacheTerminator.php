<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;
use ZanPHP\NoSql\Facade\Cache;

class CacheTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        yield Cache::terminate();
    }
}