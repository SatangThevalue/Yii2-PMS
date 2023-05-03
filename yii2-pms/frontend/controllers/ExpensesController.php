<?php

namespace frontend\controllers;

use common\models\Expenses;
use frontend\models\ExpensesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpensesController implements the CRUD actions for Expenses model.
 */
class ExpensesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ],
        );
    }

    /**
     * Lists all Expenses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExpensesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Expenses model.
     * @param int $expenses_id รหัสธุรกรรม
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($expenses_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($expenses_id),
        ]);
    }

    /**
     * Creates a new Expenses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Expenses();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'expenses_id' => $model->expenses_id]); */
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Expenses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $expenses_id รหัสธุรกรรม
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($expenses_id)
    {
        $model = $this->findModel($expenses_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'expenses_id' => $model->expenses_id]);
        }

        /* return $this->render('update', [
            'model' => $model,
        ]); */
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Expenses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $expenses_id รหัสธุรกรรม
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($expenses_id)
    {
        $this->findModel($expenses_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Expenses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $expenses_id รหัสธุรกรรม
     * @return Expenses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($expenses_id)
    {
        if (($model = Expenses::findOne(['expenses_id' => $expenses_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
