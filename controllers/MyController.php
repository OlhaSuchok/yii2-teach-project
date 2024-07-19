<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller
{
//    Отримання id з адресного рядка. За замовчуванням ставимо null
    public function actionIndex($id = null)
    {
// Тепер змінна доступа у нашому шаблоні - index
        $hi = 'Hello, world!';
        $names = ['John', 'Doe', 'Lilly', 'Jenny', 'Robby'];

        if (!$id) $id = 'test123';

// return $this->render('index', ['hello' => $hi, 'names' => $names]);
// Ще один спосіб передачі даннних
        return $this->render('index', compact('hi', 'names', 'id'));
    }
}