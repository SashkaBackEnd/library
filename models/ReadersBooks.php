<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "readers_books".
 *
 * @property int $readers_id
 * @property int $books_id
 * @property int|null $duration
 * @property string $created_at
 *
 * @property Books $books
 * @property Readers $readers
 */
class ReadersBooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'readers_books';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['readers_id', 'books_id'], 'required'],
            [['readers_id', 'books_id', 'duration'], 'integer'],
            [['created_at'], 'safe'],
            [['readers_id', 'books_id'], 'unique', 'targetAttribute' => ['readers_id', 'books_id']],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['books_id' => 'id']],
            [['readers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Readers::class, 'targetAttribute' => ['readers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'readers_id' => 'Readers ID',
            'books_id' => 'Books ID',
            'duration' => 'Duration',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::class, ['id' => 'books_id']);
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasOne(Readers::class, ['id' => 'readers_id']);
    }
}
