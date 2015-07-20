<?php
/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/10/2015
 * Time: 12:28 PM
 */

namespace Prhost\Phreal\Core;


use Prhost\Phreal\Connectors\Ratchet\RatchetConnectionGeneralizer;
use Prhost\Phreal\Messages\MessageIn;

class ConnectionManager
{

    /**
     * @var \SplObjectStorage
     */
    private static $connectedClients = null;



    public static function getInstance()
    {
        if(self::$connectedClients == null)
        {
            self::$connectedClients = new \SplObjectStorage();
        }

        return self::$connectedClients;
    }


    public static function addConnection($connection)
    {

        echo 'NEW DOIDÂO HAS BEN FOUND';
        self::getInstance()->attach($connection);
    }

    public static function remConnection($connection)
    {
        echo 'NEW DOIDÂO HAS GONE AWAY';
        self::getInstance()->detach($connection);
    }

    public static function onMessage($from,$message)
    {
        $messageIn = new MessageIn($message);
        $d = new Dispacher($from, $messageIn);
        $d->routeMessage();
    }

    public static function onError($from, \Exception $e)
    {
        echo $e->getMessage();
    }

}