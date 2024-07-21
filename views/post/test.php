<h1>Test Action</h1>

<?php

// Отримання доступу до функції, яка описана у AppController
// Об'єкт Yii доступний глобально у Виді. Тобто не потрібно імпортувати Yii (use Yii), як ми це робили у AppController
\app\controllers\debug(Yii::$app);