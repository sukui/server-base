<?php

namespace Zan\Framework\Network\Server\ServerStart;

use ZanPHP\Contracts\Foundation\Bootable;

class InitLogConfig implements Bootable
{
    private $InitLogConfig;

    public function __construct()
    {
        $this->InitLogConfig = new \ZanPHP\ServerBase\ServerStart\InitLogConfig();
    }

    public function bootstrap($server)
    {
        $this->InitLogConfig->bootstrap($server);
    }

}
