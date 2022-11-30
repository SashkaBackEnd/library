<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m221130_181701_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'file' => Schema::TYPE_STRING,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
