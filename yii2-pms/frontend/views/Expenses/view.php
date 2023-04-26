<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Expenses $model */

$this->title = $model->expenses_id;
$this->params['breadcrumbs'][] = ['label' => 'Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expenses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'expenses_id' => $model->expenses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'expenses_id' => $model->expenses_id], [
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
            'expenses_id',
            'expenses_type:ntext',
            'expenses_category_date',
            'expenses_category_Fk',
            'expenses_amount',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
