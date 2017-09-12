<?php

namespace Zan\Framework\Network\Server\WorkerStart;

class InitializeServiceChain
{
    private $InitializeServiceChain;

    public function __construct()
    {
        $this->InitializeServiceChain = new \ZanPHP\ServerBase\WorkerStart\InitializeServiceChain();
    }

    public function bootstrap($server, $workerId)
    {
        $this->InitializeServiceChain->bootstrap($server, $workerId);
    }
}