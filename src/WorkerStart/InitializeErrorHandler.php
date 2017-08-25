<?php

namespace ZanPHP\ServerBase\WorkerStart;

use ErrorException;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Foundation\Bootable;

class InitializeErrorHandler implements Bootable
{

    public function bootstrap($server)
    {
        $repository = make(Repository::class);
        $debug = $repository->get('debug');
        if ($debug) {
            set_error_handler([self::class, 'handleError'], E_ALL & ~E_DEPRECATED);
        } else {
            set_error_handler([self::class, 'handleError'], E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);
        }
    }

    public static function handleError($code, $message, $file, $line) {
        $context = "catched an error! errno: $code, message: $message, file: $file:$line";
        sys_echo($context);
        throw new ErrorException($context, $code);
    }
}
