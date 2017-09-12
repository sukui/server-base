<?php

namespace Zan\Framework\Network\Server;

abstract class ServerBase
{

    protected function bootServerStartItem()
    {
        \ZanPHP\ServerBase\ServerBase::bootServerStartItem();
    }

    protected function bootWorkerStartItem($workerId)
    {
        \ZanPHP\ServerBase\ServerBase::bootWorkerStartItem($workerId);
    }

    public function start()
    {
        \ZanPHP\ServerBase\ServerBase::start();
    }

    protected function getCustomizedServerStartItems()
    {
        \ZanPHP\ServerBase\ServerBase::getCustomizedServerStartItems();
    }

    protected function getCustomizedWorkerStartItems()
    {
        \ZanPHP\ServerBase\ServerBase::getCustomizedWorkerStartItems();
    }

    protected function getPidFilePath()
    {
        \ZanPHP\ServerBase\ServerBase::getPidFilePath();
    }

    protected function removePidFile()
    {
        \ZanPHP\ServerBase\ServerBase::removePidFile();
    }

    protected function writePid($pid)
    {
        \ZanPHP\ServerBase\ServerBase::writePid($pid);
    }
}