<?php

namespace app\controllers;

// Імпорт глобального об'єкту Yii
use app\models\Category;
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
        //     debug(Yii::$app->request->post());
            return 'test';
        }

 
//        $message = TestForm::findOne(1);
        $messages = TestForm::find()->all();
        // debug($message);

        // Ручне оновлення данних в базі 
        // $message->email = 'my_email@ukr.net';
        // $message->save();

        // Видалення одного елементу з бази
        // $message->delete();  

        // Видалення елементів з бази за умовою 
        // TestForm::deleteAll(['>', 'id', '4']);

        // Створення обєкту ActiveRecord
        // Якщо ми створюємо його за допомогою оператора new, тоді даний об'єкт буде виконувати sql запит INSERT, тобто додавати нові данні 
        // Якщо ж ми об'єкт отримали за допомогою запита із бд, наприклад методом find, тоді цей метод буде виконувати операцію UPDATE 
        // Логічніше буде назвати $post, $message, в залежності від того, з якою таблицею працюємо 
       $model = new TestForm();

        // Додавання даних до бази вручну ========================================
        // $model->name = 'Автор повідомлення 111';
        // $model->email = 'ssskkksss@ukr.net';
        // $model->text = 'Teкст повідомлення 1111';

        // Збереження змісту форми
        // За замовчуванням метод save викликає метод validate
        $model->save();

        // Отримання даних форми на сервері
        // В Yii за замовчуванням діє правило, що усі атрибути у формі є не безпечними.
        // І якщо ми для атрибуту не вказали валідаційне правило, то вони не будуть завантажені у нашу модель
        // Тому для всіх полів потрібно вказати правило валідації, або валідатор safe, який робить поле безпечним ['text', 'safe'],
        // Перевіряємо чи дані успішно загружені і провалідовані && $model->validate()
//         if ($model->load(Yii::$app->request->post())) {

// //            debug($model);

// Просто закоментовано для збереження пройденого матеріалу, нижче той самий код, але чистіший 
//             // Yii::$app->request->post() - це об'єкт з даними
// //            debug(Yii::$app->request->post());
//             // Завершення виконання коду
// //            die;
//             if ($model->validate()) {
//                 // Флеш-повідомлення на сторінку. Використовується у багатьох фреймворках.
//                 // Вони одразу будуть видалені із сесії після оновлення сторінки
//                 // Дані повідомлення побрібно виводити у виді, щоб побачити на сторінці.
//                 // Для цього використовуються також методи
//                 Yii::$app->session->setFlash('success', 'Дані прийнято сервером для обробки!');
//                 // Перезапит сторінки - очищення форми
//                 return $this->refresh();
//             } else {
//                 Yii::$app->session->setFlash('error', 'Дані не прийнято на сервері. Сталася помилка.');
//             }
//         }

// Автоматичне завантаження данних ========================================
// Прийняття та валідація даних 
if ($model->load(Yii::$app->request->post())) {
                //     if ($model->validate()) {
                // Метод save робить валідацію за замовчувнням і не потребує додаткового методу validate
                // Даний код заміняє вищевказаний запис в бд в ручну
                // Для усіх полей моделі повинні бути описані правила валідації, в іншому випадку, такий атрибут буде вважатися не безпечним і запишеться в бд як null  
                // Так відбувається тільки у випадку автоматичного завантаження даних, ручне завантаження - пропустить неваділований атрибут       
                if ($model->save()) {
        
                        Yii::$app->session->setFlash('success', 'Дані прийнято сервером для обробки!');
                        return $this->refresh();
                    } else {
                        Yii::$app->session->setFlash('error', 'Дані не прийнято на сервері. Сталася помилка.');
                    }
        
                }


        return $this->render('index', compact('model', 'messages'));
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
//        return $this->render('show', compact('posts'));
//        return $this->render('show', ['posts' => $posts]);
//        return $this->render('show');

// Передача id
        // Ліниве завантаження
//        $cats = Category::findOne(7);

        // Відкладене завантаження
        $cats = Category::find()->where('id=4')->all();
//        $cats = Category::find()->all();

        // Жадне завантаження
//        $cats = Category::find()->with('products')->where('id=4')->all();

        // Щоб зменшити кількість sql запитів. Запит зведений до SELECT * FROM `product` WHERE `category_id` IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20), а не окремий запит для окремого id
        $cats = Category::find()->with('products')->all();

        return $this->render('show', compact('cats'));

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