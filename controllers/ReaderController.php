<?php

namespace app\controllers;

use app\models\Readers;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ReaderController extends ActiveController
{
    public $modelClass = 'app\models\Readers';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Readers::find(),
        ]);
    }
}