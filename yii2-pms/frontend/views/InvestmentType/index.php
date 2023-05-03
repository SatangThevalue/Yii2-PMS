<?php

use common\models\InvestmentType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\InvestmenttypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Investment Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-type-index">

    <p>
        <?= Html::a('Create Investment Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'investment_type_id',
            'investment_type_title:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InvestmentType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'investment_type_id' => $model->investment_type_id]);
                 }
            ],
        ],
    ]); ?>


</div>
