<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Working $model */

$this->title = $model->working_id;
$this->params['breadcrumbs'][] = ['label' => 'Working', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="working-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'working_id' => $model->working_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'working_id' => $model->working_id], [
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
            //'working_id',
            'working_note:ntext',
            'working_status:boolean',
        ],
    ]) ?>

</div>
