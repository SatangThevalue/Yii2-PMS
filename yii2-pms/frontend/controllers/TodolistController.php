<?php

namespace frontend\controllers;

use common\models\Todolist;
use frontend\models\TodolistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TodolistController implements the CRUD actions for Todolist model.
 */
class TodolistController extends Controller
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
     * Lists all Todolist models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TodolistSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Todolist model.
     * @param int $todolist_id รหัสสิ่งที่ต้องทำ
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($todolist_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($todolist_id),
        ]);
    }

    /**
     * Creates a new Todolist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Todolist();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                /* return $this->redirect(['view', 'todolist_id' => $model->todolist_id]); */
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
     * Updates an existing Todolist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $todolist_id รหัสสิ่งที่ต้องทำ
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($todolist_id)
    {
        $model = $this->findModel($todolist_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            /* return $this->redirect(['view', 'todolist_id' => $model->todolist_id]); */
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Todolist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $todolist_id รหัสสิ่งที่ต้องทำ
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($todolist_id)
    {
        $this->findModel($todolist_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Todolist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $todolist_id รหัสสิ่งที่ต้องทำ
     * @return Todolist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($todolist_id)
    {
        if (($model = Todolist::findOne(['todolist_id' => $todolist_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
