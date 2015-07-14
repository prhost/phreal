<?php

    require_once ('../../../autoload.php');

    $config = [
        'default' => [
            'port' => 1234,
            'connector' => '\Prhost\Phreal\Connectors\Ratchet\RatchetServer'
        ]
    ];

    $sManager = new \Prhost\Phreal\Core\ServerManager($config);
    $sManager->start();