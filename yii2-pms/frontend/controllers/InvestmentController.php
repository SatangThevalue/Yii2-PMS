<?php

namespace frontend\controllers;

use common\models\Investment;
use frontend\models\InvestmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvestmentController implements the CRUD actions for Investment model.
 */
class InvestmentController extends Controller
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
            ]
        );
    }

    /**
     * Lists all Investment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InvestmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Investment model.
     * @param int $investment_id รหัสธุรกรรม
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($investment_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($investment_id),
        ]);
    }

    /**
     * Creates a new Investment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Investment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'investment_id' => $model->investment_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Investment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $investment_id รหัสธุรกรรม
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($investment_id)
    {
        $model = $this->findModel($investment_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'investment_id' => $model->investment_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Investment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $investment_id รหัสธุรกรรม
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($investment_id)
    {
        $this->findModel($investment_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Investment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $investment_id รหัสธุรกรรม
     * @return Investment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($investment_id)
    {
        if (($model = Investment::findOne(['investment_id' => $investment_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
