<?php

namespace ZanPHP\ServerBase\Middleware;

use Zan\Framework\Network\Http\RequestExceptionHandlerChain;
use ZanPHP\Contracts\Foundation\ExceptionHandler;
use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;
use ZanPHP\Framework\Contract\Network\RequestPostFilter;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class MiddlewareManager
{
    private $middlewareConfig;
    private $request;
    private $context;
    private $middleware = [];

    public function __construct(Request $request, Context $context)
    {
        $this->middlewareConfig = MiddlewareConfig::getInstance();
        $this->request = $request;
        $this->context = $context;

        $this->initMiddleware();
    }

    public function executeFilters()
    {
        $middleware = $this->middleware;
        foreach ($middleware as $filter) {
            if (!$filter instanceof RequestFilter) {
                continue;
            }

            $response = (yield $filter->doFilter($this->request, $this->context));
            if (null !== $response) {
                yield $response;
                return;
            }
        }
    }

    public function handleHttpException(\Exception $e)
    {
        try {
            $handlerChain = array_filter($this->middleware, function($v) {
                return $v instanceof ExceptionHandler;
            });
            yield RequestExceptionHandlerChain::getInstance()->handle($e, $handlerChain);
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }

    }

    public function handleException(\Exception $e)
    {
        $middleware = $this->middleware;

        foreach ($middleware as $filter) {
            if (!$filter instanceof ExceptionHandler) {
                continue;
            }

            try {
                $e = (yield $filter->handle($e));
            } catch (\Throwable $t) {
                yield t2ex($t);
                return;
            } catch (\Exception $handlerException) {
                yield $handlerException;
                return;
            }
        }
        yield $e;
    }

    public function executePostFilters($response)
    {
        $middleware = $this->middleware;
        foreach ($middleware as $filter) {
            if (!$filter instanceof RequestPostFilter) {
                continue;
            }
            yield $filter->postFilter($this->request, $response, $this->context);
        }
    }

    public function executeTerminators($response)
    {
        try {
            $middleware = $this->middleware;
            foreach ($middleware as $filter) {
                if (!$filter instanceof RequestTerminator) {
                    continue;
                }
                yield $filter->terminate($this->request, $response, $this->context);
            }
        } catch (\Throwable $t) {
            echo_exception($t);
        } catch (\Exception $e) {
            echo_exception($e);
        }
    }

    private function initMiddleware()
    {
        $middleware = [];
        $groupValues = $this->middlewareConfig->getRequestFilters($this->request);
        $groupValues = $this->middlewareConfig->addExceptionHandlers($this->request, $groupValues);
        $groupValues = $this->middlewareConfig->addBaseFilters($groupValues);
        $groupValues = $this->middlewareConfig->addBaseTerminators($groupValues);
        foreach ($groupValues as $groupValue) {
            $objectName = $this->getObject($groupValue);
            $obj = new $objectName();
            $middleware[$objectName] = $obj;
        }
        $this->middleware = $middleware;
    }

    private function getObject($objectName)
    {
        return $objectName;
    }
}
