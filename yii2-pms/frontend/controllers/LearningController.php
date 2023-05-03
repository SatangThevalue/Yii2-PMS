<?php

namespace frontend\controllers;

use common\models\Learning;
use frontend\models\LearningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LearningController implements the CRUD actions for Learning model.
 */
class LearningController extends Controller
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
     * Lists all Learning models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LearningSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Learning model.
     * @param int $learning_id Learning ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($learning_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($learning_id),
        ]);
    }

    /**
     * Creates a new Learning model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Learning();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'learning_id' => $model->learning_id]); */
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
     * Updates an existing Learning model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $learning_id Learning ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($learning_id)
    {
        $model = $this->findModel($learning_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            /* return $this->redirect(['view', 'learning_id' => $model->learning_id]); */
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Learning model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $learning_id Learning ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($learning_id)
    {
        $this->findModel($learning_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Learning model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $learning_id Learning ID
     * @return Learning the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($learning_id)
    {
        if (($model = Learning::findOne(['learning_id' => $learning_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
