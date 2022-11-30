<?php

namespace app\controllers;

use yii\rest\ActiveController;

class BookReaderController extends ActiveController
{
    public $modelClass = 'app\models\ReadersBooks';
    
}