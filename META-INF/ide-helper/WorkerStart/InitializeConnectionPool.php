<?php

namespace Zan\Framework\Network\Server\WorkerStart;

use ZanPHP\Contracts\Foundation\Bootable;

class InitializeConnectionPool implements Bootable
{
    private $InitializeConnectionPool;

    public function __construct()
    {
        $this->InitializeConnectionPool = new \ZanPHP\ServerBase\WorkerStart\InitializeConnectionPool();
    }

    public function bootstrap($server)
    {
        $this->InitializeConnectionPool->bootstrap($server);
    }
}