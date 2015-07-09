<?php namespace Prhost\Phreal\Core;
use Prhost\Phreal\Connectors\RatchetConnector;
use Prhost\Phreal\Definitions\ConnectionInterface;

/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/8/2015
 * Time: 1:24 PM
 */
class ConnectionManager
{

    /**
     * @var ConnectionInterface
     */
    public $connector ;

    public function __construct(ConnectionInterface $connector){
        $this->connector = $connector;
    }




}