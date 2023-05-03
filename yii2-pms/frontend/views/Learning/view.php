<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Learning $model */

$this->title = $model->learning_id;
$this->params['breadcrumbs'][] = ['label' => 'Learnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="learning-view">
    <p>
        <?= Html::a('Update', ['update', 'learning_id' => $model->learning_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'learning_id' => $model->learning_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'learning_id',
            'learning_note:ntext',
            'learning_status:boolean',
        ],
    ]) ?>

</div>
