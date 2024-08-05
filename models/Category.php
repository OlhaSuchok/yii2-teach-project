<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        // Першим параметром передаємо ім'я класу, з яким повязуємо, а другим параметром - ключ з полем цієї ж таблиці
        // category_id - властивість таблиці product, а id - властиввсть таблиці category
        // hasMany повертає масив обєктів
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}