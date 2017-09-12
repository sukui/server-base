<?php

namespace Zan\Framework\Network\Server\WorkerStart;

class InitializeServerDiscovery
{
    private $InitializeServerDiscovery;

    public function __construct()
    {
        $this->InitializeServerDiscovery = new \ZanPHP\ServerBase\WorkerStart\InitializeServerDiscovery();
    }

    public function bootstrap($server, $workerId)
    {
        $this->InitializeServerDiscovery->bootstrap($server, $workerId);
    }
}