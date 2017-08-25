<?php

namespace ZanPHP\ServerBase\Middleware;

use Zan\Framework\Network\Tcp\Request as TcpRequest;
use Zan\Framework\Network\Http\Request\Request as HttpRequest;
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