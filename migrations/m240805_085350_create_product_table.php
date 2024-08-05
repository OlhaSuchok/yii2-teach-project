<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240805_085350_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Назва продукту'),
            'description' => $this->text()->null()->comment('Опис продукту'),
            'price' => $this->decimal(10, 2)->notNull()->comment('Ціна продукту'),
            'category_id' => $this->integer()->notNull()->comment('Категорія продукту'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата створення'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Дата оновлення'),
        ]);

        // Creates index for column `category_id`
        $this->createIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}',
            'category_id'
        );

        // Add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // Insert initial data into product table
        $this->batchInsert('{{%product}}', ['name', 'description', 'price', 'category_id'], [
            ['Смартфон', 'Сучасний смартфон з великим дисплеєм', 19999.99, 1],
            ['Ноутбук', 'Потужний ноутбук для роботи та розваг', 32999.50, 1],
            ['Футболка', 'Класична біла футболка', 299.99, 3],
            ['Роман', 'Бестселер з жанру наукової фантастики', 159.50, 2],
            ['Йогурт', 'Йогурт з натуральних інгредієнтів', 35.99, 4],
            ['Гантелі', 'Набір гантелей для фітнесу', 799.00, 5],
            ['Кубик Рубіка', 'Класичний кубик Рубіка 3x3', 249.99, 6],
            ['Диван', 'Зручний диван з якісного матеріалу', 8500.00, 7],
            ['Шампунь', 'Шампунь для щоденного використання', 99.50, 8],
            ['Автомобільний зарядний пристрій', 'Зарядний пристрій для автомобіля', 499.99, 9],
            ['Корм для собак', 'Високоякісний корм для собак', 299.00, 10],
            ['Гітара', 'Акустична гітара для початківців', 1499.99, 11],
            ['Клавіатура', 'Механічна клавіатура з RGB підсвіткою', 899.99, 12],
            ['Навушники', 'Бездротові навушники з шумозаглушенням', 1099.99, 13],
            ['Пральна машина', 'Пральна машина з функцією швидкого прання', 11999.99, 14],
            ['Картина', 'Оригінальна картина маслом на полотні', 3500.00, 15],
            ['Наручний годинник', 'Годинник з водонепроникним корпусом', 2999.99, 16],
            ['Каструля', 'Набір каструль з нержавіючої сталі', 699.99, 17],
            ['Садовий набір', 'Набір інструментів для саду', 799.99, 18],
            ['Миючий засіб', 'Універсальний миючий засіб для підлоги', 49.99, 19],
            ['Перфоратор', 'Потужний перфоратор для будівельних робіт', 1999.99, 20],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}'
        );

        // Drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
