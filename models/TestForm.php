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

}