<?php

use common\models\Treasurertype;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\TreasurertypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Treasurertypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treasurertype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Treasurertype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'treasurer_type_id',
            'treasurer_type_title',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Treasurertype $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'treasurer_type_id' => $model->treasurer_type_id]);
                 }
            ],
        ],
    ]); ?>


</div>
