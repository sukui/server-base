<?php

namespace ZanPHP\ServerBase\WorkerStart;

use ZanPHP\EtcdRegistry\ServerDiscoveryInitiator;

class InitializeServerDiscovery
{
    /**
     * @param $server
     * @param $workerId
     */
    public function bootstrap($server, $workerId)
    {
        ServerDiscoveryInitiator::getInstance()->init($workerId);
    }
}