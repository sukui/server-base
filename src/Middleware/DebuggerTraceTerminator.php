<?php

namespace Zan\Framework\Network\Server\Middleware;


use Zan\Framework\Contract\Network\Request;
use Zan\Framework\Contract\Network\RequestTerminator;
use Zan\Framework\Contract\Network\Response;
use ZanPHP\Contracts\Debugger\Tracer;
use ZanPHP\Coroutine\Context;

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