<?php

namespace frontend\controllers;

use common\models\Treasurertype;
use frontend\models\TreasurertypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreasurertypeController implements the CRUD actions for Treasurertype model.
 */
class TreasurertypeController extends Controller
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
     * Lists all Treasurertype models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TreasurertypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Treasurertype model.
     * @param int $treasurer_type_id Treasurer Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($treasurer_type_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($treasurer_type_id),
        ]);
    }

    /**
     * Creates a new Treasurertype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Treasurertype();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'treasurer_type_id' => $model->treasurer_type_id]); */
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
     * Updates an existing Treasurertype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $treasurer_type_id Treasurer Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($treasurer_type_id)
    {
        $model = $this->findModel($treasurer_type_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            /* return $this->redirect(['view', 'treasurer_type_id' => $model->treasurer_type_id]); */
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Treasurertype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $treasurer_type_id Treasurer Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($treasurer_type_id)
    {
        $this->findModel($treasurer_type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Treasurertype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $treasurer_type_id Treasurer Type ID
     * @return Treasurertype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($treasurer_type_id)
    {
        if (($model = Treasurertype::findOne(['treasurer_type_id' => $treasurer_type_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
