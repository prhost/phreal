<?php
/**
 * Created by PhpStorm.
 * User: H�lio
 * Date: 7/9/2015
 * Time: 1:17 PM
 */

namespace Prhost\Phreal\Connectors\Ratchet;


class RatchetMessageGeneralizer
{
    private $ratchetConnectionInstance;

    public function __construct( ConnectionInterface $ratchet )
    {
        $this->ratchetConnectionInstance = $ratchet;
    }


    public function getConnection()
    {
        return $this->ratchetConnectionInstance;
    }
}