<?php

use common\models\Investment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\InvestmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Investments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Investment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'investment_id',
            'investment_date',
            'investment_type_fk',
            'investment_amount',
            'create_time',
            //'update_time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Investment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'investment_id' => $model->investment_id]);
                 }
            ],
        ],
    ]); ?>


</div>
