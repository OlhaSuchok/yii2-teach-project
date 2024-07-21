<?php

namespace app\controllers;

// Імпорт глобального об'єкту Yii
use Yii;

class PostController extends AppController
{
    public function actionTest()
    {

        $names = ['John', 'Doe', 'Lilly', 'Jenny', 'Robby'];

        // Функції для виводу масивів
        // print_r($names); // Array ( [0] => John [1] => Doe [2] => Lilly [3] => Jenny [4] => Robby )
        // var_dump($names); // array(5) { [0]=> string(4) "John" [1]=> string(3) "Doe" [2]=> string(5) "Lilly" [3]=> string(5) "Jenny" [4]=> string(5) "Robby" }

        // Вивід глобального об'єкту Yii, де app - це екземпляр додатку з методами, які ми можемо використовувати
        // var_dump(Yii::$app);

        // У даному випадку this посилається на AppController та виводить дані через метод debug, який розпаковує масив у читабельний формат
        // $this->debug(Yii::$app);

        // $this->debug($names);

        // Передача масиву $names другим параметром, для отримання доступу у файлі test.php
        // return $this->render('test', ['names' => $names]);
        return $this->render('test');
    }
}