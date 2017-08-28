<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Framework\Foundation\Core\Env;
use ZanPHP\WorkerMonitor\WorkerMonitor;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class HotReloadTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        $isHotReload = Env::get('ZAN_HOT_RELOAD', false);
        if ($isHotReload) {
            WorkerMonitor::getInstance()->closePre();
        }
    }
}