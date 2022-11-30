<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $file
 * @property string|null $name
 * @property string|null $description
 *
 * @property Readers[] $readers
 * @property ReadersBooks[] $readersBooks
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['file', 'name'], 'string', 'max' => 255],
            ['name', 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Readers::class, ['id' => 'readers_id'])->viaTable('readers_books', ['books_id' => 'id']);
    }

    /**
     * Gets query for [[ReadersBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadersBooks()
    {
        return $this->hasMany(ReadersBooks::class, ['books_id' => 'id']);
    }
}
