<?php

namespace frontend\controllers;

use common\models\Treasurercategory;
use frontend\models\TreasurercategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreasurercategoryController implements the CRUD actions for Treasurercategory model.
 */
class TreasurercategoryController extends Controller
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
     * Lists all Treasurercategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TreasurercategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Treasurercategory model.
     * @param int $treasurer_category_id Treasurer Category ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($treasurer_category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($treasurer_category_id),
        ]);
    }

    /**
     * Creates a new Treasurercategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Treasurercategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'treasurer_category_id' => $model->treasurer_category_id]); */
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
     * Updates an existing Treasurercategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $treasurer_category_id Treasurer Category ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($treasurer_category_id)
    {
        $model = $this->findModel($treasurer_category_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            /* return $this->redirect(['view', 'treasurer_category_id' => $model->treasurer_category_id]); */
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Treasurercategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $treasurer_category_id Treasurer Category ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($treasurer_category_id)
    {
        $this->findModel($treasurer_category_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Treasurercategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $treasurer_category_id Treasurer Category ID
     * @return Treasurercategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($treasurer_category_id)
    {
        if (($model = Treasurercategory::findOne(['treasurer_category_id' => $treasurer_category_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
