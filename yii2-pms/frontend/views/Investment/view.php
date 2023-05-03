<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Investment $model */

$this->title = $model->investment_id;
$this->params['breadcrumbs'][] = ['label' => 'Investments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="investment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'investment_id' => $model->investment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'investment_id' => $model->investment_id], [
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
            'investment_id',
            'investment_date',
            'investment_type_fk',
            'investment_amount',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
