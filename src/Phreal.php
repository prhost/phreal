<?php

namespace Prhost\Phreal;

use Prhost\Phreal\Core\ConnectionManager;

class Phreal
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        $class = $this->config();
        $conector = new $class['connector'];

        $conn = new ConnectionManager($conector);
    }

    public function config()
    {
        return [
            'conenctor' => new Connectors\RatchetConnector
        ];
    }
}


$socketLoucura = new \Phreal();