<?php

namespace frontend\controllers;

use common\models\Working;
use frontend\models\WorkingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkingController implements the CRUD actions for Working model.
 */
class WorkingController extends Controller
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
     * Lists all Working models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Working model.
     * @param int $working_id Working ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($working_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($working_id),
        ]);
    }

    /**
     * Creates a new Working model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Working();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'working_id' => $model->working_id]); */
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
     * Updates an existing Working model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $working_id Working ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($working_id)
    {
        $model = $this->findModel($working_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            /* return $this->redirect(['view', 'working_id' => $model->working_id]); */
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Working model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $working_id Working ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($working_id)
    {
        $this->findModel($working_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Working model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $working_id Working ID
     * @return Working the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($working_id)
    {
        if (($model = Working::findOne(['working_id' => $working_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
