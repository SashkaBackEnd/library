<?php

namespace app\controllers;

use app\models\Books;
use app\models\ReadersBooks;
use app\models\Readers;
use yii\rest\ActiveController;

class BookController extends ActiveController
{
    public $modelClass = 'app\models\Books';
    
    public function actions()
    {
        $actions = parent::actions();

        $actions['view']['findModel'] = [$this, 'findModel'];

        return $actions;
    }

    public function findModel($id)
    {
        $book = Books::findOne($id);
        if(!$book) {
            throw new \yii\web\NotFoundHttpException; 
        }
        
        $readers_info = [];
  
        foreach($book->readersBooks as $key => $item) {
            $readers_info[$key]['created_at'] = $item['created_at'];
            $readers_info[$key]['book_name'] = Readers::findOne($item['readers_id'])->full_name;
            $readers_info[$key]['end_time'] = ReadersBooks::getEndTime($item->created_at, $item->duration);
        }
        
        return [
            'book' => $book,
            'readers_info' => $readers_info
        ];
    }
}