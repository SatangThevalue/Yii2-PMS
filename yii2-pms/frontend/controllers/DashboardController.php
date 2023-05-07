<?php

namespace frontend\controllers;
use yii\web\Controller;
use common\models\Learning;
use common\models\Todolist;
use common\models\Working;


/**
 * DashboardController implements the CRUD actions for Dashboard model.
 */
class DashboardController extends Controller
{
    public function actionIndex()
    {
        return $this->render('dashboard',[
            'learning' => new Learning(),
            'todolist' => new Todolist(),
            'working' => new Working(),
        ]);
    }
}
