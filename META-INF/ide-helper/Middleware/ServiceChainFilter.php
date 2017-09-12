<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;

class ServiceChainFilter implements RequestFilter
{
    private $ServiceChainFilter;

    public function __construct()
    {
        $this->ServiceChainFilter = new \ZanPHP\ServerBase\Middleware\ServiceChainFilter();
    }

    public function doFilter(Request $request, Context $context)
    {
        $this->ServiceChainFilter->doFilter($request, $context);
    }
}