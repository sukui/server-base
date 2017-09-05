<?php

namespace ZanPHP\ServerBase;

use RuntimeException;
use swoole_http_server as SwooleHttpServer;
use swoole_server as SwooleTcpServer;
use swoole_websocket_server as SwooleWebSocketServer;
use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Server\Factory as FactoryContract;
use ZanPHP\Support\Di;

class Factory implements FactoryContract
{
    private $configName;
    private $host;
    private $port;
    private $serverConfig;

    public function __construct($configName)
    {
        $this->configName = $configName;
    }

    private function validConfig()
    {
        $repository = make(Repository::class);
        $config = $repository->get($this->configName);
        if (empty($config)) {
            throw new RuntimeException('server config not found, see: http://zanphpdoc.zanphp.io/config/server.html');
        }

        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->serverConfig = $config['config'];
        if (empty($this->host) || empty($this->port)) {
            throw new RuntimeException('server config error: empty ip/port, see: http://zanphpdoc.zanphp.io/config/server.html');
        }

        // 强制关闭swoole worker自动重启(未考虑请求处理完), 使用zan框架重启机制
        $this->serverConfig["max_request"] = 0;
    }

    /**
     * @return \Zan\Framework\Network\Http\Server
     */
    public function createHttpServer()
    {
        $this->validConfig();

        $swooleServer = Di::make(SwooleHttpServer::class, [$this->host, $this->port], true);

        $server = make("ServerBase.HttpServer", [$swooleServer, $this->serverConfig]);

        return $server;
    }

    /**
     * @return \Zan\Framework\Network\Tcp\Server
     */
    public function createTcpServer()
    {
        $this->validConfig();

        $swooleServer = Di::make(SwooleTcpServer::class, [$this->host, $this->port], true);

        $server = make("ServerBase.TcpServer", [$swooleServer, $this->serverConfig]);

        return $server;
    }

    /**
     * @return \Zan\Framework\Network\MqSubscribe\Server
     */
    public function createMqServer()
    {
        $this->validConfig();

        $swooleServer = Di::make(SwooleHttpServer::class, [$this->host, $this->port], true);

        $server = make("ServerBase.MqServer", [$swooleServer, $this->serverConfig]);

        return $server;
    }

    /**
     * @return \Zan\Framework\Network\Http\WebSocketServer
     */
    public function createWebSocketServer()
    {
        $this->validConfig();

        if (isset($this->serverConfig['dispatch_mode'])) {
            if ($this->serverConfig['dispatch_mode'] == 1 || $this->serverConfig['dispatch_mode'] == 3) {
                sys_error("dispatch_mode can not be set 1 or 3 in websocket server, change it to default(2)");
                unset($this->serverConfig['dispatch_mode']);
            }
        }
        $swooleServer = Di::make(SwooleWebSocketServer::class, [$this->host, $this->port], true);

        $server = make("ServerBase.WSServer", [$swooleServer, $this->serverConfig]);

        return $server;
    }
}