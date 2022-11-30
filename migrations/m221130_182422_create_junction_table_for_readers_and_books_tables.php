<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%readers_books}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%readers}}`
 * - `{{%books}}`
 */
class m221130_182422_create_junction_table_for_readers_and_books_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%readers_books}}', [
            'readers_id' => $this->integer(),
            'books_id' => $this->integer(),
            'PRIMARY KEY(readers_id, books_id)',
        ]);

        // creates index for column `readers_id`
        $this->createIndex(
            '{{%idx-readers_books-readers_id}}',
            '{{%readers_books}}',
            'readers_id'
        );

        // add foreign key for table `{{%readers}}`
        $this->addForeignKey(
            '{{%fk-readers_books-readers_id}}',
            '{{%readers_books}}',
            'readers_id',
            '{{%readers}}',
            'id',
            'CASCADE'
        );

        // creates index for column `books_id`
        $this->createIndex(
            '{{%idx-readers_books-books_id}}',
            '{{%readers_books}}',
            'books_id'
        );

        // add foreign key for table `{{%books}}`
        $this->addForeignKey(
            '{{%fk-readers_books-books_id}}',
            '{{%readers_books}}',
            'books_id',
            '{{%books}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%readers}}`
        $this->dropForeignKey(
            '{{%fk-readers_books-readers_id}}',
            '{{%readers_books}}'
        );

        // drops index for column `readers_id`
        $this->dropIndex(
            '{{%idx-readers_books-readers_id}}',
            '{{%readers_books}}'
        );

        // drops foreign key for table `{{%books}}`
        $this->dropForeignKey(
            '{{%fk-readers_books-books_id}}',
            '{{%readers_books}}'
        );

        // drops index for column `books_id`
        $this->dropIndex(
            '{{%idx-readers_books-books_id}}',
            '{{%readers_books}}'
        );

        $this->dropTable('{{%readers_books}}');
    }
}
