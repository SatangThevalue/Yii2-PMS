<?php

use frontend\models\Dashboard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\DashboardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dashboards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dashboard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dashboard_id',
            'dashboard_key',
            'dashboard_value:ntext',
            'dashboard_details:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dashboard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'dashboard_id' => $model->dashboard_id]);
                 }
            ],
        ],
    ]); ?>


</div>
