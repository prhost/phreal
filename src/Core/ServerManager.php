<?php
namespace Prhost\Phreal\Core;

use Prhost\Phreal\Connectors\RatchetServer;

/**
 * Class ServerManager
 * @package Prhost\Phreal\Core
 */
class ServerManager
{
    /**
     * @var RatchetServer
     */
    private $server;

    public function __construct(array $config)
    {

        $server = new $config['default']['connector'];
        $server->port = $config['default']['port'];
        $this->server = $server;
    }

    public function start()
    {
        $this->server->start();
    }
}