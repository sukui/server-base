<?php
/**
 * Created by IntelliJ IDEA.
 * User: Demon
 * Date: 16/5/10
 * Time: 上午9:35
 */

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Http\HttpRequest;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Contracts\Tcp\TcpRequest;
use ZanPHP\Contracts\Trace\Constant;
use ZanPHP\Contracts\WebSocket\WebSocketRequest;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;
use ZanPHP\Trace\Trace;

class TraceTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        /** @var Trace $trace */
        $trace = $context->get('trace');
        $traceHandle = $context->get('traceHandle');

        if ($trace == null) {
            return;
        }

        if ($request instanceof TcpRequest) {
            $data = $request->getArgs();
        } else if ($request instanceof HttpRequest) {
            $data = $request->getUri();
        } else if ($request instanceof WebSocketRequest) {
            $data = $request->getData();
        } else {
            $data = '';
        }

        if (method_exists($response, 'getException')) {
            $exception = $response->getException();
            if ($exception) {
                $trace->commit($traceHandle, $exception->getTraceAsString(), $data);
            } else {
                $trace->commit($traceHandle, Constant::SUCCESS,$data);
            }
        } else {
            $trace->commit($traceHandle, Constant::SUCCESS,$data);
        }

        //send数据
        yield $trace->send();
    }
}