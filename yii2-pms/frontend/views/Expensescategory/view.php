<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Expensescategory $model */

$this->title = 'Expenses Category';
$this->params['breadcrumbs'][] = ['label' => 'Expenses Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expensescategory-view">

    <p>
        <?= Html::a('Update', ['update', 'expenses_category_id' => $model->expenses_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'expenses_category_id' => $model->expenses_category_id], [
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
            'expenses_category_id',
            'expenses_category_title:ntext',
        ],
    ]) ?>

</div>
