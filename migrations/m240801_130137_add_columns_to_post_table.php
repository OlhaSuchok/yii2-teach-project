<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m240801_130137_add_columns_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%post}}', 'title', $this->string(255)->notNull());
        $this->addColumn('{{%post}}', 'content', $this->text()->notNull());
        $this->addColumn('{{%post}}', 'author_id', $this->integer()->notNull());
        $this->addColumn('{{%post}}', 'published_at', $this->dateTime()->notNull());
        $this->addColumn('{{%post}}', 'status', $this->string(50)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%post}}', 'title');
        $this->dropColumn('{{%post}}', 'content');
        $this->dropColumn('{{%post}}', 'author_id');
        $this->dropColumn('{{%post}}', 'published_at');
        $this->dropColumn('{{%post}}', 'status');
    }
}
