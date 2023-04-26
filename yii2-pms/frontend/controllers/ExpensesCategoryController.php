<?php

namespace frontend\controllers;

use common\models\ExpensesCategory;
use common\models\ExpensesCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpensesCategoryController implements the CRUD actions for ExpensesCategory model.
 */
class ExpensesCategoryController extends Controller
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
     * Lists all ExpensesCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExpensesCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExpensesCategory model.
     * @param int $expenses_category_id รหัสประเภทค่าใช้จ่าย
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($expenses_category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($expenses_category_id),
        ]);
    }

    /**
     * Creates a new ExpensesCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ExpensesCategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'expenses_category_id' => $model->expenses_category_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ExpensesCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $expenses_category_id รหัสประเภทค่าใช้จ่าย
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($expenses_category_id)
    {
        $model = $this->findModel($expenses_category_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'expenses_category_id' => $model->expenses_category_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ExpensesCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $expenses_category_id รหัสประเภทค่าใช้จ่าย
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($expenses_category_id)
    {
        $this->findModel($expenses_category_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ExpensesCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $expenses_category_id รหัสประเภทค่าใช้จ่าย
     * @return ExpensesCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($expenses_category_id)
    {
        if (($model = ExpensesCategory::findOne(['expenses_category_id' => $expenses_category_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
