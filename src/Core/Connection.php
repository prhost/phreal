<?php
/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/10/2015
 * Time: 12:35 PM
 */

namespace Prhost\Phreal\Core;


use Prhost\Phreal\Messages\MessageOut;

class Connection
{
    private $ratchetConnection;

    public function __construct($connection)
    {
        $this->ratchetConnection = $connection;
    }

    public function send(MessageOut $message)
    {
        $this->ratchetConnection->set();
    }
}