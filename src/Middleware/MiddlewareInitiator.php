<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Support\Singleton;

class MiddlewareInitiator
{
    use Singleton;

    public function initConfig(array $config = [])
    {
        $config['match'] = isset($config['match']) ? $config['match'] : [];
        MiddlewareConfig::getInstance()->setConfig($config);
    }

    public function initExceptionHandlerConfig(array $exceptionHandlerConfig)
    {
        $exceptionHandlerConfig['match'] = isset($exceptionHandlerConfig['match']) ? $exceptionHandlerConfig['match'] : [];
        MiddlewareConfig::getInstance()->setExceptionHandlerConfig($exceptionHandlerConfig);
    }

    public function initZanFilters(array $zanFilters = [])
    {
        MiddlewareConfig::getInstance()->setZanFilters($zanFilters);
    }

    public function initZanTerminators(array $zanTerminators = [])
    {
        MiddlewareConfig::getInstance()->setZanTerminators($zanTerminators);
    }
} 