<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;

class RpcContextFilter implements RequestFilter
{
    private $RpcContextFilter;

    public function __construct()
    {
        $this->RpcContextFilter = new \ZanPHP\ServerBase\Middleware\RpcContextFilter();
    }

    public function doFilter(Request $request, Context $context)
    {
        $this->RpcContextFilter->doFilter($request, $context);
    }
}