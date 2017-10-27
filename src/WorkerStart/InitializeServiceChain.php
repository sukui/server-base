<?php

namespace ZanPHP\ServerBase\WorkerStart;

use ZanPHP\Container\Container;
use ZanPHP\Contracts\ServiceChain\ServiceChainer;

class InitializeServiceChain
{
    /**
     * @param $server
     * @param $workerId
     */
    public function bootstrap($server, $workerId)
    {
        // make & initialize discovering serviceChain
        if (getenv("runMode") === "online") {
            return;
        }

        $container = Container::getInstance();
        if ($container->has(ServiceChainer::class)) {
            $container->make(ServiceChainer::class);
        }
    }
}