<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;

class MiddlewareManager
{
    private $MiddlewareManager;

    public function __construct(Request $request, Context $context)
    {
        $this->MiddlewareManager = new \ZanPHP\ServerBase\Middleware\MiddlewareManager($request, $context);
    }

    public function executeFilters()
    {
        $this->MiddlewareManager->executeFilters();
    }

    public function handleHttpException(\Exception $e)
    {
        $this->MiddlewareManager->handleHttpException($e);
    }

    public function handleException(\Exception $e)
    {
        $this->MiddlewareManager->handleException($e);
    }

    public function executePostFilters($response)
    {
        $this->MiddlewareManager->executePostFilters($response);
    }

    public function executeTerminators($response)
    {
        $this->MiddlewareManager->executeTerminators($response);
    }
}
