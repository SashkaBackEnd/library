<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%readers_books}}`.
 */
class m221130_205835_add_duration_and_updated_at_columns_to_readers_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('readers_books', 'updated_at', $this->timestamp()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('readers_books', 'updated_at');
    }
}
