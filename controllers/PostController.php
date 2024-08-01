<?php

namespace app\controllers;

// Імпорт глобального об'єкту Yii
use Yii;
use app\models\TestForm;
use app\models\Post;

class PostController extends AppController
{
// Функція відключення перевірки спеціального токену Html::csrfMetaTags()
    public function beforeAction($action)
    {
//        debug($action);

        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        // Повертаємо відпрацювання батьківського методу
        return parent::beforeAction($action);
    }

    /* Для усіх сторінок контроллеру Post буде використовуватися шаблон basic, а для всих інших контроллерів - шаблон main.
   Для цього необхідно написати наступний рядок.
*/
    public $layout = 'basic';

    // Екшн для виводу усіх постів
    public function actionIndex()
    {
        // Якщо ми хочемо встановити окремий шаблон для конкретного екшину, використовується наступний запис
        // $this->layout = 'basic';

        // Перевіряємо, чи прийшли дані методом ajax. Якщо так, то просто повертаємо рядок
        if (Yii::$app->request->isAjax) {
//            debug($_POST);
//            Також у Yii є спеціальний метод для розпаковки запитів. Його ми можемо використовувати як альтернативу debug
            debug(Yii::$app->request->post());
            return 'test';
        }

        // Створення обєкту моделі
        $model = new TestForm();

        // Отримання даних форми на сервері
        // В Yii за замовчуванням діє правило, що усі атрибути у формі є не безпечними.
        // І якщо ми для атрибуту не вказали валідаційне правило, то вони не будуть завантажені у нашу модель
        // Тому для всіх полів потрібно вказати правило валідації, або валідатор safe, який робить поле безпечним ['text', 'safe'],
        // Перевіряємо чи дані успішно загружені і провалідовані && $model->validate()
        if ($model->load(Yii::$app->request->post())) {

//            debug($model);
            // Yii::$app->request->post() - це об'єкт з даними
//            debug(Yii::$app->request->post());
            // Завершення виконання коду
//            die;
            if ($model->validate()) {
                // Флеш-повідомлення на сторінку. Використовується у багатьох фреймворках.
                // Вони одразу будуть видалені із сесії після оновлення сторінки
                // Дані повідомлення побрібно виводити у виді, щоб побачити на сторінці.
                // Для цього використовуються також методи
                Yii::$app->session->setFlash('success', 'Дані прийнято сервером для обробки!');
                // Перезапит сторінки - очищення форми
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Дані не прийнято на сервері. Сталася помилка.');
            }

        }
        // Передача даних у вид
        return $this->render('index', compact('model'));
    }

    // Екшн для виводу конкретних постів
    public function actionShow()
    {
//        Варіант визначення заголовку сторінки у екшені
        $this->view->title = 'Якась стаття';
        // Формування мета-тегів та заповнення їх даними

        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'якийсь контент...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'опис сторінки...']);

        // Отримання даних з бази даних за допомогою запитів yii
//       Аналог sql запиту SELECT * FROM post;
//        $posts = Post::find()->all();
        // Сортування в звичайному вигляді
//        $posts = Post::find()->orderBy(['id' => SORT_ASC])->all();
        // Сортування в зворотному вигляді
//        $posts = Post::find()->orderBy(['id' => SORT_DESC])->all();
//        $posts = Post::find()->asArray()->all();
//        $posts = Post::find()->where('id=3')->all();
//        // Аналог
//        $posts = Post::find()->where(['id' => 4])->all();
        // Де лі
//        $posts = Post::find()->where(['like', 'title', 'Дру' ])->all();
//        $posts = Post::find()->where(['<=', 'id', 4 ])->all();
        // Витягне усі значення, де 'author_id' => 3
//        $posts = Post::find()->where(['author_id' => 3])->all();
        // Витягне тільки перший запис. Краще використовувати цей варіант
//        $posts = Post::find()->where(['author_id' => 3])->limit(1)->all();
        // Аналог
//        $posts = Post::find()->where(['author_id' => 3])->one();
        // Виведе кількість записів
//        $posts = Post::find()->where(['author_id' => 3])->count();
        // Усі записи без умов
//        $posts = Post::find()->count();
//        $posts = Post::findOne(['author_id' => 1]);
//        $posts = Post::findAll(['author_id' => 3]);

        $posts = Post::find()->all();

        // Отримання даних з бази даних за допомогою  sql запиту
        // Створення sql запиту
        // Зазвичай дані будуть приходити диинамічно, а не як вже записаний рядок ..
//        $query = "SELECT * FROM post WHERE title LIKE '%Техніки%'";
//        $posts = Post::findBySql($query)->all();
        // .. тому прописуємо знаечння як параметр, де %Техніки% - змінна. Безпечний запит
//        $query = "SELECT * FROM post WHERE title LIKE :search";
//        $posts = Post::findBySql($query, [':search' => '%Техніки%'])->all();


        //  Рекомендується витягати дані у вигляді масиву, окільки це менш трудомісткий процес звернення до бд
//        return $this->render('index', [
//            'posts' => $posts,
//        ]);

        // Передаємо записи у вид для відображення
        return $this->render('show', compact('posts'));
//        return $this->render('show', ['posts' => $posts]);
//        return $this->render('show');
    }

    public function actionTest()
    {

//        $names = ['John', 'Doe', 'Lilly', 'Jenny', 'Robby'];

        // Функції для виводу масивів
        // print_r($names); // Array ( [0] => John [1] => Doe [2] => Lilly [3] => Jenny [4] => Robby )
        // var_dump($names); // array(5) { [0]=> string(4) "John" [1]=> string(3) "Doe" [2]=> string(5) "Lilly" [3]=> string(5) "Jenny" [4]=> string(5) "Robby" }

        // Вивід глобального об'єкту Yii, де app - це екземпляр додатку з методами, які ми можемо використовувати
        // var_dump(Yii::$app);

        // У даному випадку this посилається на AppController та виводить дані через метод debug, який розпаковує масив у читабельний формат
        // $this->debug(Yii::$app);

        // $this->debug($names);

        // Передача масиву $names другим параметром, для отримання доступу у файлі test.php
        // return $this->render('test', ['names' => $names]);
//        return $this->render('test');

    }
}