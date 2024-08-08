<?php

namespace app\components;
use yii\base\Widget;

class MyWidget extends Widget
{

    public $name;

    // Оголошення параметрів за замовчуванням, у випадку, якщо у віджет нічого не передано
    public function init() {
        parent::init();

//        if($this->name === null) {
//            $this->name = 'Гість';
//        }

        // Буферизуємо контент, який знаходиться між MyWidget::begin() та MyWidget::end()
        ob_start();
    }

    public function run() {
        // return '<h1>Hello, world from Widget!<h1/>';
        // return $this->render('my', ['name' => $this->name]);

        // Поміщаємо у дану змінну увесь буферизований вивід. Тепер можемо маніпулювати контентом як хочемо
        $content = ob_get_clean();

        // Приводимо значення змінної до верхнього регістру
        $content = mb_strtoupper($content);

//        return $this->render('my', ['content' => $content]);
//        Альтернатива передачі значень
        return $this->render('my', compact('content'));
    }
}