<?php

use common\models\Expensescategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ExpensescategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Expensescategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expensescategory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Expensescategory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'expenses_category_id',
            'expenses_category_title:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Expensescategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'expenses_category_id' => $model->expenses_category_id]);
                 }
            ],
        ],
    ]); ?>


</div>
