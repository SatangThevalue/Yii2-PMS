<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Treasurer $model */

$this->title = $model->treasurer_id;
$this->params['breadcrumbs'][] = ['label' => 'Treasurers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="treasurer-view">
    <p>
        <?= Html::a('Update', ['update', 'treasurer_id' => $model->treasurer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'treasurer_id' => $model->treasurer_id], [
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
            'treasurer_id',
            'treasurer_note:ntext',
            'treasurer_amount:decimal',
            'treasurer_expenses_type_Fk',
            'treasurer_date:dateTime',
            'treasurer_category_Fk',
            'create_time:dateTime',
            'update_time:dateTime',
        ],
    ]) ?>

</div>
