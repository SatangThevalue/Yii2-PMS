<?php

use common\models\Todolist;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\TodolistSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Todolists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-index">
    <p>
        <?= Html::a('Create Todolist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'todolist_id',
            'todolist_note:ntext',
            [
                'attribute' => 'todolist_status',
                'filter' => ['0'=> 'ยังไม่สำเสร็จ','1'=> 'สำเสร็จ'],
                'format'=>'html',
                'value' => function($model, $key, $index, $column){
                    return $model->todolist_status == 0 ? '<span class="label label-danger">ยังไม่สำเสร็จ</span>' : '<span class="label label-success">สำเสร็จ</span>';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Todolist $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'todolist_id' => $model->todolist_id]);
                 }
            ],
        ],
    ]); ?>


</div>
