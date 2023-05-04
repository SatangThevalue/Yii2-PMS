<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Treasurercategory $model */

$this->title = $model->treasurer_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Treasurercategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="treasurercategory-view">

    <p>
        <?= Html::a('Update', ['update', 'treasurer_category_id' => $model->treasurer_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'treasurer_category_id' => $model->treasurer_category_id], [
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
            //'treasurer_category_id',
            'treasurer_category_title:ntext',
        ],
    ]) ?>

</div>
