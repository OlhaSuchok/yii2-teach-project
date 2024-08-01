<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yiidb',
    'username' => 'olha_palienko',  // ім'я користувача
    'password' => 'olhaMdb1222022118',  // ваш пароль
    'charset' => 'utf8mb4',

    // Опції кешування схеми
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'schemaCache' => 'cache',
];
