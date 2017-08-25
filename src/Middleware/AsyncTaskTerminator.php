<?php

namespace ZanPHP\ServerBase\Middleware;

use ZanPHP\Contracts\Network\Request;
use ZanPHP\Contracts\Network\Response;
use ZanPHP\Coroutine\Context;
use ZanPHP\Framework\Contract\Network\RequestTerminator;

class AsyncTaskTerminator implements RequestTerminator
{
    public function terminate(Request $request, Response $response, Context $context)
    {
        $callbacks = $context->get('async_task_queue');
        if (empty($callbacks)) {
            yield null;
            return;
        }
        for ($i = 0, $l = count($callbacks); $i < $l; $i++) {
            if (is_callable($callbacks[$i])) {
                yield call_user_func($callbacks[$i]);
            }
        }
        $context->set('async_task_queue', []);
        yield null;
    }
}
