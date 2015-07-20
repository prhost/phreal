<?php
/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/9/2015
 * Time: 1:18 PM
 */

namespace Prhost\Phreal\Connectors\Ratchet;

use Prhost\Phreal\Core\Connection;
use Prhost\Phreal\Messages\MessageOut;

class RatchetConnectionGeneralizer
{
    private $ratchetConnection;
    private $genericConnection;

    public function __construct( $ratchet )
    {
        $this->ratchetConnection = $ratchet;
        $this->genericConnection = new Connection();
    }

    public function send(MessageOut $msg){

}

    public function getConnection()
    {



        return $this->genericConnection;
    }

    public function getId()
    {
        return $this->ratchetConnection->resouceId;
    }

}