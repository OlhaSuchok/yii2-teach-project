<?php

namespace app\models;


class Post extends \yii\db\ActiveRecord
{
// Якщо ми іменуємо модель за назвою таблиці, тільки з великої літери, то фреймворк актоматично звяже модель з таблицею, в іншому випадку - застосовуємо ось цей метод, у якому повертаємо назву таблиці
//    public static function tableName()
//    {
//        return 'post';
//    }

}