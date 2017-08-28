<?php

namespace ZanPHP\ServerBase\WorkerStart;

use ZanPHP\ConnectionPool\ConnectionInitiator;
use ZanPHP\Contracts\Foundation\Bootable;

class InitializeConnectionPool implements Bootable
{
    public function bootstrap($server)
    {
        ConnectionInitiator::getInstance()->init('connection', $server);
    }
}