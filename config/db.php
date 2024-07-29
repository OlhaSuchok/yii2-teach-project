<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yiidb',
    'username' => 'yiiuser',  // ім'я користувача
    'password' => 'yourpassword',  // ваш пароль
    'charset' => 'utf8mb4',

    // Опції кешування схеми
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'schemaCache' => 'cache',
];
