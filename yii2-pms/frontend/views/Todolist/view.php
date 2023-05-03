<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Todolist $model */

$this->title = $model->todolist_id;
$this->params['breadcrumbs'][] = ['label' => 'Todolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="todolist-view">

    <p>
        <?= Html::a('Update', ['update', 'todolist_id' => $model->todolist_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'todolist_id' => $model->todolist_id], [
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
            //'todolist_id',
            'todolist_note:ntext',
            'todolist_status:boolean',
        ],
    ]) ?>

</div>
