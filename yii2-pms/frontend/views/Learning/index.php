<?php

use common\models\Learning;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\LearningSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Learnings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learning-index">
    <p>
        <?= Html::a('Create Learning', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'learning_id',
            'learning_note:ntext',
            //'learning_status',
            [
                'attribute' => 'learning_status',
                'filter' => ['0'=> 'ยังไม่สำเสร็จ','1'=> 'สำเสร็จ'],
                'format'=>'html',
                'value' => function($model, $key, $index, $column){
                    return $model->learning_status == 0 ? '<span class="label label-danger">ยังไม่สำเสร็จ</span>' : '<span class="label label-success">สำเสร็จ</span>';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Learning $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'learning_id' => $model->learning_id]);
                 }
            ],
        ],
    ]); ?>


</div>
