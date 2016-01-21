<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => 'ADRESS',
                    'port' => '3306',
                    'user' => 'USER',
                    'password' => 'PASS',
                    'dbname' => 'DB',
                    'charset' => 'utf8',
                    'driverOptions' => array(
                        'charset' => 'UTF8'
                    )
                )))));