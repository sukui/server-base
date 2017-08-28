<?php
/**
 * Created by PhpStorm.
 * User: heize
 * Date: 16/4/26
 * Time: 下午2:08
 */

namespace Zan\Framework\Network\Server\WorkerStart;

use Zan\Framework\Contract\Network\Bootable;
use Zan\Framework\Sdk\Monitor\Hawk;
use ZanPHP\Container\Container;

class InitializeHawkMonitor implements Bootable
{
    public function bootstrap($server)
    {
        $container = Container::getInstance();
        $container->instance(\ZanPHP\Contracts\Hawk\Hawk::class, Hawk::getInstance());
        Hawk::getInstance()->run($server);
    }

}