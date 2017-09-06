<?php

namespace Zan\Framework\Network\Server\WorkerStart;

use ZanPHP\Contracts\Foundation\Bootable;

class InitializeWorkerMonitor implements Bootable
{
    private $InitializeWorkerMonitor;

    public function __construct()
    {
        $this->InitializeWorkerMonitor = new \ZanPHP\ServerBase\WorkerStart\InitializeWorkerMonitor();
    }

    public function bootstrap($server)
    {
        $this->InitializeWorkerMonitor->bootstrap($server);
    }

}