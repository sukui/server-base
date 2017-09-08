<?php

namespace Zan\Framework\Network\Server\Middleware;

class MiddlewareInitiator
{
    private $MiddlewareInitiator;

    public function __construct()
    {
        $this->MiddlewareInitiator = new \ZanPHP\ServerBase\Middleware\MiddlewareInitiator();
    }

    public function initConfig(array $config = [])
    {
        $this->MiddlewareInitiator->initConfig($config = []);
    }

    public function initExceptionHandlerConfig(array $exceptionHandlerConfig)
    {
        $this->MiddlewareInitiator->initExceptionHandlerConfig($exceptionHandlerConfig);
    }

    public function initZanFilters(array $zanFilters = [])
    {
        $this->MiddlewareInitiator->initZanFilters($zanFilters);
    }

    public function initZanTerminators(array $zanTerminators = [])
    {
        $this->MiddlewareInitiator->initZanTerminators($zanTerminators);
    }
} 