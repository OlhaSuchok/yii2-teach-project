<?php

namespace app\controllers\admin;
// Якщо створюваний контроллер знаходиться не в одному просторі імен з наслідуваним контроллером, то його потрібно імпортувати
use app\controllers\AppController;

class UserController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }



}