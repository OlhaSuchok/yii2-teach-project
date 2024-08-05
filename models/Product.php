<?php

namespace app\models;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

//    public function getCategories()
//    {
//        // Першим параметром передаємо ім'я класу, з яким повязуємо, а другим параметром - ключ з полем цієї ж таблиці
//        // category_id - властивість таблиці category, а id - властиввсть таблиці product
//        // hasOne повертає один обєкт, або null, якщо нічого не знайдено
//        return $this->hasOne(Category::class, ['id' => 'category_id']);
//    }

}