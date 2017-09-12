<?php

namespace Zan\Framework\Network\Server;

use ZanPHP\Contracts\Server\Factory as FactoryContract;

class Factory implements FactoryContract
{
    private $Factory;

    public function __construct($configName)
    {
        $this->Factory = new \ZanPHP\ServerBase\Factory($configName);
    }

    public function createHttpServer()
    {
        $this->Factory->createHttpServer();
    }

    public function createTcpServer()
    {
        $this->Factory->createTcpServer();
    }

    public function createMqServer()
    {
        $this->Factory->createMqServer();
    }

    public function createWebSocketServer()
    {
        $this->Factory->createWebSocketServer();
    }
}