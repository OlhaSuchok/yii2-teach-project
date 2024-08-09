<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>Index Action</h1>

<?php
// Розпаковка моделі
//debug($model);
?>

<!-- Перевіряємо чи існує флеш і якщо так, то виводимо його -->
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Те ж саме у випадку помилки -->
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= Yii::$app->session->getFlash('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!--Створення форми-->
<?php
//$form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]);
//?>
<?php
$form = ActiveForm::begin(['options' => ['id' => 'testForm']]);
?>
<?php //= $form->field($model, 'name')->label("Ім'я") ?>
<?= $form->field($model, 'name')->input('text') ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
<?php
ActiveForm::end();
?>


<h2>Вивід створених повідомлень з бази даних</h2>

<!--Вивід створених повідомлень -->
<?php foreach ($messages as $message): ?>
<ul>
    <li>
        <?php echo $message->id; ?><br>
        <?php echo $message->name; ?><br>
        <?php echo $message->email; ?><br>
        <?php echo $message->text; ?><br>
        <?php echo $message->created_at; ?>
    </li>
</ul>
<?php endforeach; ?>