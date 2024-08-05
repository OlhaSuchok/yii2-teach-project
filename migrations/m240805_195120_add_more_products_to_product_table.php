<?php

use yii\db\Migration;

/**
 * Class m240805_195120_add_more_products_to_product_table
 */
class m240805_195120_add_more_products_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Insert additional data into product table
        $this->batchInsert('{{%product}}', ['name', 'description', 'price', 'category_id'], [
            ['Фітнес-браслет Xiaomi', 'Фітнес-браслет з функцією вимірювання пульсу Xiaomi', 1299.99, 1],
            ['Дитяча книга "Аліса в Країні Чудес"', 'Класична дитяча книга "Аліса в Країні Чудес"', 249.99, 2],
            ['Куртка зимова Columbia', 'Тепла зимова куртка Columbia', 2999.99, 3],
            ['Чай зелений', 'Натуральний зелений чай', 89.99, 4],
            ['Велосипед Trek', 'Гірський велосипед Trek для дорослих', 14999.99, 5],
            ['Лялька Барбі', 'Класична лялька Барбі з аксесуарами', 999.99, 6],
            ['Кавовий стіл', 'Стильний кавовий стіл для вітальні', 4500.00, 7],
            ['Крем для обличчя Nivea', 'Живильний крем для обличчя Nivea', 199.99, 8],
            ['Дитяче автокрісло Britax', 'Безпечне дитяче автокрісло Britax', 3999.99, 9],
            ['Кіт для котів Whiskas', 'Смачний кіт для котів Whiskas', 149.99, 10],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240805_195120_add_more_products_to_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240805_195120_add_more_products_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
