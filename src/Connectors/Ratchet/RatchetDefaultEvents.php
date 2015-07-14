<?php namespace Prhost\Phreal\Connectors\Ratchet;

use Prhost\Phreal\Core\ConnectionManager;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/8/2015
 * Time: 1:38 PM
 */
class RatchetDefaultEvents implements MessageComponentInterface {

    /**
     * @var ConnectionManager
     */
    private $connectionManager;

    public function __construct() {
        $this->connectionManager = new ConnectionManager();
    }

    public function onOpen(ConnectionInterface $conn){

        $genericConnection = new RatchetConnectionGeneralizer($conn);

        $connection = $genericConnection->getConnection();
        $uniqueId   = $genericConnection->getId();

        $this->connectionManager->addConnection($connection,$uniqueId);

    }

    public function onMessage(ConnectionInterface $from, $msg) {

        $genericConnection  = new RatchetConnectionGeneralizer($from);
        $connection         = $genericConnection->getConnection();

        foreach ($this->connectionManager->getAll() as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {

        $genericConnection = new RatchetConnectionGeneralizer($conn);

        $uniqueId   = $genericConnection->getId();

        $this->connectionManager->removeConenction($uniqueId);

    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}