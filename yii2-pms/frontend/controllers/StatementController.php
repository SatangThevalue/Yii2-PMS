<?php

namespace frontend\controllers;
use common\models\Expenses;

class StatementController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Expenses();
        return $this->render('index', [
            'model' => $model,
        ]); 
    }

}
