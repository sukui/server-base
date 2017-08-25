<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Container\Container;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\ServiceChain\ServiceChainer;
use Zan\Framework\Network\Tcp\Request as TcpRequest;
use Zan\Framework\Network\Http\Request\Request as HttpRequest;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;
use ZanPHP\RpcContext\RpcContext;

class ServiceChainFilter implements RequestFilter
{
    public function doFilter(Request $request, Context $context)
    {
        $container = Container::getInstance();

        if ($container->has(ServiceChainer::class)) {

            $chainValue = null;

            /** @var ServiceChainer $serviceChain */
            $serviceChain = $container->make(ServiceChainer::class);
            $context->set("service-chain", $serviceChain);

            /** @var RpcContext $rpcCtx */
            $rpcCtx = $context->get("rpc-context");

            if ($request instanceof TcpRequest) {
                $chainValue = $serviceChain->getChainValue(ServiceChainer::TYPE_TCP, $rpcCtx->get());
            } else if ($request instanceof HttpRequest) {
                $swooleRequest = $context->get("swoole_request");
                $chainValue = $serviceChain->getChainValue(ServiceChainer::TYPE_HTTP, $swooleRequest->header);
            }

            if (empty($chainValue) && getenv("ZAN_JOB_MODE")) {
                $chainValue = $serviceChain->getChainValue(ServiceChainer::TYPE_JOB);
            }

            if (!empty($chainValue)) {
                $novaKey = $serviceChain->getChainKey(ServiceChainer::TYPE_TCP);
                $httpKey = $serviceChain->getChainKey(ServiceChainer::TYPE_HTTP);

                $rpcCtx->set($novaKey, $chainValue);
                $rpcCtx->set($httpKey, $chainValue);

                $context->set("service-chain-value", $chainValue);
                if (isset($chainValue["name"])) {
                    $context->set("service-chain-name", $chainValue["name"]);
                }
            }
        }
    }
}