<?php
// TODO(SaTangTheValue): models from common
use common\models\Treasurer;
use common\models\Treasurercategory;
use common\models\TreasurerType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
// TODO(SaTangTheValue): Improt TimeAgo
use yii\timeago\TimeAgo;
// TODO(SaTangTheValue): Improt ArrayHelper
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\TreasurerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Treasurers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treasurer-index">
    <p>
        <?= Html::a('Create Treasurer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'treasurer_id',
            //'treasurer_date:date',
            // TODO(SaTangTheValue): set DateTime type in index
            [
                'attribute' => 'treasurer_date',
                'format' => ['DateTime', 'php:d mm yy'],
                'value' => 'treasurer_date',
            ],
            'treasurer_note:ntext',
            'treasurer_amount',
            //'treasurer_expenses_type_Fk',
            [
                'attribute' => 'treasurer_expenses_type_Fk',
                'label' => 'ประเภท',
                'filter' => ArrayHelper::map(TreasurerType::find()->all(), 'treasurer_type_id', 'treasurer_type_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->treasurerExpensesType->treasurer_type_title;
                }
            ],
            //'treasurer_category_Fk',
            [
                'attribute' => 'treasurer_category_Fk',
                'label' => 'ประเภท',
                'filter' => ArrayHelper::map(Treasurercategory::find()->all(), 'treasurer_category_id', 'treasurer_category_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->treasurerCategory->treasurer_category_title;
                }
            ],
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
                'urlCreator' => function ($action, Treasurer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'treasurer_id' => $model->treasurer_id]);
                }
            ],
        ],
    ]); ?>


</div>