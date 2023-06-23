<?php

use common\models\Investment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
// TODO(SaTangTheValue): Improt TimeAgo
use yii\timeago\TimeAgo;
// TODO(SaTangTheValue): Improt ArrayHelper
use yii\helpers\ArrayHelper;
// TODO(SaTangTheValue): models from common
use common\models\InvestmentType;

/** @var yii\web\View $this */
/** @var frontend\models\InvestmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Investments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-index">
    <p>
        <?= Html::a('Create Investment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'investment_id',
            // TODO(SaTangTheValue): set DateTime type in index
            [
                'attribute' => 'investment_date',
                'format' => ['Date'],
                'value' => 'investment_date',
            ],
            //'investment_type_fk',
            // TODO(SaTangTheValue): FK investment_type_fk type in index
            [
                'attribute' => 'investment_type_fk',
                'label' => 'ประเภท',
                'filter' => ArrayHelper::map(InvestmentType::find()->all(), 'investment_type_id', 'investment_type_title'), //กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
                'value' => function ($model) {
                    return $model->investmentType->investment_type_title;
                }
            ],
            'investment_amount',
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
                'urlCreator' => function ($action, Investment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'investment_id' => $model->investment_id]);
                }
            ],
        ],
    ]); ?>


</div>