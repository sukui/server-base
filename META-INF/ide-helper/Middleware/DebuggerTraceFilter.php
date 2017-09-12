<?php

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;

class DebuggerTraceFilter implements RequestFilter
{
    private $DebuggerTraceFilter;

    public function __construct()
    {
        $this->DebuggerTraceFilter = new \ZanPHP\ServerBase\Middleware\DebuggerTraceFilter();
    }

    public function doFilter(Request $request, Context $context)
    {
        $this->DebuggerTraceFilter->doFilter($request, $context);
    }

}