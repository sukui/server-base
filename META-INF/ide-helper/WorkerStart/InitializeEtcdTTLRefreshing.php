<?php

namespace Zan\Framework\Network\Server\WorkerStart;

use ZanPHP\Contracts\Foundation\Bootable;

class InitializeEtcdTTLRefreshing implements Bootable
{
    private $InitializeEtcdTTLRefreshing;

    public function __construct()
    {
        $this->InitializeEtcdTTLRefreshing = new \ZanPHP\ServerBase\WorkerStart\InitializeEtcdTTLRefreshing();
    }

    public function bootstrap($server)
    {
        $this->InitializeEtcdTTLRefreshing->bootstrap($server);
    }
}