<?php
// TODO(SaTangTheValue): models from common
use common\models\Expenses;
use common\models\Expensescategory;
use common\models\Expensestype;
// TODO(SaTangTheValue): Improt ArrayHelper
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
// TODO(SaTangTheValue): Improt TimeAgo
use yii\timeago\TimeAgo;
//use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ExpensesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Expenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenses-index">

    <p>
        <?= Html::a('Create Expenses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'expenses_id',
            // TODO(SaTangTheValue): set DateTime type in index
            [
                'attribute' => 'expenses_category_date',
                'format' => ['Date'],
                'value' => 'expenses_category_date',
            ],
            // TODO(SaTangTheValue): FK expenses type in index
            [
                'attribute' => 'expenses_type',
                'label' => 'ชนิด',
                'filter' => ArrayHelper::map(Expensestype::find()->all(), 'expenses_type_id', 'expenses_type_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->expensesType->expenses_type_title;
                }
            ],
            // TODO(SaTangTheValue): FK Expenses category in index
            [
                'attribute' => 'expenses_category_Fk',
                'label' => 'ประเภท',
                'filter' => ArrayHelper::map(Expensescategory::find()->all(), 'expenses_category_id', 'expenses_category_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->expensesCategory->expenses_category_title;
                }
            ],
            'expenses_amount',
            //'create_time',
            //'update_time',
            // TODO(SaTangTheValue): Use TimeAgo in index
            [
                'attribute' => 'update_time',
                'format' => 'raw',
                'value' => function ($model) {
                    return TimeAgo::widget(['timestamp' => $model->update_time, 'language' => 'th']);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Expenses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'expenses_id' => $model->expenses_id]);
                }
            ],
        ],
    ]); ?>


</div>