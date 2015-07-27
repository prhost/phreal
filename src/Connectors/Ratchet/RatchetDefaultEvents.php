<?php namespace Prhost\Phreal\Connectors\Ratchet;

use Prhost\Phreal\Core\ConnectionManager;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

/**
 * Created by PhpStorm.
 * User: H�lio
 * Date: 7/8/2015
 * Time: 1:38 PM
 */
class RatchetDefaultEvents implements MessageComponentInterface {


    public function onOpen(ConnectionInterface $conn){

        ConnectionManager::addConnection($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        ConnectionManager::onMessage($from,$msg);
    }

    public function onClose(ConnectionInterface $conn) {
        ConnectionManager::remConnection($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        ConnectionManager::onError($conn,$e);
    }
}