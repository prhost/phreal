<?php
/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/9/2015
 * Time: 12:53 PM
 */

namespace Prhost\Phreal\Core;


use Prhost\Phreal\Connectors\RatchetServer;

class ServerManager
{
    /**
     * @var RatchetServer
     */
    private $server;

    public function __construct(array $config)
    {

        $server         = new $config['default']['connector'];
        $server->port   = $config['default']['port'];
        $this->server = $server;
    }

    public function start()
    {
        $this->server->start();
    }
}