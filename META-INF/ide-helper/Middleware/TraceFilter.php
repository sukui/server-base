<?php
/**
 * Created by IntelliJ IDEA.
 * User: Demon
 * Date: 16/5/9
 * Time: 下午6:29
 */

namespace Zan\Framework\Network\Server\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestFilter;

class TraceFilter implements RequestFilter
{
    private $TraceFilter;

    public function __construct()
    {
        $this->TraceFilter = new \ZanPHP\ServerBase\Middleware\TraceFilter();
    }

    public function doFilter(Request $request, Context $context)
    {
        $this->TraceFilter->doFilter($request, $context);
    }
}