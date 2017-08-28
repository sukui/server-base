<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Database\Db;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class DbTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        yield Db::terminate();
    }
}