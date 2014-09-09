<?php

return array(
    'doctrine' => array(
        'dbParams' => array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'slimApp',
        ),
        'annotation_path' => array(
            'src/model/entity'
        )
    ),
    'token' => array(
        'default_ttl' => '14400' //indica a quantidade padrão de segundos para a expiração de um token
    )
);
