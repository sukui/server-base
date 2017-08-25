<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\WorkerMonitor\WorkerMonitor;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class WorkerTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        WorkerMonitor::getInstance()->reactionRelease();
    }
}