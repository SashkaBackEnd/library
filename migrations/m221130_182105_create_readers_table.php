<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%readers}}`.
 */
class m221130_182105_create_readers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%readers}}', [
            'id' => $this->primaryKey(),
            'full_name' => Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%readers}}');
    }
}
