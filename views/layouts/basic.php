<?php
// Підключення необхідне для доступу до файлів стилів та скриптів, підключених у AppAsset.
use app\assets\AppAsset;
use yii\helpers\Html;

// Виклик методу register для реєстрації об'єкту this, щоб ми могли використовувати його у шаблоні та виді.
AppAsset::register($this);
?>
    <!--Щоб шаблон працював коректно, необхідно додати мітки по типу  $this->beginBody()-->
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Доданий мета-тег для реалізації адаптивного додатку-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Генерація спеціального токену. З ним можна відправляти ajax POST запити-->
        <!--        --><?php //= Html::csrfMetaTags() ?>
        <!--        <title>Document</title>-->
        <title><?= $this->title; ?></title>

        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="nav-item"
                    style="background-color: #a2e1fb; border-radius: 5px; padding: 10px 20px; margin-right: 12px;">
                    <?= Html::a('Home', '/web') ?>
                </li>
                <li class="nav-item"
                    style="background-color: #a2e1fb; border-radius: 5px; padding: 10px 20px; margin-right: 12px;">
                    <?= Html::a('Posts', ['post/index']) ?>
                </li>
                <li class="nav-item" style="background-color: #a2e1fb; border-radius: 5px; padding: 10px 20px;">
                    <?= Html::a('Post', ['post/show']) ?>
                </li>
            </ul>
            <!--Виводимо вміст блоку, який ми прописувати у екшені-->
            <!--            --><?php //debug($this->blocks); ?>

            <?php if (isset($this->blocks['block1'])): ?>
                <?php echo $this->blocks['block1']; ?>
            <?php endif; ?>

            <!--            Альтернатива-->

            <?php
            if (isset($this->blocks['block1'])) {
                echo $this->blocks['block1'];
            }
            ?>

            <!-- Види - це динамічна, контентна частина,яка змінюється на сторінці та підключається до шаблону.-->
            <!-- Для виводу контентної частини необхідно вивести змінну content, у якій зберігається контент сторінки.-->
            <!-- Необхідно для виводу змісту екшенів-->
            <?= $content ?>
        </div>
        <?php $this->endBody() ?>
    </main>
    </body>
    </html>
<?php $this->endPage() ?>