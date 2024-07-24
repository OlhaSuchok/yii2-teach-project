<!--Варіант визначення заголовку сторінки у виді-->
<?php //$this->title = 'Одна стаття'; ?>

<!--Метод для передачі даних із виду у шаблон. Виводимо у шаблоні-->
<?php $this->beginBlock('block1'); ?>
<!--Тут вміст блоку-->
<h3>Заголовок сторінки всередині блоку</h3>
<?php $this->endBlock(); ?>

<h1>Show Action / Content basic</h1>

<button class="btn btn-success" id="btn">Click me...</button>

<!--Реєстрація файлу скриптів тільки до екшену show-->
<!--Другим параметром ми передаємо залежності нашого скрипту-->
<?php
//$this->registerJsFile('@web/js/scripts.js', ['depends' => ['yii\web\YiiAsset']]);
//?>

<!--Реєстрація скрипту. Доцільно, коли скрипт не великий і використання пілключення усього файлу не є розумним-->
<!--Використання подвійних кавичок або екранування -->
<!--POS_LOAD - чекає повного завантаження документу-->
<?php
//$this->registerJs("$('.container').append('<p>SHOW registerJs from jQuery!!!</p>')", \yii\web\View::POS_LOAD);
//?>

<!--Руєстрація блоку коду зі стилями. За замовчуванням підключається перед закриваючим тегом head-->
<?php $this->registerCss(".container {background: #ccc;} ") ?>


<!--Хередок (heredoc) в PHP - це спосіб визначення строкових літералів, -->
<!--який дозволяє вставляти текст у змінну або виводити його без необхідності екранувати лапки та спеціальні символи. -->
<!--Цей синтаксис особливо корисний для створення багаторядкових текстів, -->
<!--таких як HTML-розмітка, SQL-запити або навіть великі фрагменти коду.-->

<?php
$js = <<<JS
$("#btn").click(function(){
    // ajax запит
    $.ajax({
    url: 'index.php?r=post/index',
    data: {test: 123},
    type: 'POST',
    success: function (res) {
        console.log(res);
    },
    error: function () {
        alert("error");
    }
    })
})
JS;

//$js = <<<JS
//$("#btn").click(function(){
//    // ajax запит
//    $.ajax({
//    url: 'index.php?r=post/index',
//    data: {test: 123},
//    type: 'POST',
//    success: function (res) {
//        console.log(res);
//    },
//    error: function () {
//        alert("error");
//    }
//    })
//})
//JS;

// Реєстрація скрипта
$this->registerJs($js);
?>
