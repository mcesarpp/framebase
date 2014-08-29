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
    )
);
