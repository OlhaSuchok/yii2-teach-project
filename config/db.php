<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . env('MYSQL_HOST') . ';dbname=' . env('MYSQL_DB_NAME'),
    'username' => env('MYSQL_USERNAME', 'user'),
    'password' => env('MYSQL_PASSWORD', 'querty123'),
    'charset' => 'utf8mb4',

    // Опції кешування схеми
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'schemaCache' => 'cache',
];

