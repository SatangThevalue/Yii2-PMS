<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Dashboard $model */

$this->title = $model->dashboard_id;
$this->params['breadcrumbs'][] = ['label' => 'Dashboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dashboard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'dashboard_id' => $model->dashboard_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'dashboard_id' => $model->dashboard_id], [
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
            'dashboard_id',
            'dashboard_key',
            'dashboard_value:ntext',
            'dashboard_details:ntext',
        ],
    ]) ?>

</div>
