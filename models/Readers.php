<?php

namespace app\models;

use Symfony\Component\CssSelector\Parser\Reader;
use Yii;

/**
 * This is the model class for table "readers".
 *
 * @property int $id
 * @property string|null $full_name
 *
 * @property Books[] $books
 * @property ReadersBooks[] $readersBooks
 */
class Readers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'readers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name'], 'string', 'max' => 255],
            [['full_name'], 'required'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id' => 'books_id'])->viaTable('readers_books', ['readers_id' => 'id']);
    }

    /**
     * Gets query for [[ReadersBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadersBooks()
    {
        return $this->hasMany(ReadersBooks::class, ['readers_id' => 'id']);
    }
}
