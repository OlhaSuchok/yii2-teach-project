<?php

namespace app\controllers;

// Якщо створюваний контроллер знаходиться в одному просторі імен з наслідуваним контроллером, то його не потрібно імпортувати
class MyController extends AppController
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

    /*
      Створення екшенів з подвійною назвою
    http://localhost/index.php?r=admin/user/index
    r - роут
    admin - назва папки у папці controllers
    user - назва контроллеру
    index - екшн у контроллері user
    Для actionBlogPost адреса - my/blog-post
    */
    public function actionBlogPost()
    {
        return 'Blog post';
    }
}