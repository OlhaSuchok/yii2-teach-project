<?php

namespace app\models;

use yii\db\ActiveRecord;

// Якщо модель не буде працювати з бд, то її прийнято називати зі словом Form
class TestForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'message';
    }

    public function attributeLabels()
    {
        return [
            'name' => "Ім'я",
            'email' => 'Пошта',
            'text' => 'Повідомлення',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'text'], 'required', 'message' => "Обов'язкове поле."],
            // Не додає правило валідації, однак робить його безпечним для запису в бд, однак використовувати потрібно обережно 
            ['email', 'safe'],
            // Також можга використовувати метод trim, для забезпечення проходження мінімальної валідації атрибутом 
            // ['email', 'trim']
            ['email', 'email', 'message' => "Поле повинно бути поштовою адресою."],
        ];

    }
}