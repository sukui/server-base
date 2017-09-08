<?php

namespace Zan\Framework\Network\Server\WorkerStart;

use ZanPHP\Contracts\Foundation\Bootable;

class InitializeErrorHandler implements Bootable
{
    private $InitializeErrorHandler;

    public function __construct()
    {
        $this->InitializeErrorHandler = new \ZanPHP\ServerBase\WorkerStart\InitializeErrorHandler();
    }

    public function bootstrap($server)
    {
        $this->InitializeErrorHandler->bootstrap($server);
    }

    public static function handleError($code, $message, $file, $line)
    {
       \ZanPHP\ServerBase\WorkerStart\InitializeErrorHandler::handleError($code, $message, $file, $line);
    }
}
