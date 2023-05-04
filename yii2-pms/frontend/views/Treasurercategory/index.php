<?php

use common\models\Treasurercategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\TreasurercategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Treasurer Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treasurercategory-index">
    <p>
        <?= Html::a('Create Treasurer Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'treasurer_category_id',
            'treasurer_category_title:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Treasurercategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'treasurer_category_id' => $model->treasurer_category_id]);
                 }
            ],
        ],
    ]); ?>


</div>
