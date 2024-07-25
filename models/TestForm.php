<?php

namespace app\models;

use yii\base\Model;

// Якщо модель не буде працювати з бд, то її прийнято називати зі словом Form
class TestForm extends Model
{
    // Створюємо властивості форми
    public $name;
    public $email;
    public $text;

//    Альтернатива   $form->field($model, 'name')->label("Ім'я")
    public function attributeLabels()
    {
        return [
            'name' => "Ім'я",
            'email' => 'Пошта',
            'text' => 'Повідомлення',
        ];
    }


// Функція валідації

    public function rules()
    {
        return [
            // Або так
//            ['name', 'required'],
//            ['email', 'required'],
            // Або так
            [['name', 'email'], 'required', 'message' => "Обов'язкове поле."],
            // Валідація email
            ['email', 'email', 'message' => "Поле повинно бути поштовою адресою."],
            // Мінімальна кількість символів. Чомусь не виводиться повідомлення
            ['name', 'string', 'min' => 2, 'max' => 7, 'tooShort' => 'Поле повинно містити щонайменше 2 символи.', 'tooLong' => 'Поле повинно містити не більше 7 символів.'],
            ['name', 'string', 'length' => [2, 7]],
            // Власне правило для валідації поля name
            ['name', 'myValidateRule'],
            ['text', 'trim'],

        ];

    }

    // Не всі валідатори спрацьовують на клієнті, тільки на сервері
    public function myValidateRule($attrs)
    {
        if (!in_array($this->$attrs, ['hello', 'world'])) {
            $this->addErrors($attrs, 'Щось пішло не так.');
        }
    }

}