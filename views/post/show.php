<h1>Show Action / Вивід даних із бази даних</h1>

<!--Вивід категорій та повязаних із нею продуктів-->
<?php //debug($cats); ?>

<!--Чому products, а не product ?? Оскільки метод іменовано як getProducts у Category-->
<!--Коли ми звертаємося до властивості products у нас відбувається ще один запит -->
<!--Це називається ліниве завантаження, або відкладене. Звязок таблиць використовується лише в момент використання, звернення до звязаної моделі-->
<!--При зверненні до $cats->products, фактично виконано ось цей запит - SELECT * FROM `product` WHERE `category_id`=7-->
<!--Якщо ми працюємо з одним обєктом - то ліниве завантаження - це ок, але якщо запит повертає нам масив з деквлькома об'єктами, по яким ми проходимося в циклі, то фактичнона кожен об'єкт буде свій SQL запит.  -->
<!--У таких випадках використовується жадне завантаження -->

<?php //echo count($cats->products); ?>
<!--Звернення до багатовимірного масиву -->
<?php //echo count($cats[0]->products); ?>
<?php //debug($cats); ?>

<!--Вивід категорії та продуктів, які наделать цій категорії-->
<?php foreach ($cats as $cat): ?>
    <ul>
        <li><?= $cat->name ?></li>
        <?php
        // Використовуємо відкладене завантаження
        $products = $cat->products;
        ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?= $product->name ?></li>
            <?php endforeach; ?>
        </ul>
    </ul>
<?php endforeach; ?>


<?php //foreach ($cats as $cat): ?>
<!--    <p>--><?php //= $cat->name ?><!--</p>-->
<?php //endforeach; ?>


    <!--Варіант визначення заголовку сторінки у виді-->
    <?php //$this->title = 'Одна стаття'; ?>

    <!--Вивід даних із бази даних-->
    <?php //debug($posts); ?>

    <!--Вивід обєкту-->
<!--    --><?php //foreach ($posts as $post): ?>
<!--        <h2>--><?php //= $post->title ?><!--</h2>-->
<!--        <p>--><?php //= $post->content ?><!--</p>-->
<!--    --><?php //endforeach; ?>

    <!--Якщо повертаємо значення об'єкту -->
    <?php //foreach ($posts as $post): ?>
    <!--    <h2>--><?php //= $post['title'] ?><!--</h2>-->
    <!--    <p>--><?php //= $post['content'] ?><!--</p>-->
    <!--    <p>--><?php //= $post['author_id'] ?><!--</p>-->
    <!--    <p>--><?php //= $post['published_at'] ?><!--</p>-->
    <!--    <p>--><?php //= $post['status'] ?><!--</p>-->
    <?php //endforeach; ?>

    <!--Якщо повертаємо вивід одномірного масиву -->
    <?php //if ($posts): ?>
    <!--    <h2>--><?php //= $posts->title ?><!--</h2>-->
    <!--    <p>--><?php //= $posts->content ?><!--</p>-->
    <!--    <p>--><?php //= $posts->author_id ?><!--</p>-->
    <?php //else: ?>
    <!--    <p>Пост з вказаним author_id не знайдено.</p>-->
    <?php //endif; ?>

    <!--Метод для передачі даних із виду у шаблон. Виводимо у шаблоні-->
    <?php //$this->beginBlock('block1'); ?>
    <!--Тут вміст блоку-->
    <!--<h3>Заголовок сторінки всередині блоку</h3>-->
    <?php //$this->endBlock(); ?>


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
