<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Tcp\TcpRequest;
use ZanPHP\Contracts\Http\HttpRequest;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;
use ZanPHP\RpcContext\RpcContext;

class RpcContextFilter implements RequestFilter
{
    public function doFilter(Request $request, Context $context)
    {
        /** @var RpcContext $rpcCtx */
        $rpcCtx = null;
        if ($request instanceof TcpRequest) {
            $rpcCtx = $request->getRpcContext();
        } else if ($request instanceof HttpRequest) {
            $rpcCtx = new RpcContext();
        }

        if ($rpcCtx) {
            $context->merge($rpcCtx->get(), false);
            $context->set("rpc-context", $rpcCtx);
        }
    }
}