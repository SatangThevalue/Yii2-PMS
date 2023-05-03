<?php

use common\models\Working;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\WorkingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Working';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-index">

    <p>
        <?= Html::a('Create Working', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'working_id',
            'working_note:ntext',
            //'working_status',
            [
                'attribute' => 'working_status',
                'filter' => ['0'=> 'ยังไม่สำเสร็จ','1'=> 'สำเสร็จ'],
                'format'=>'html',
                'value' => function($model, $key, $index, $column){
                    return $model->working_status == 0 ? '<span class="label label-danger">ยังไม่สำเสร็จ</span>' : '<span class="label label-success">สำเสร็จ</span>';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Working $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'working_id' => $model->working_id]);
                 }
            ],
        ],
    ]); ?>


</div>
