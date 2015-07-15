<?php namespace Prhost\Phreal\Connectors\Ratchet;

use Prhost\Phreal\Definitions\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;


/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/8/2015
 * Time: 1:22 PM
 */
class RatchetServer implements ConnectionInterface
{

    public $port;


    public function start()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new RatchetDefaultEvents()
                )
            ),
            $this->port
        );


        $server->run();
    }

}