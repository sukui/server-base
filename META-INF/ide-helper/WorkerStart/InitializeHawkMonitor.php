<?php

namespace Zan\Framework\Network\Server\WorkerStart;

use ZanPHP\Contracts\Foundation\Bootable;

class InitializeHawkMonitor implements Bootable
{
    private $InitializeHawkMonitor;

    public function __construct()
    {
        $this->InitializeHawkMonitor = new \ZanPHP\ServerBase\WorkerStart\InitializeHawkMonitor();
    }

    public function bootstrap($server)
    {
        $this->InitializeHawkMonitor->bootstrap($server);
    }
}