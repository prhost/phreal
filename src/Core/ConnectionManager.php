<?php
/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/10/2015
 * Time: 12:28 PM
 */

namespace Prhost\Phreal\Core;


use Prhost\Phreal\Connectors\Ratchet\RatchetConnectionGeneralizer;

class ConnectionManager
{

    /**
     * @var \SplObjectStorage
     */
    private $connectedClients;

    public function __construct()
    {
        $this->connectedClients = array();
    }

    public function addConnection($connection,$index)
    {

        $this->connectedClients[$index] = $connection;
        return $index;
    }

    public function retrieveConnection($index)
    {
        return $this->connectedClients[$index];
    }

    public function removeConenction($index)
    {
        unset($this->connectedClients[$index]);
    }

}