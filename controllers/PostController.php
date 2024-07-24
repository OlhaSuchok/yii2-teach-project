<?php

namespace app\controllers;

// Імпорт глобального об'єкту Yii
use Yii;

class PostController extends AppController
{
// Функція відключення перевірки спеціального токену Html::csrfMetaTags()
    public function beforeAction($action)
    {
//        debug($action);

        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        // Повертаємо відпрацювання батьківського методу
        return parent::beforeAction($action);
    }

    /* Для усіх сторінок контроллеру Post буде використовуватися шаблон basic, а для всих інших контроллерів - шаблон main.
   Для цього необхідно написати наступний рядок.
*/
    public $layout = 'basic';

    // Екшн для виводу усіх постів
    public function actionIndex()
    {
        // Якщо ми хочемо встановити окремий шаблон для конкретного екшину, використовується наступний запис
        // $this->layout = 'basic';

        // Перевіряємо, чи прийшли дані методом ajax. Якщо так, то просто повертаємо рядок
        if (Yii::$app->request->isAjax) {
//            debug($_POST);
//            Також у Yii є спеціальний метод для розпаковки запитів. Його ми можемо використовувати як альтернативу debug
            debug(Yii::$app->request->post());
            return 'test';
        }
        return $this->render('index');
    }

    // Екшн для виводу конкретних постів
    public function actionShow()
    {
//        Варіант визначення заголовку сторінки у екшені
        $this->view->title = 'Якась стаття';
        // Формування мета-тегів та заповнення їх даними

        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'якийсь контент...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'опис сторінки...']);
        return $this->render('show');
    }

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