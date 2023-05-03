<?php

namespace frontend\controllers;

use common\models\InvestmentType;
use frontend\models\InvestmenttypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvestmenttypeController implements the CRUD actions for InvestmentType model.
 */
class InvestmenttypeController extends Controller
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
     * Lists all InvestmentType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InvestmenttypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvestmentType model.
     * @param int $investment_type_id Investment Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($investment_type_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($investment_type_id),
        ]);
    }

    /**
     * Creates a new InvestmentType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InvestmentType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'investment_type_id' => $model->investment_type_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InvestmentType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $investment_type_id Investment Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($investment_type_id)
    {
        $model = $this->findModel($investment_type_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'investment_type_id' => $model->investment_type_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InvestmentType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $investment_type_id Investment Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($investment_type_id)
    {
        $this->findModel($investment_type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InvestmentType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $investment_type_id Investment Type ID
     * @return InvestmentType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($investment_type_id)
    {
        if (($model = InvestmentType::findOne(['investment_type_id' => $investment_type_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
