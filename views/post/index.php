<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Index Action</h1>

<?php
// Розпаковка моделі
//debug($model);
?>


<!--Створення форми-->
<?php
//$form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]);
//?>
<?php
$form = ActiveForm::begin(['options' => ['id' => 'testForm']]);
?>
<?php //= $form->field($model, 'name')->label("Ім'я") ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?=Html::submitButton('Submit', ['class' => 'btn btn-success'])?>
<?php
ActiveForm::end();
?>
