<?php

namespace app\controllers;

use app\models\Books;
use app\models\Readers;
use app\models\ReadersBooks;
use DateTime;
use yii\base\Response;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ReaderController extends ActiveController
{
    public $modelClass = 'app\models\Readers';

    public function actions()
    {
        $actions = parent::actions();

        $actions['view']['findModel'] = [$this, 'findModel'];

        return $actions;
    }

    public function findModel($id)
    {
        $reader = Readers::findOne($id);
        if (!$reader) {
            throw new \yii\web\NotFoundHttpException;
        }
        
        $books_info = [];

        foreach ($reader->readersBooks as $key => $item) {
            $books_info[$key]['created_at'] = $item['created_at'];
            $books_info[$key]['book_name'] = Books::findOne($item['books_id'])->name;
            $books_info[$key]['end_time'] = ReadersBooks::getEndTime($item->created_at, $item->duration);
        }

        return [
            'reader' => $reader,
            'books_info' => $books_info
        ];
    }
}
