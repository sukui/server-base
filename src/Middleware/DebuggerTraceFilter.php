<?php

namespace ZanPHP\ServerBase\Middleware;

use Zan\Framework\Network\Http\Request\Request as HttpRequest;
use Zan\Framework\Network\Tcp\Request as TcpRequest;
use ZanPHP\Container\Container;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Debugger\Tracer;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Trace\Constant;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;

/**
 * Class DebuggerTraceFilter
 * @package Zan\Framework\Network\Server\Middleware
 *
 * TODO 利用SPI自动添加Filter
 */
class DebuggerTraceFilter implements RequestFilter
{
    public function doFilter(Request $request, Context $context)
    {
        $repository = make(Repository::class);
        $debug = $repository->get('debug');
        if ($debug && Container::getInstance()->has(Tracer::class)) {
            $this->init($request, $context);
        }
    }

    private function init(Request $request, Context $context)
    {
        if ($request instanceof HttpRequest) {
            $req = [
                "post" => $request->request->all(),
                "get" => $request->query->all(),
                "cookie" => $request->cookies->all(),
            ];
            $ctx = $req["get"] + $req["post"] + $request->headers->all();
            $name = $request->getMethod() . '-' . $request->getUrl();
            $type = Constant::HTTP;
        } else if ($request instanceof TcpRequest) {
            $req = $request->getArgs();
            $ctx = $request->getRpcContext()->get();
            $name = $request->getServiceName() . '.' . $request->getMethodName();
            $type = Constant::NOVA;
        } else {
            return;
        }

        /** @var Tracer $trace */
        $trace = make(Tracer::class);

        if ($trace->parseTraceURI($ctx)) {
            $trace->beginRequest($type, "$name", $req);
            $context->set("debugger_trace", $trace);
        }
    }

}