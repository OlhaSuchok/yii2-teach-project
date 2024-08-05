<h1>My Controller actionIndex</h1>
<?=  $hi; ?>

<!--Короткий синтаксис-->
<?php //= $hello; ?>
<br>

<!--http://localhost/index.php?r=my/index&id=38-->
<!--http://localhost/my/index&id=38434384-->
<?= $id; ?>
<br>
<!--Вивід масиву імен -->
<?php
//print_r($names);

//Перебір масву імен методом foreeach
foreach ($names as $name) {
    echo $name . '<br/>';
}
