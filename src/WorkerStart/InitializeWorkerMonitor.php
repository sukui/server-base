<?php

namespace ZanPHP\ServerBase\WorkerStart;

use ZanPHP\Contracts\Config\Repository;
use ZanPHP\WorkerMonitor\WorkerMonitor;
use ZanPHP\Contracts\Foundation\Bootable;

class InitializeWorkerMonitor implements Bootable
{
    public function bootstrap($server)
    {
        $repository = make(Repository::class);
        $config = $repository->get('server.monitor');
        WorkerMonitor::getInstance()->init($server,$config);
    }
}