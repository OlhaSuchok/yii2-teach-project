<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

// Підключення бібліотеки функцій
// __DIR__ - поточне розміщення файлу index.php
require __DIR__ . '/../functions.php';

(new yii\web\Application($config))->run();


/*
 У папці views/site лежать Види контроллера SiteController,
 у папці views/my лежать Види контроллера MyController, і так далі...

 У папці views/layouts знаходиться шаблон main.php, який є шаблоном, що якого підключаються види.
 Шаблонів може бути багато, наприклад при наявності сторінок з різним дизайном, по одному шаблону на сторінку,
 де ми використовуємо різні стилі та скрипти.

 Змінити шаблон або підключити потрібний шаблон можна декількома способами:
 - глобально у файлі config/web.php, за допомогою ключа layout, значенням якого є ім'я шаблону.

 Стилі та cкрипти підключаються у папці assets файлі AppAsset.php.

 Види - це динамічна частина шаблону, контентна частина, яка змінюється на сторінці.
 */