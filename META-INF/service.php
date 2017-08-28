<?php

use ZanPHP\Container\Container;

$container = Container::getInstance();
$container->bind(\ZanPHP\Contracts\Server\Factory::class, function($_, $args) {
    return new \Zan\Framework\Network\Server\Factory($args[0]);
});


return [];