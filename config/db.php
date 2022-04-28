<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=weather',
    'username' => 'postgres',
    'password' => '1234',
    'schemaMap' => [
        'pgsql' => 'tigrov\pgsql\Schema',
    ],
        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
];
