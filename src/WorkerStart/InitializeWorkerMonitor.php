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
        $server_config = $repository->get('server.config');
        $config = $repository->get('server.monitor');
        $config['worker_num'] = $server_config['worker_num'];
        WorkerMonitor::getInstance()->init($server,$config);
    }
}