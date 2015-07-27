<?php
/**
 * Created by PhpStorm.
 * User: H�lio
 * Date: 7/10/2015
 * Time: 12:28 PM
 */

namespace Prhost\Phreal\Core;


use Prhost\Phreal\Connectors\Ratchet\RatchetConnectionGeneralizer;
use Prhost\Phreal\Messages\MessageIn;
use Prhost\Phreal\Messages\MessageOut;

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

        echo 'NEW DOIDAO HAS BEN FOUND';
        self::getInstance()->attach($connection);
    }

    public static function remConnection($connection)
    {
        echo 'NEW DOIDAO HAS GONE AWAY';
        self::getInstance()->detach($connection);
    }

    public static function onMessage($from,$message)
    {
        $messageIn = new MessageIn($message);
        $d = new Dispacher($from, $messageIn);
        $d->routeMessage();

        //example message out
        $messageOut = new MessageOut();
        $messageOut->setCode(200);
        $messageOut->setMessage('Ok');
        $messageOut->show($from);
    }

    public static function onError($from, \Exception $e)
    {
        $from->send($e->getMessage());
    }

}