<?php

namespace ZanPHP\ServerBase\ServerStart;

use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Foundation\Bootable;
use ZanPHP\Log\Log;

class InitLogConfig implements Bootable
{

    public function bootstrap($server)
    {
        $repository = make(Repository::class);
        $configArray = $repository->get('log');
        if (!$configArray) {
            return true;
        }

        $this->initLog($configArray);
    }

    private function initLog($configArray)
    {
        foreach ($configArray as $key => $config) {
            Log::make($key);
        }
    }

}
