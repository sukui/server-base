<?php

use ZanPHP\Container\Container;

$container = Container::getInstance();
$container->bind(\ZanPHP\Contracts\Server\Factory::class, function($configName) {
    return new \Zan\Framework\Network\Server\Factory($configName);
});


return [];