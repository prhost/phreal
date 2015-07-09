<?php namespace Prhost\Phreal\Connectors;

use Prhost\Phreal\Definitions\ConnectionInterface;
use Ratchet\Server\IoServer;


/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/8/2015
 * Time: 1:22 PM
 */
class RatchetConnector implements ConnectionInterface
{
    public function __construct()
    {
        $server = IoServer::factory(
            new RatchetDefaultEvents(),
            8080
        );

        $server->run();
    }

}