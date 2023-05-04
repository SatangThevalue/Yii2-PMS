<?php

namespace frontend\controllers;

use common\models\Treasurer;
use frontend\models\TreasurerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreasurerController implements the CRUD actions for Treasurer model.
 */
class TreasurerController extends Controller
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
     * Lists all Treasurer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TreasurerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Treasurer model.
     * @param int $treasurer_id Treasurer ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($treasurer_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($treasurer_id),
        ]);
    }

    /**
     * Creates a new Treasurer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Treasurer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'treasurer_id' => $model->treasurer_id]); */
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
     * Updates an existing Treasurer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $treasurer_id Treasurer ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($treasurer_id)
    {
        $model = $this->findModel($treasurer_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            /* return $this->redirect(['view', 'treasurer_id' => $model->treasurer_id]); */
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Treasurer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $treasurer_id Treasurer ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($treasurer_id)
    {
        $this->findModel($treasurer_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Treasurer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $treasurer_id Treasurer ID
     * @return Treasurer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($treasurer_id)
    {
        if (($model = Treasurer::findOne(['treasurer_id' => $treasurer_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
