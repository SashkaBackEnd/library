<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%readers_books}}`.
 */
class m221130_195930_add_duration_and_created_at_columns_to_readers_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('readers_books', 'duration', $this->integer());
        $this->addColumn('readers_books', 'created_at', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('readers_books', 'duration');
        $this->dropColumn('readers_books', 'created_at');
    }
}
