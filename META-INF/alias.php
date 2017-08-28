<?php


return [
    \ZanPHP\ServerBase\Middleware\AsyncTaskTerminator::class => \Zan\Framework\Network\Server\Middleware\AsyncTaskTerminator::class,
    \ZanPHP\ServerBase\Middleware\CacheTerminator::class => \Zan\Framework\Network\Server\Middleware\CacheTerminator::class,
    \ZanPHP\ServerBase\Middleware\ClearContextTerminator::class => \Zan\Framework\Network\Server\Middleware\ClearContextTerminator::class,
    \ZanPHP\ServerBase\Middleware\DbTerminator::class => \Zan\Framework\Network\Server\Middleware\DbTerminator::class,
    \ZanPHP\ServerBase\Middleware\DebuggerTraceFilter::class => \Zan\Framework\Network\Server\Middleware\DebuggerTraceFilter::class,
    \ZanPHP\ServerBase\Middleware\DebuggerTraceTerminator::class => \Zan\Framework\Network\Server\Middleware\DebuggerTraceTerminator::class,
    \ZanPHP\ServerBase\Middleware\MiddlewareConfig::class => \Zan\Framework\Network\Server\Middleware\MiddlewareConfig::class,
    \ZanPHP\ServerBase\Middleware\MiddlewareInitiator::class => \Zan\Framework\Network\Server\Middleware\MiddlewareInitiator::class,
    \ZanPHP\ServerBase\Middleware\MiddlewareManager::class => \Zan\Framework\Network\Server\Middleware\MiddlewareManager::class,
    \ZanPHP\ServerBase\Middleware\RpcContextFilter::class => \Zan\Framework\Network\Server\Middleware\RpcContextFilter::class,
    \ZanPHP\ServerBase\Middleware\ServiceChainFilter::class => \Zan\Framework\Network\Server\Middleware\ServiceChainFilter::class,
    \ZanPHP\ServerBase\Middleware\TraceFilter::class => \Zan\Framework\Network\Server\Middleware\TraceFilter::class,
    \ZanPHP\ServerBase\Middleware\TraceTerminator::class => \Zan\Framework\Network\Server\Middleware\TraceTerminator::class,
    \ZanPHP\ServerBase\Middleware\WorkerTerminator::class => \Zan\Framework\Network\Server\Middleware\WorkerTerminator::class,

    \ZanPHP\ServerBase\ServerStart\InitLogConfig::class => \Zan\Framework\Network\Server\ServerStart\InitLogConfig::class,

    \ZanPHP\ServerBase\WorkerStart\InitializeConnectionPool::class => \Zan\Framework\Network\Server\WorkerStart\InitializeConnectionPool::class,
    \ZanPHP\ServerBase\WorkerStart\InitializeErrorHandler::class => \Zan\Framework\Network\Server\WorkerStart\InitializeErrorHandler::class,
    \ZanPHP\ServerBase\WorkerStart\InitializeEtcdTTLRefreshing::class => \Zan\Framework\Network\Server\WorkerStart\InitializeEtcdTTLRefreshing::class,
    \ZanPHP\ServerBase\WorkerStart\InitializeHawkMonitor::class => \Zan\Framework\Network\Server\WorkerStart\InitializeHawkMonitor::class,
    \ZanPHP\ServerBase\WorkerStart\InitializeServerDiscovery::class => \Zan\Framework\Network\Server\WorkerStart\InitializeServerDiscovery::class,
    \ZanPHP\ServerBase\WorkerStart\InitializeServiceChain::class => \Zan\Framework\Network\Server\WorkerStart\InitializeServiceChain::class,
    \ZanPHP\ServerBase\WorkerStart\InitializeWorkerMonitor::class => \Zan\Framework\Network\Server\WorkerStart\InitializeWorkerMonitor::class,

    \ZanPHP\ServerBase\Factory::class => \Zan\Framework\Network\Server\Factory::class,
    \ZanPHP\ServerBase\ServerBase::class => \Zan\Framework\Network\Server\ServerBase::class,

];