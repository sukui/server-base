<?php
/**
 * Created by PhpStorm.
 * User: heize
 * Date: 16/4/26
 * Time: 下午2:08
 */

namespace ZanPHP\ServerBase\WorkerStart;

use ZanPHP\Container\Container;
use ZanPHP\Contracts\Foundation\Bootable;
use ZanPHP\Hawk\Hawk;
use ZanPHP\Contracts\Hawk\Hawk as HawkContract;

class InitializeHawkMonitor implements Bootable
{
    public function bootstrap($server)
    {
        $container = Container::getInstance();
        $container->instance(HawkContract::class, Hawk::getInstance());
        Hawk::getInstance()->run($server);
    }

}