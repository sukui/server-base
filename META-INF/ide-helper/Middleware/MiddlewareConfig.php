<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;

class MiddlewareConfig
{
    private $MiddlewareConfig;

    public function __construct()
    {
        $this->MiddlewareConfig = new \ZanPHP\ServerBase\Middleware\MiddlewareConfig();
    }

    public function setConfig($config)
    {
        $this->MiddlewareConfig->setConfig($config);
    }

    public function setExceptionHandlerConfig(array $exceptionHandlerConfig)
    {
        $this->MiddlewareConfig->setExceptionHandlerConfig($exceptionHandlerConfig);
    }

    public function getExceptionHandlerConfig()
    {
        $this->MiddlewareConfig->getExceptionHandlerConfig();
    }

    public function setZanFilters(array $zanFilters)
    {
        $this->MiddlewareConfig->setZanFilters($zanFilters);
    }

    public function setZanTerminators(array $zanTerminators)
    {
        $this->MiddlewareConfig->setZanTerminators($zanTerminators);
    }

    public function getGroupValue(Request $request, $config)
    {
        $this->MiddlewareConfig->getGroupValue($request, $config);
    }

    public function getRequestFilters($request)
    {
        $this->MiddlewareConfig->getRequestFilters($request);
    }

    public function addExceptionHandlers($request, $filter)
    {
        $this->MiddlewareConfig->addExceptionHandlers($request, $filter);
    }

    public function match($pattern, $route)
    {
        $this->MiddlewareConfig->match($pattern, $route);
    }

    public function addBaseFilters($filters)
    {
        $this->MiddlewareConfig->addBaseFilters($filters);
    }

    public function addBaseTerminators($terminators)
    {
        $this->MiddlewareConfig->addBaseTerminators($terminators);
    }
}
