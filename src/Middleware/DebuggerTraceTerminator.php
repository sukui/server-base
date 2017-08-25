<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Debugger\Tracer;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

/**
 * Class DebuggerTraceTerminator
 * @package Zan\Framework\Network\Server\Middleware
 * TODO 利用SPI自动添加Terminator
 */
class DebuggerTraceTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        /** @var Tracer $trace */
        $trace = $context->get('debugger_trace');
        if ($trace instanceof Tracer) {
            $exception = null;
            if (method_exists($response, "getException")) {
                $exception = $response->getException();
            }
            $trace->endRequest($exception);
        }
    }
}