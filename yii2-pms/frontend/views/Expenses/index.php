<?php

use common\models\Expenses;
use common\models\Expensescategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\ExpensesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Expenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Expenses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'expenses_id',
            'expenses_type:ntext',
            'expenses_category_date',
            [
                'attribute' => 'expenses_category_Fk',
                'filter' => ArrayHelper::map(Expensescategory::find()->all(), 'expenses_category_id', 'expenses_category_title'),//กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function($model){
                    return $model->expensescategory->expenses_category_title;
                }
            ],
            'expenses_amount',
            //'create_time',
            //'update_time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Expenses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'expenses_id' => $model->expenses_id]);
                 }
            ],
        ],
    ]); ?>


</div>
