<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class ClearContextTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        $context = (yield getContextObject());
        if ($context instanceof Context) {
            $context->clear();
        }
        unset($context);
        $context = null;
    }
}

