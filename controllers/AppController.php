<?php

namespace app\controllers;

use yii\web\Controller;

// Даний контроллер буде наслідуваним усіма іншими контроллерами.
// Тут можна писати спільні для усіх контроллерів методи, які будуть використовуватися у наслідуваних контроллерах.
// Наприклад методи дебагінгу, які будуть структуровано розпаковувати масиви чи об'єкти
class AppController extends Controller
{

    public function debug($arr)
    {
        // print_r - метод для розпаковки масиву
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}